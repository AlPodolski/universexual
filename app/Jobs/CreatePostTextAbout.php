<?php

namespace App\Jobs;

use App\Models\City;
use App\Models\Post;
use GuzzleHttp\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CreatePostTextAbout implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $post;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->apiKey = env('OPENAI_API_KEY');
        $this->client = new Client([
            'base_uri' => 'https://api.openai.com/v1/',
            'verify' => false,
            'headers' => [
                'Authorization' => 'Bearer ' . $this->apiKey,
                'Content-Type' => 'application/json',
            ],
        ]);

        $model = 'gpt-3.5-turbo';

        $maxTokens = 3000;

        $post = Post::select('posts.*', 'nationals.value as national_value',
            'hair_colors.value as hair_color', 'intim_hairs.value as intim_hair'
        )
            ->with('service', 'metro', 'place', 'reviews', 'photo', 'rayon')
            ->where('posts.id', $this->post->id)
            ->join('nationals', 'national_id', '=', 'nationals.id')
            ->join('hair_colors', 'hair_color_id', '=', 'hair_colors.id')
            ->join('intim_hairs', 'intim_hair_id', '=', 'intim_hairs.id')
            ->first();

        $prompt = 'сделай описание для индивидуалки от первого лица и добавь огонька и романтики,
        имя '.$this->post->name. '
        возраст ' .$this->post->age. ',
         Рост ' .$this->post->rost. ',
         Вес ' .$this->post->ves. '
         Грудь ' .$this->post->breast;
        if ($this->post->tatu) $prompt .= ' Тату есть ';
        if ($this->post->pircing) $prompt .= ' Пирсинг есть ';
        if ($post->hair_color) $prompt .= ' Цвет волос ' . $post->hair_color ;
        if ($post->national_value) $prompt .= ' Национальность ' . $post->national_value ;
        if ($post->intim_hair) $prompt .= ' Интим. стрижка ' . $post->intim_hair ;

        $response = $this->client->post('chat/completions', [
            'json' => [
                'model' => $model,
                'messages' => [
                    ['role' => 'user', 'content' => $prompt],
                ],
                'max_tokens' => $maxTokens,
            ],
        ]);

        $body = json_decode($response->getBody()->getContents(), true);

        $result = ($body['choices'][0]['message']['content'] ?? false);

        if ($result) {
            $this->post->about = $result;
            $this->post->save();
        }

    }
}
