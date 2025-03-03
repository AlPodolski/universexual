function toggle_class_to_block(target, className) {
    var targetElement = document.getElementById(target);
    targetElement.classList.toggle(className);
}

function openPanel() {
    $('#slide-panel').addClass('open');
}

// Функция для закрытия панели
function closePanel() {
    $('#slide-panel').removeClass('open');
}
function openPanelMenu() {
    $('#side-menu').addClass('open');
}

// Функция для закрытия панели
function closePaneMenu() {
    $('#side-menu').removeClass('open');
}

function call(object) {

    var id = $(object).attr('data-id');
    var city = $(object).attr('data-city');
    var phone = $(object).attr('data-phone');

    if (phone) {

        window.location.href = 'tel:+' + phone;
    } else {

        $.ajax({
            type: 'POST',
            url: "/phone", //Путь к обработчику
            data: 'id=' + id + '&city=' + city,
            response: 'text',
            dataType: "html",
            cache: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
            },
            success: function (data) {

                $(object).html(formatPhone(data));
                $(object).attr('data-phone', data);
                window.location.href = 'tel:+' + data;

            }
        })

    }

}

function show_sub_menu(obj) {
    obj.nextElementSibling.classList.toggle('show_sub_menu')
}

var slider = document.getElementById('age');

noUiSlider.create(slider, {
    start: [
        document.getElementById('age-from').getAttribute('data-value'),
        document.getElementById('age-to').getAttribute('data-value')
    ],
    connect: true,
    step: 1,
    format: wNumb({
        decimals: 0
    }),
    range: {
        'min': 18,
        'max': 80
    }
});

slider.noUiSlider.on('update', function (values, handle) {
    var age_from = document.getElementById('age-from')
    var age_to = document.getElementById('age-to')
    age_from.value = values[0];
    age_to.value = values[1];
});

var sliderVes = document.getElementById('ves');

noUiSlider.create(sliderVes, {
    start: [
        document.getElementById('ves-from').getAttribute('data-value'),
        document.getElementById('ves-to').getAttribute('data-value')
    ],
    connect: true,
    step: 1,
    format: wNumb({
        decimals: 0
    }),
    range: {
        'min': 40,
        'max': 100
    }
});

sliderVes.noUiSlider.on('update', function (values, handle) {
    var from = document.getElementById('ves-from')
    var to = document.getElementById('ves-to')
    from.value = values[0];
    to.value = values[1];
});

var sliderGrud = document.getElementById('grud');

noUiSlider.create(sliderGrud, {
    start: [
        document.getElementById('grud-from').getAttribute('data-value'),
        document.getElementById('grud-to').getAttribute('data-value')
    ],
    connect: true,
    step: 1,
    format: wNumb({
        decimals: 0
    }),
    range: {
        'min': 0,
        'max': 8
    }
});

sliderGrud.noUiSlider.on('update', function (values, handle) {
    var from = document.getElementById('grud-from')
    var to = document.getElementById('grud-to')
    from.value = values[0];
    to.value = values[1];
});


var sliderPrice = document.getElementById('price');

noUiSlider.create(sliderPrice, {
    start: [
        document.getElementById('price-from').getAttribute('data-value'),
        document.getElementById('price-to').getAttribute('data-value')
    ],
    connect: true,
    step: 100,
    format: wNumb({
        decimals: 0
    }),
    range: {
        'min': 1500,
        'max': 50000
    }
});

sliderPrice.noUiSlider.on('update', function (values, handle) {
    var from = document.getElementById('price-from')
    var to = document.getElementById('price-to')
    from.value = values[0];
    to.value = values[1];
});

function showFilter() {
    document.getElementById('filter').classList.toggle('show-filter')
}

function getMorePosts(object) {

    var url = $(object).attr('data-url');

    $.ajax({
        type: 'POST',
        url: url, //Путь к обработчику
        response: 'text',
        dataType: "html",
        headers: {
            'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
        },
        cache: false,
        success: function (data) {

            data = JSON.parse(data)

            if (data) {

                window.history.pushState('', document.title, url);

                if (data.posts) $('.posts').append(data.posts);

                if (data.next_page) $(object).attr('data-url', data.next_page);
                else $(object).remove();

            }

        }
    })

}

function setSort() {

    var select = document.getElementById('sort-select');

    if (select.value) {
        document.cookie = 'sort=' + select.value;
    }

    window.location.href = location.pathname + location.search;

}

arrowTop.onclick = function () {
    window.scrollTo(pageXOffset, 0);
    // после scrollTo возникнет событие "scroll", так что стрелка автоматически скроется
};

window.addEventListener('scroll', function () {
    arrowTop.hidden = (pageYOffset < 500);
});


document.addEventListener('DOMContentLoaded', function () {

    var singleGallery = $('#gallery');
    singleGallery.lightGallery();

});

function formatPhone(phone) {

    phone = phone.toString();

    var lenPhone = phone.length;
    var tt = phone.split('');
    if (lenPhone == 11) {
        tt.splice(0, "", "+");
        tt.splice(2, "", "(");
        tt.splice(6, "", ")");
        tt.splice(10, "", "-");
        tt.splice(13, "", "-");

    } else if (lenPhone == 12) {
        tt.splice(2, "", "(");
        tt.splice(6, "", ")");
        tt.splice(10, "", "-");
        tt.splice(13, "", "-");
    } else if (lenPhone == 10) {
        tt.splice(0, "", "+7(");
        tt.splice(4, "", ")");
        tt.splice(8, "", "-");
        tt.splice(11, "", "-");
    }

    phone = tt.join('');

    return phone;

}

function showSearchForm(){
    document.getElementById('search').classList.toggle('open-search')
}
function add_to_favorite(object) {

    var id = $(object).attr('data-id');

    $.ajax({
        type: 'POST',
        url: "/favorite/add", //Путь к обработчику
        data: 'id=' + id,
        response: 'text',
        dataType: "html",
        cache: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
        },
        success: function (data) {

            $(object).toggleClass('catalog-item__favorite_add');

        }
    })

}
