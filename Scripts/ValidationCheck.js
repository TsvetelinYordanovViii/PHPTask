const submitBtn = document.querySelector('#submit-btn');

submitBtn.addEventListener('click', () => {
    const usernameField = document.querySelector('#username');
    const emailField = document.querySelector('#email');
    const passwordField = document.querySelector('#password');
    const phoneField = document.querySelector('#phone');

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
