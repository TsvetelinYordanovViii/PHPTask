const submitBtn = document.querySelector('#submit-registration-btn');

submitBtn.addEventListener('click', () => {
    const usernameField = document.querySelector('#registration-username');
    const emailField = document.querySelector('#registration-email');
    const passwordField = document.querySelector('#registration-password');
    const phoneField = document.querySelector('#registration-phone');

    if (!usernameField.checkValidity() || usernameField.value.trim() === '') {
        alert('No username is entered.');
    }
    else if (!emailField.checkValidity()) {
        alert('Email address is invalid.');
    }
    else if (!phoneField.checkValidity() || phoneField.value.trim() === '') {
        alert('Phone number is required');
    }
    else if (!passwordField.checkValidity() || passwordField.value.length < 6) {
        alert('The password must be at least 6 characters');
    }
    else {
        document.querySelector('#register-form').submit();
    }
})
