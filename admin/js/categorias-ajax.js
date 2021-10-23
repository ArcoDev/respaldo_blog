$(document).ready(function () {
    $('#guardar-categoria-archivo').on('submit', function (e) {
        e.preventDefault();

        var datos = new FormData(this);

        $.ajax({
            type: $(this).attr('method'),
            data: datos,
            url: $(this).attr('action'),
            dataType: 'json',
            contentType: false,
            processData: false,
            async: true,
            cache: false,
            beforeSend: function () {
                $('#loader').show();
            },
            success: function (data) {
                var resultado = data;
                if (resultado.respuesta === 'exito') {
                    swal(
                        'La categoría!',
                        'Se agrego correctamente.',
                        'success'
                    );
                    $('#loader').hide();
                    $('#guardar-categoria-archivo')[0].reset();
                } else {
                    swal(
                        'Ooops!',
                        'No se puede cargar la categoría',
                        'error'
                    );
                }
                if (resultado.respuesta === 'actualizar') {
                    swal(
                        'La categoría!',
                        'Se edito correctamente.',
                        'success'
                    );
                }
            }
        });
    });
    /* Eliminar registro */
    $('.borrar_registro').on('click', function (e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        var categoria = $(this).attr('data-tipo');
        swal({
            title: 'Estas seguro?',
            text: "Esta acción no se puede revertir!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si! Eliminar',
            cancelButtonText: 'Cancelar'

        }).then(function (result) {
            if (result.value) {
                $.ajax({
                    type: 'post',
                    data: {
                        'id_cat': id,
                        'registro': 'eliminar'
                    },
                    url: 'modelo-' + categoria + '.php',
                    success: function (data) {
                        var resultado = JSON.parse(data);
                        if (resultado.respuesta == 'exito') {
                            swal(
                                'Eliminado!',
                                'Registro eliminado',
                                'success'
                            );
                            jQuery("[data-id='" + resultado.id_eliminado + "'").parents('tr').remove();
                        } else {
                            swal(
                                'Error!',
                                'No se pudo eliminar, intente de nuevo.',
                                'error'
                            );

                        }
                    }
                });
            }
        });

    });
});