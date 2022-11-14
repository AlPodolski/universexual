function toggle_class_to_block(target, className){
    var targetElement = document.getElementById(target);
    targetElement.classList.toggle(className);
}

function phone(object){
    var phone = object.getAttribute('data-phone');
    object.innerHTML = phone;
    window.location.href='tel:+'+phone;
}
