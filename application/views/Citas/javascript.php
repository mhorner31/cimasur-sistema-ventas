<script type="text/javascript">
    $(document).ready(function() {
        // Valor inicial
        onClienteChanged();

        // Cuando se seleccione un cliente
        $("#clientes_select").change(onClienteChanged);

        /**
         * Metodo para obtener el numero de cita mas pequeño
         */
        function onClienteChanged() {
            id = $("#clientes_select").val();
            console.log("Id Cliente " + id);

            if(id != '')
            {
                url = "<?php echo base_url('/Citas/sigNoCita'); ?>/" + id;
                $.getJSON(url)
                    .done(function(data) {
                        console.log(data);
                        $("#citaNoInput").val(data.nextNo);
                        //$('#citaNoInput').prop('readonly', false);
                        $('#citaNoInput').attr('min', data.nextNo);
                    })
                    .fail(function(error) {
                        console.log('error: ', error);
                    });
            } else {
                $("#citaNoInput").val(0);
                //$('#citaNoInput').prop('readonly', true);
            }
        }

    });
</script>