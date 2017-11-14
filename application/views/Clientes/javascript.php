<script type="text/javascript">
    $(document).ready(function() {

        // Tiene que estar oculta al principio
        $("#refClienteDiv").hide();
        $("#refExtDiv").hide();

        // Cuando se seleccione un estado
        $("#estados_select").change(onEstadosChange);

        // Cuando cambie como se entero
        $("#entero_select").change(onComoSeEnteroChanged);

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

        /**
         * Metodo para actualizar el referenciado
         */
        function onComoSeEnteroChanged() {
            text = $("#entero_select  option:selected").text();
            if (text == 'Referido por cliente') {
                $("#refClienteDiv").show();
            } else {
                $("#refClienteDiv").hide();
            }

            if (text == 'Referido por persona externa') {
                $("#refExtDiv").show();
            } else {
                $("#refExtDiv").hide();
            }
        }

    });
</script>