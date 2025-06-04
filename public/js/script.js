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
