const submitBtn = document.querySelector('#reset-email-form');

submitBtn.addEventListener('click', () => {
    const emailField = document.querySelector('.data-field');

    if (!emailField.checkValidity()) {
        alert('Email address is invalid.');
    }
    else {
        document.querySelector('#login-form').submit();
    }
})