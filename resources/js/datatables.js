$(document).ready(function() {
    $('#table').DataTable({
        paging: true, // Habilitar paginación
        lengthMenu: [10, 20, 50, 100], // Opciones para el menú de selección de entradas
        language: {
            lengthMenu: "Mostrar _MENU_ entradas", // Texto del menú de selección de entradas
            zeroRecords: "No se encontraron resultados", // Texto cuando no hay registros
            info: "Mostrando _START_ a _END_ de _TOTAL_ entradas", // Texto de información
            infoEmpty: "No hay entradas disponibles", // Texto cuando no hay entradas
            infoFiltered: "(filtrado de _MAX_ entradas totales)", // Texto de filtro
            search: "Buscar: ", // Texto del campo de búsqueda
            paginate: {
                first: "Primera",
                previous: "Anterior",
                next: "Siguiente",
                last: "Última"
            }
    
        },
        // Otras opciones de configuración según sea necesario
        
    });

    
});
