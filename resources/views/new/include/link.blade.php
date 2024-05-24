@if($links)
    <div class="links-wrap">
        @foreach($links as $item)
            <a class="tag" href="/{{ $item['to'] }}">
                #{{ $item['text'] }}
            </a>
        @endforeach
    </div>
@endif
