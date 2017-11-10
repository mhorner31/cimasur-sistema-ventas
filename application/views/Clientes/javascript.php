<script type="text/javascript">
    $(document).ready(function() {

        // Cuando se seleccione un estado
        $("#estados_select").change(onEstadosChange);


        /**
         * Metodo para actualizar la lista de municipios
         */
        function onEstadosChange() {
            id = $("#estados_select").val();
            url = "<?php echo base_url('index.php/Clientes/municipiosPorEstado'); ?>/" + id;

            $.getJSON(url)
                .done(function(data) {
                    var items="";
                    $.each(data, function(index, item) {
                        items += "<option value='" + item.id + "'>" + item.nombre + "</option>";
                    });
                    $('#municipios_select').prop('disabled', false);
                    $("#municipios_select").html(items); 
                })
                .fail(function(error) {
                    console.log('error: ', error);
                });
        }
    });
</script>