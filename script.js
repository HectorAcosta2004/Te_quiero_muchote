$(document).ready(function() {
    // Cargar datos en la tabla al cargar la página
    loadTableData();

    // Editar datos al hacer clic en el botón Editar
    $(document).on('click', '.edit-btn', function() {
        var id = $(this).data('id');
        $.ajax({
            url: 'process.php',
            type: 'GET',
            data: { edit: id },
            success: function(response) {
                var data = JSON.parse(response);
                $('#id').val(data.id);
                $('#name').val(data.name);
                $('#email').val(data.email);
            }
        });
    });

    // Eliminar datos al hacer clic en el botón Eliminar
    $(document).on('click', '.delete-btn', function() {
        var id = $(this).data('id');
        $.ajax({
            url: 'process.php',
            type: 'GET',
            data: { delete: id },
            success: function(response) {
                alert(response);
                loadTableData();
            }
        });
    });

    // Función para cargar datos en la tabla
    function loadTableData() {
        $.ajax({
            url: 'process.php',
            type: 'GET',
            success: function(response) {
                $('tbody').html(response);
            }
        });
    }
});
