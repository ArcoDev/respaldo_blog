$(document).ready(function () {
    $('#guardar-multimedia-archivo').on('submit', function (e) {
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
                        'La url!',
                        'Se agrego correctamente.',
                        'success'
                    );
                    $('#loader').hide();
                    $('#guardar-multimedia-archivo')[0].reset();
                } else {
                    swal(
                        'Ooops!',
                        'No se puede cargar la url',
                        'error'
                    );
                }
                if (resultado.respuesta === 'actualizar') {
                    swal(
                        'La url!',
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
        var multimedia = $(this).attr('data-tipo');
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
                        'id': id,
                        'registro': 'eliminar'
                    },
                    url: 'modelo-' + multimedia + '.php',
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