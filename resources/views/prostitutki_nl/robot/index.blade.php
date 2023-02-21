User-agent: *
Allow: /

Clean-param: p

Disallow: */?q=*
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

Disallow: /filter?*
Disallow: /poisk?*

User-agent: Yandex
Disallow: /filter?*
Disallow: /poisk?*
Disallow: */amp/*

Sitemap: https://{{$host}}/sitemap.xml
Host: https://{{$host}}
