@foreach($posts as $post)
    @include('intim-box.include.item', compact('post'))
@endforeach
