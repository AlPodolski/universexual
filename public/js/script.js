function ageSuffix(value) {
    value = parseInt(value);
    let mod10 = value % 10;
    let mod100 = value % 100;

    if (mod10 === 1 && mod100 !== 11) {
        return value + ' год';
    } else if (mod10 >= 2 && mod10 <= 4 && (mod100 < 10 || mod100 >= 20)) {
        return value + ' года';
    } else {
        return value + ' лет';
    }
}

function createSlider(sliderId, fromId, toId, min, max, step, suffix = '', thousandSeparator = '', useCustomFormat = false) {
    var slider = document.getElementById(sliderId);

    var formatOptions = useCustomFormat ? {
        to: function (value) {
            return ageSuffix(value);
        },
        from: function (value) {
            return Number(value.replace(/[^0-9]/g, ''));
        }
    } : wNumb({
        decimals: 0,
        thousand: thousandSeparator,
        suffix: suffix
    });

    noUiSlider.create(slider, {
        start: [
            document.getElementById(fromId).getAttribute('data-value'),
            document.getElementById(toId).getAttribute('data-value')
        ],
        connect: true,
        step: step,
        format: formatOptions,
        range: {
            'min': min,
            'max': max
        }
    });

    slider.noUiSlider.on('update', function (values) {
        document.getElementById(fromId).value = values[0];
        document.getElementById(toId).value = values[1];
    });
}

// Создание слайдеров с параметрами
createSlider('age', 'age-from', 'age-to', 18, 80, 1, '', '', true); // кастомный формат возраста
createSlider('ves', 'ves-from', 'ves-to', 40, 100, 1, ' кг');
createSlider('grud', 'grud-from', 'grud-to', 0, 8, 1, ' размер');
createSlider('price', 'price-from', 'price-to', 1500, 50000, 100, ' ₽', ' ');

var swiper = new Swiper(".mySwiper", {
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    pagination: {
        el: ".swiper-pagination",
    },
});

ymaps.ready(init);

function init() {
    var myMap = new ymaps.Map("map", {
        center: [55.751574, 37.573856], // Координаты центра карты (Москва, например)
        zoom: 12
    });

    var myPlacemark = new ymaps.Placemark([55.751574, 37.573856], {
        hintContent: 'Продавец',
        balloonContent: 'Ваш адрес: Москва, Красная площадь'
    });

    myMap.geoObjects.add(myPlacemark);
}

const toggleButton = document.getElementById('filterToggle');
const closeButton = document.getElementById('filterClose');
const filterPanel = document.getElementById('filterPanel');

toggleButton.addEventListener('click', () => {
    filterPanel.classList.toggle('open');
});

closeButton.addEventListener('click', () => {
    filterPanel.classList.remove('open');
});


const catalogToggle = document.getElementById('burger-menu');
const catalogClose = document.getElementById('catalogClose');
const catalogPanel = document.getElementById('catalogPanel');
const overlay = document.getElementById('overlay');

// Открыть каталог
catalogToggle.addEventListener('click', () => {
    catalogPanel.classList.add('open');
    overlay.classList.add('active');
    document.body.style.overflow = 'hidden'; // Блокируем прокрутку страницы
});

// Закрыть каталог
function closeCatalog() {
    catalogPanel.classList.remove('open');
    overlay.classList.remove('active');
    document.body.style.overflow = ''; // Возвращаем прокрутку страницы
}

catalogClose.addEventListener('click', closeCatalog);
overlay.addEventListener('click', closeCatalog);

// Аккордеон
const accordionHeaders = document.querySelectorAll('.accordion-header');

accordionHeaders.forEach(header => {
    header.addEventListener('click', () => {
        const item = header.parentElement;
        const content = header.nextElementSibling;

        item.classList.toggle('active');

        if (item.classList.contains('active')) {
            content.style.maxHeight = content.scrollHeight + 'px';
        } else {
            content.style.maxHeight = 0;
        }

        // Закрыть другие
        accordionHeaders.forEach(otherHeader => {
            if (otherHeader !== header) {
                const otherItem = otherHeader.parentElement;
                const otherContent = otherHeader.nextElementSibling;
                otherItem.classList.remove('active');
                otherContent.style.maxHeight = 0;
            }
        });
    });
});
