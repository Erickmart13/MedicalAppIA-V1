document.addEventListener('DOMContentLoaded', function() {
    const firstNameInput = document.getElementById('first_name');
    const lastNameInput = document.getElementById('last_name');
    const userNameInput = document.getElementById('user_name');

    function generateUsername() {
        const firstName = firstNameInput.value.trim();
        const lastName = lastNameInput.value.trim();

        // Combina el primer nombre y el apellido para crear el nombre de usuario
        // Puedes ajustar la lógica según prefieras
        let username = firstName + '.' + lastName;

        // // Añadir un identificador opcional como 'patient' o 'doctor'
        // const identifier = 'patient'; // Cambia a 'doctor' según sea necesario

        // // Agregar el identificador al nombre de usuario
        // if (identifier) {
        //     username += `.${identifier}`;
        // }

        // Asignar el nombre de usuario generado al input de usuario
        userNameInput.value = username.toLowerCase(); // Convertir a minúsculas
    }

    // Escuchar cambios en los campos de nombre y apellido
    firstNameInput.addEventListener('input', generateUsername);
    lastNameInput.addEventListener('input', generateUsername);
});
