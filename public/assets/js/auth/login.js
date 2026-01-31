const BASE_URL = document
    .querySelector('meta[name="base-url"]')
    .content;

$('#registerForm').submit(function (e) {
    e.preventDefault();

    $.post(BASE_URL + 'auth/register', $(this).serialize(), function (res) {
        if (!res.status) {
            $('#alert').html(
                `<div class="alert alert-danger">${res.message}</div>`
            );
            return;
        }

        $('#alert').html(
            `<div class="alert alert-success">${res.message}</div>`
        );
    }, 'json');
});

$('#loginForm').submit(function (e) {
    e.preventDefault();

    $.post(BASE_URL + 'auth/login', $(this).serialize(), function (res) {
        if (res.status) {
            window.location.href = '/dashboard';
        } else {
            $('#alert').html(
                `<div class="alert alert-danger">${res.message}</div>`
            );
        }
    }, 'json');
});