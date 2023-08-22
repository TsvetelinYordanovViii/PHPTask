const submitDataEntryBtn = document.querySelectorAll('.submit-change-btn');
const dataFields = document.querySelectorAll('.data-field');
const changeForms = document.querySelectorAll('form');
const alertMessages = ['No username is entered.', 'Email is invalid.', 'No phone number is entered.'];

for (let i = 0; i < 3; i++) {
    submitDataEntryBtn[i].addEventListener('click', () => {
        if (!dataFields[i].checkValidity() || dataFields[i].value.trim() === '') {
            alert(alertMessages[i]);
        }
        else {
            changeForms[i].submit();
        }
    });
}