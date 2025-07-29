document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.accordion-header').forEach(button => {
        button.addEventListener('click', () => {
            const active = button.classList.contains('active');

            // Закрыть все
            document.querySelectorAll('.accordion-header').forEach(b => b.classList.remove('active'));
            document.querySelectorAll('.accordion-body').forEach(body => body.style.display = 'none');

            if (!active) {
                button.classList.add('active');
                button.nextElementSibling.style.display = 'block';
            }
        });
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const swiperBlock = document.querySelector(".mySwiper");
    if (!swiperBlock) return;

    // Подключаем CSS
    const swiperStyle = document.createElement("link");
    swiperStyle.rel = "stylesheet";
    swiperStyle.href = "/css/swiper-bundle.min.css";
    document.head.prepend(swiperStyle);

    // Подключаем JS
    const swiperScript = document.createElement("script");
    swiperScript.src = "/js/swiper-bundle.min.js";
    swiperScript.defer = true;

    swiperScript.onload = function () {
        new Swiper(".mySwiper", {
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            pagination: {
                el: ".swiper-pagination",
            },
        });
    };

    document.head.prepend(swiperScript);
});

document.addEventListener("DOMContentLoaded", function () {
    const mapElement = document.getElementById("map");

    // Если блока нет — ничего не делаем
    if (!mapElement) return;

    // Загружаем скрипт Яндекс.Карт
    const script = document.createElement("script");
    script.src = "https://api-maps.yandex.ru/2.1/?lang=ru_RU";
    script.type = "text/javascript";
    script.onload = function () {
        const lng = parseFloat(mapElement.dataset.y);
        const lat = parseFloat(mapElement.dataset.x);

        if (isNaN(lat) || isNaN(lng)) return;

        ymaps.ready(function () {
            const myMap = new ymaps.Map("map", {
                center: [lat, lng],
                zoom: 12
            });

            const myPlacemark = new ymaps.Placemark([lat, lng], {
                hintContent: 'Продавец'
            });

            myMap.geoObjects.add(myPlacemark);
        });
    };

    document.head.appendChild(script);
});
