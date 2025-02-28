@php
    /* @var $post \App\Models\BlogPost */
@endphp

<article class="col-12 col-md-6 col-lg-4 col-xl-3 blog-post">
    <a href="/blog/{{ $post->url }}"><img class="blog-post-img" src="/430-310/thumbs{{ $post->image }}" alt=""></a>
    <a href="/blog/{{ $post->url }}" class="blog-post-heading">{{ $post->h1 }}</a>
    <div class="blog-post-text">{{ $post->small_text }}</div>
</article>
