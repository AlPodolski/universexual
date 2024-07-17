@if($links)
    <div class="links-wrap">
        @foreach($links as $item)
            @if($item['text'])
                <a class="tag" href="/{{ $item['to'] }}">
                    #{{ $item['text'] }}
                </a>
            @endif
        @endforeach
    </div>
@endif
