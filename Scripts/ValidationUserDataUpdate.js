const submitDataEntryBtn = document.querySelectorAll('.submit-change-btn');
const dataFields = document.querySelectorAll('.data-field');
const changeForms = document.querySelectorAll('form');
const alertMessages = ['No username is entered.', 'Email is invalid.', 'No phone number is entered.'];

for (let i = 0; i < 3; i++) {
    submitDataEntryBtn[i].addEventListener('click', () => {
        const usernameField = document.querySelector('#registration-username');

        if (!dataFields[fieldIndex].checkValidity() || dataFields[fieldIndex].value.trim() === '') {
            alert(alertMessages[fieldIndex]);
        }
        else {
            changeForms.submit();
        }
        fieldIndex++;
    });
}