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

document.addEventListener("DOMContentLoaded", function () {
    const mapElement = document.getElementById("map");

    if (!mapElement) return;

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
});

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


document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll('.star-rating').forEach(container => {
        const inputName = container.dataset.inputName;
        const hiddenInput = document.querySelector(`input[name="${inputName}"]`);
        let currentRating = 0;

        for (let i = 1; i <= 5; i++) {
            const star = document.createElement('div');
            star.classList.add('star');
            star.dataset.index = i;

            star.innerHTML = `
                <svg viewBox="0 0 24 24">
                    <path d="M12 17.27L18.18 21l-1.64-7.03L22
                    9.24l-7.19-.61L12 2 9.19 8.63
                    2 9.24l5.46 4.73L5.82 21z"/>
                </svg>
            `;

            star.addEventListener('mousemove', (e) => {
                const rect = e.currentTarget.getBoundingClientRect();
                const isLeft = (e.clientX - rect.left) < rect.width / 2;
                updateStars(container, i - 1 + (isLeft ? 0.5 : 1));
            });

            star.addEventListener('mouseleave', () => {
                updateStars(container, currentRating);
            });

            star.addEventListener('click', (e) => {
                const rect = e.currentTarget.getBoundingClientRect();
                const isLeft = (e.clientX - rect.left) < rect.width / 2;
                currentRating = (i - 1 + (isLeft ? 0.5 : 1)) * 2;
                hiddenInput.value = currentRating;
            });

            container.appendChild(star);
        }

        function updateStars(container, value) {
            const stars = container.querySelectorAll('.star');
            stars.forEach((star, i) => {
                star.classList.remove('full', 'half');
                const starValue = i + 1;
                if (value >= starValue) {
                    star.classList.add('full');
                } else if (value >= starValue - 0.5) {
                    star.classList.add('half');
                }
            });
        }
    });
});

function getMorePosts(button) {
    const url = button.getAttribute('data-url');
    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': token
        },
        credentials: 'same-origin', // сохраняет куки
    })
        .then(response => response.text())
        .then(text => {
            let data;

            try {
                data = JSON.parse(text);
            } catch (e) {
                console.error('Ошибка парсинга JSON:', e);
                return;
            }

            if (data) {
                window.history.pushState('', document.title, url);

                if (data.posts) {
                    document.querySelector('.content').insertAdjacentHTML('beforeend', data.posts);
                }

                if (data.next_page) {
                    button.setAttribute('data-url', data.next_page);
                } else {
                    button.remove();
                }
            }
        })
        .catch(error => {
            console.error('Ошибка при запросе:', error);
        });
}
