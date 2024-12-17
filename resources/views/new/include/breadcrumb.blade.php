@if(isset($breadMicro))
    {!! $breadMicro !!}
@endif
<div class="col-12">
    <nav class="breadcrumbs">
        <ul class="d-flex">
            <li>
                <a href="/">
                    Главная
                </a>
            </li>
            <li class="breadcrumb-item">
                {{ $meta['h1'] }}
            </li>
        </ul>
    </nav>
</div>

