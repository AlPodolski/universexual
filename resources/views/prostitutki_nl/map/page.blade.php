<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="https://www.sitemaps.org/schemas/sitemap/0.9">

    <url>
        <loc>https://{{ $_SERVER['HTTP_HOST'] }}</loc>
        <lastmod>2023-12-22</lastmod>
        <priority>1</priority>
    </url>

    @foreach($data as $dataItem)
        @foreach($dataItem as $item)
            @if(isset($item->filter_url))
                <url>
                    <loc>https://{{ $_SERVER['HTTP_HOST'] }}/{{ $item->filter_url }}</loc>
                    <lastmod>2023-12-22</lastmod>
                    <priority>0.9</priority>
                </url>
            @endif
        @endforeach
    @endforeach

</urlset>
