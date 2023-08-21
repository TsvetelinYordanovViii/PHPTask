const submitBtn = document.querySelector('#submit-login-btn');

submitBtn.addEventListener('click', () => {
    const emailField = document.querySelector('#login-email');
    const passwordField = document.querySelector('#login-password');

    if (!emailField.checkValidity()) {
        alert('Email address is invalid.');
    }
    else if (!passwordField.checkValidity()) {
        alert('No password is entered.');
    }
    else {
        document.querySelector('#login-form').submit();
    }
})
