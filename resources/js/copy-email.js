document.addEventListener('DOMContentLoaded', function() {
    const personEmailInput = document.getElementById('person_email');
    const userEmailInput = document.getElementById('user_email');

    personEmailInput.addEventListener('input', function() {
        userEmailInput.value = personEmailInput.value;
    });
});
