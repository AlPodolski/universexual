function toggle_class_to_block(target, className){
    var targetElement = document.getElementById(target);
    targetElement.classList.toggle(className);
}

function phone(object){
    var phone = object.getAttribute('data-phone');
    object.innerHTML = phone;
    window.location.href='tel:+'+phone;
}
function show_sub_menu(obj){
    obj.nextElementSibling.classList.toggle('show_sub_menu')
}

var slider = document.getElementById('age');

noUiSlider.create(slider, {
    start: [18, 80],
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
    console.log(values);
    var age_from = document.getElementById('age-from')
    var age_to = document.getElementById('age-to')
    age_from.value = values[0];
    age_to.value = values[1];
});

var sliderRost = document.getElementById('rost');

noUiSlider.create(sliderRost, {
    start: [150, 200],
    connect: true,
    step: 1,
    format: wNumb({
        decimals: 0
    }),
    range: {
        'min': 150,
        'max': 200
    }
});

sliderRost.noUiSlider.on('update', function (values, handle) {
    console.log(values);
    var age_from = document.getElementById('rost-from')
    var age_to = document.getElementById('rost-to')
    age_from.value = values[0];
    age_to.value = values[1];
});

var sliderVes = document.getElementById('ves');

noUiSlider.create(sliderVes, {
    start: [40, 100],
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
    console.log(values);
    var from = document.getElementById('ves-from')
    var to = document.getElementById('ves-to')
    from.value = values[0];
    to.value = values[1];
});

var sliderGrud = document.getElementById('grud');

noUiSlider.create(sliderGrud, {
    start: [0, 8],
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
    console.log(values);
    var from = document.getElementById('grud-from')
    var to = document.getElementById('grud-to')
    from.value = values[0];
    to.value = values[1];
});


var sliderPrice = document.getElementById('price');

noUiSlider.create(sliderPrice, {
    start: [1500, 50000],
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
    console.log(values);
    var from = document.getElementById('price-from')
    var to = document.getElementById('price-to')
    from.value = values[0];
    to.value = values[1];
});

function showFilter(){
    document.getElementById('filter').classList.toggle('show-filter')
}
