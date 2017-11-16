<script type="text/javascript">
    $(document).ready(function() {

        // Si no hay un estado seleccionado, 
        // entonces deshabilita el selector de municipios
        if($("#estados_select").val() == 0) {
            $('#municipios_select').prop('disabled', true);
            $("#municipios_select").html('<option value="0">No se ha seleccionado estado</option>'); 
        } else {
            $('#municipios_select').prop('disabled', false);
        }

        // Ver si se tienen o no que mostrar los referidos
        onComoSeEnteroChanged();

        // Cuando se seleccione un estado
        $("#estados_select").change(onEstadosChange);

        // Cuando cambie como se entero
        $("#entero_select").change(onComoSeEnteroChanged);

        /**
         * Metodo para actualizar la lista de municipios
         */
        function onEstadosChange() {
            id = $("#estados_select").val();

            if(id != 0) {
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
            } else {
                $('#municipios_select').prop('disabled', true);
                $("#municipios_select").html('<option value="0">No se ha seleccionado estado</option>'); 
            }
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