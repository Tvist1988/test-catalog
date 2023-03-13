
import jQuery from 'jquery';
window.$ = jQuery;
import './bootstrap';
import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


$('.favorite').on('submit', function (e) {
    e.preventDefault();
    var product_id = $(this).children('.product_id').val();
    $.ajax({
        type: 'POST',
        url: '/favorite',
        data: {
            "_token": $(this).children("[name='_token']").val(),
            id: product_id,
        },
        success: function (data) {
            $('.toast-title').text('Успех');
            $('.toast-body').text('Вы успешно добавили товар');
            var toastCode = $('#liveToast');
            var toast = new bootstrap.Toast(toastCode);
            toast.show();

        },
        error: function (data) {
            $('.toast-title').text('Ошибка!');
            $('.toast-body').text(data.responseText);
            var toastCode = $('#liveToast');
            var toast = new bootstrap.Toast(toastCode);
            toast.show();
        }
    });
    return false;
});





