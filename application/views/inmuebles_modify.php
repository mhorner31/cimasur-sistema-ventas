<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor">Alta de Inmueble</h3>
            </div>
        </div>
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Inmuebles</h4>
                        <h6 class="card-subtitle">Alta de inmuebles con descripción, precio y disponibilidad. </h6>
                        
                        <form class="form">
                            <div class="form-group m-t-40 row">
                                <label for="nombre" class="col-2 col-form-label">Nombre del Inmueble</label>
                                <div class="col-10">
                                    <input class="form-control" type="text" value="" id="nombre" required data-validation-required-message="Nombre de inmueble inválido.">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tipo" class="col-2 col-form-label">Tipo de Inmueble</label>
                               
                                <div class="col-10">
                                        <select class="custom-select col-12" id="tipo">
                                            <option selected="">Selecciona una opción</option>
                                            <? foreach ($tipoInmueble as $d) { ?>      
                                                 <option value="<? $d->id ?>"><? echo $d->Nombre ?></option>      
                                             <? }?>
                                        </select>
                                </div>
                            </div>
                            <div class="form-group row validate">
                                <label for="precio" class="col-2 col-form-label">Precio del Inmueble</label>
                                <div class="col-10">
                                <div class="input-group">
                                    <input type="number" min="0" value="0" name="onlyNum" class="form-control" required="" data-validation-required-message="Campo requerido. Verifica que está correcto el valor." aria-invalid="false"> </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="disponibilidad" class="col-2 col-form-label">Disponibilidad</label>
                                <div class="col-10">
                                    <select class="custom-select col-12" id="disponibilidad">
                                        <option selected="">Selecciona una opción</option>
                                        <? foreach ($dispInmueble as $d) { ?>      
                                            <option value="<? $d->id ?>"><? echo $d->Nombre ?></option>      
                                        <? }?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="descripcion" class="col-2 col-form-label">Descripción</label>
                                <div class="col-10">
                                    <textarea class="form-control" value="" id="descripcion" required data-validation-required-message="Descripción de inmueble inválido."></textarea>
                                </div>
                            </div>                    
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>