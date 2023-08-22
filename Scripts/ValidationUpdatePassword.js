const submitDataEntryBtn = document.querySelectorAll('.submit-change-btn');
const dataFields = document.querySelectorAll('.data-field');
const changeForms = document.querySelectorAll('form');
const alertMessages = ['Old password field is empty or invalid.', 'New password must be longer than 5 characters'];

submitDataEntryBtn[0].addEventListener('click', () => {
    if (!dataFields[0].checkValidity() || dataFields[0].value.length < 6) {
        alert(alertMessages[0]);
    }
    else if (!dataFields[1].checkValidity() || dataFields[1].value.length < 6) {
        alert(alertMessages[1]);
    }
    else {
        changeForms[0].submit();
    }
});