const submitDataEntryBtn = document.querySelectorAll('.submit-change-btn');
const dataFields = document.querySelectorAll('.data-field');
const resetForm = document.querySelector('#reset-password-form');
const alertMessages = ['Reset code is invalid.', 'New password must be longer than 5 characters.'];

submitDataEntryBtn[0].addEventListener('click', () => {
    if (dataFields[0].value !== 'RESET') {
        alert(alertMessages[0]);
    }
    else if (!dataFields[1].checkValidity() || dataFields[1].value.length < 6) {
        alert(alertMessages[1]);
    }
    else {
        resetForm.submit();
    }
});