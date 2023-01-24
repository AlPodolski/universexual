@foreach($posts as $post)
    @include('include.item', compact('post'))
@endforeach
