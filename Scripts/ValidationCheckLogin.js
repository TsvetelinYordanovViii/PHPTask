const submitBtn = document.querySelector('#submit-btn');

submitBtn.addEventListener('click', () => {
    const emailField = document.querySelector('#email');
    const passwordField = document.querySelector('#password');

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
