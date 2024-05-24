User-agent: *
Disallow: */?q=*
Disallow: /filter?*
Disallow: /poisk?*
Allow: */*.js
Allow: */*.css
Allow: */*.gif
Allow: */*.png
Allow: */*.jpeg
Allow: */*.jpg
Allow: */*.JPG
Allow: */*.woff
Allow: */*.woff2
Allow: */*.ttf

User-agent: Yandex
Disallow: /filter?*
Disallow: /poisk?*
Disallow: */amp/*

Clean-param: p

Sitemap: https://{{$host}}/sitemap_post.xml
Sitemap: https://{{$host}}/sitemap_page.xml
