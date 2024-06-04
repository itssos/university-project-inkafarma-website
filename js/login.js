document.getElementById('login-form').addEventListener('submit', function (event) {
    // Obtener los valores de los campos de correo electrónico y contraseña
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;

    // Limpiar los mensajes de error anteriores
    document.getElementById('email-error').innerHTML = '';
    document.getElementById('password-error').innerHTML = '';

    // Realizar la validación de los campos
    var isValid = true;

    if (email.trim() === '') {
        document.getElementById('email-error').innerHTML = '<div class="alert alert-danger">Ingrese un correo electrónico.</div>';
        isValid = false;
    } else if (!isValidEmail(email)) {
        document.getElementById('email-error').innerHTML = '<div class="alert alert-danger">Correo electrónico inválido.</div>';
        isValid = false;
    }

    if (password.trim() === '') {
        document.getElementById('password-error').innerHTML = '<div class="alert alert-danger">Ingrese una contraseña.</div>';
        isValid = false;
    }

    if (!isValid) {
        event.preventDefault(); // Detener el envío del formulario si hay errores
    }
});

// Función para validar el formato del correo electrónico utilizando una expresión regular
function isValidEmail(email) {
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}