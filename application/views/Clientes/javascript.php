<script type="text/javascript">
    $(document).ready(function() {

        // Si no hay un estado seleccionado, 
        // entonces deshabilita el selector de municipios
        if($("#estados_select").val() == '') {
            $('#municipios_select').prop('disabled', true);
            $("#municipios_select").html('<option value="">No se ha seleccionado estado</option>'); 
        } else {
            $('#municipios_select').prop('disabled', false);
        }

        // Ver si se tienen o no que mostrar los referidos
        onComoSeEnteroChanged();

        // Cuando se seleccione un estado
        $("#estados_select").change(onEstadosChange);

        // Cuando cambie como se entero
        $("#entero_select").change(onComoSeEnteroChanged);

        // Seleccionar un estado y municipio si se esta actaulizando un record
        if($("#idCliente").text() != '0') {
            $('[name=estado]').val( $("#idEstado").text() );
            onEstadosChange($("#idMunicipio").text());
        }

        /**
         * Metodo para actualizar la lista de municipios
         */
        function onEstadosChange(idMuni) {
            id = $("#estados_select").val();

            if(id != '') {
                url = "<?php echo base_url('/Clientes/municipiosPorEstado'); ?>/" + id;

                $.getJSON(url)
                    .done(function(data) {
                        var items="";
                        $.each(data, function(index, item) {
                            selectedValue = "";
                            if(idMuni && idMuni == item.id) {
                                selectedValue = " selected "
                            }
                            items += "<option value='" + item.id + "' " + selectedValue + " >" + item.nombre + "</option>";
                        });
                        $('#municipios_select').prop('disabled', false);
                        $("#municipios_select").html(items); 
                    })
                    .fail(function(error) {
                        console.log('error: ', error);
                    });
            } else {
                $('#municipios_select').prop('disabled', true);
                $("#municipios_select").html('<option value="">No se ha seleccionado estado</option>'); 
            }
        }

        /**
         * Metodo para actualizar el referenciado
         */
        function onComoSeEnteroChanged() {
            text = $("#entero_select  option:selected").text();
            if (text == 'Referido por cliente') {
                $("#refClienteDiv").show();
                $("#cliRef").prop("required", true);
            } else {
                $("#refClienteDiv").hide();
                $("#cliRef").prop("required", false);
            }

            if (text == 'Referido por persona externa') {
                $("#refExtDiv").show();
                $("#nomRef").prop("required", true);
                $("#apeRef").prop("required", true);
            } else {
                $("#refExtDiv").hide();
                $("#nomRef").prop("required", false);
                $("#apeRef").prop("required", false);
            }
        }

    });
</script>