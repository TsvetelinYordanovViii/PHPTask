const submit = document.querySelector('#submit');

submit.addEventListener('click', () => {
    const usernameField = document.querySelector('#username');
    const emailField = document.querySelector('#email');
    const passwordField = document.querySelector('#password');
    const phoneField = document.querySelector('#phone');

    const registrationForm = document.querySelector('form');

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
        alert('test')
        registrationForm.submit();
    }
})
