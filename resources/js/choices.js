import Choices from 'choices.js';
import '../../node_modules/choices.js/public/assets/styles/choices.min.css';

document.addEventListener('DOMContentLoaded', () => {
    const element = document.querySelector('#my-multiselect');

    // Obtener las opciones del select
    const options = Array.from(element.options);

    // Array con los días de la semana en el idioma que se encuentran en el select
    const orderedDays = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'];

    // Ordenar las opciones según los días de la semana
    options.sort((a, b) => {
        return orderedDays.indexOf(a.textContent.trim()) - orderedDays.indexOf(b.textContent.trim());
    });

    // Remover las opciones actuales del select
    element.innerHTML = '';

    // Añadir las opciones ordenadas de nuevo al select
    options.forEach(option => element.add(option));

    // Inicializar Choices.js después de ordenar
    const choices = new Choices(element, {
        removeItemButton: true,  // Añadir un botón para remover elementos seleccionados
    });
});
