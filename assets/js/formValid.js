const phoneInput = document.getElementById('number');
const passwordInput = document.getElementById('password');
const passwordRepeatInput = document.getElementById('password_repeat');
const phoneField = document.getElementById('phone-field');
const passwordFiled = document.getElementById('password-field');
const submitButton = document.querySelector('input[type="submit"]');

function validatePhone() {
    const phoneValue = phoneInput.value.trim();
    if (phoneValue === 'admin') {
        submitButton.disabled = false;
    } else if (!phoneValue.startsWith('+7') && !phoneValue.startsWith('8')) {
        phoneField.textContent = 'Номер телефона должен начинаться с +7 или 8';
        submitButton.disabled = true;
    } else if (phoneValue.startsWith('+7') && phoneValue.length !== 12) {
        phoneField.textContent = 'Номер телефона, начинающийся с +7, должен иметь 12 символов';
        submitButton.disabled = true;
    } else if (phoneValue.startsWith('8') && phoneValue.length !== 11) {
        phoneField.textContent = 'Номер телефона, начинающийся с 8, должен иметь 11 символов';
        submitButton.disabled = true;
    } else {
        phoneField.textContent = '';
        submitButton.disabled = false;
    }
}

function validatePasswords() {
    if (passwordInput.value !== passwordRepeatInput.value) {
        passwordFiled.textContent = 'Пароли не совпадают';
        submitButton.disabled = true;
    } else {
        passwordFiled.textContent = ''
        submitButton.disabled = false;
    }
}

phoneInput.addEventListener('input', validatePhone);
passwordRepeatInput.addEventListener('input', validatePasswords);



