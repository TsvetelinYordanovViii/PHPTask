const submitBtn = document.querySelector('.submit-change-btn');

submitBtn.addEventListener('click', () => {
    const emailField = document.querySelector('.data-field');

    if (!emailField.checkValidity()) {
        alert('Email address is invalid.');
    }
    else {
        document.querySelector('#reset-email-form').submit();
    }
})