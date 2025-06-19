@if($links)
    <div class="col-12 d-flex fast-links">
        @foreach($links as $item)
            @if($item['text'])
                <a href="/{{ $item['to'] }}">
                    #{{ $item['text'] }}
                </a>
            @endif
        @endforeach
    </div>
@endif
