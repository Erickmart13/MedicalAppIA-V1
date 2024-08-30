document.addEventListener('DOMContentLoaded', function() {
    const dateOfBirthInput = document.getElementById('date_of_birth');
    const ageInput = document.getElementById('age');

    if (dateOfBirthInput && ageInput) {
        dateOfBirthInput.addEventListener('change', function() {
            const dob = new Date(dateOfBirthInput.value);
            const today = new Date();
            let age = today.getFullYear() - dob.getFullYear();
            const monthDifference = today.getMonth() - dob.getMonth();
            if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < dob.getDate())) {
                age--;
            }
            ageInput.value = age;
        });
    }
});