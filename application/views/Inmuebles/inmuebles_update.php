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
                        <h6 class="card-subtitle">Alta de inmueble</h6>
                        
                        <form class="form" method="post" action="<?php echo base_url('/index.php/inmuebles/postData/'.$id);?>">
                            <div class="form-group m-t-40 row">
                                <label for="nombre" class="col-2 col-form-label">Nombre del Inmueble</label>
                                <div class="col-10">
                                    <input class="form-control" type="text" value="<?echo $Nombre; ?>" name="nombre" required data-validation-required-message="Nombre de inmueble inválido.">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tipo" class="col-2 col-form-label">Tipo de Inmueble</label>        
                                <div class="col-10">
                                        <select class="custom-select col-12" name="tipo">
                                            <option>Selecciona una opción</option> 
                                            <? foreach ($tipoInmueble as $d) { 
                                                if($d->Nombre == $Tipo) { ?>
                                                    <option selected id="<?echo $d->id; ?>" value="<?echo $d->id; ?>"><? echo $d->Nombre; ?></option>      
                                                <?} else { ?>
                                                    <option id="<?echo $d->id; ?>" value="<?echo $d->id; ?>"><? echo $d->Nombre; ?></option>      
                                                <?}  ?>
                                            <? }?>
                                        </select>
                                </div>
                            </div>
                            <div class="form-group row validate">
                                <label for="precio" class="col-2 col-form-label">Precio del Inmueble</label>
                                <div class="col-10">
                                <div class="input-group">
                                    <input type="number" min="0" value="<?echo $Precio?>" name="precio" class="form-control" required data-validation-required-message="Campo requerido. Verifica que está correcto el valor." aria-invalid="false"> 
                                </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="disponibilidad" class="col-2 col-form-label">Disponibilidad</label>
                                <div class="col-10">
                                    <select class="custom-select col-12" name="disponibilidad">
                                        <option value="">Selecciona una opción</option>
                                        <? foreach ($dispInmueble as $d) { 
                                            if ( $d->Nombre == $Disponibilidad) { ?>      
                                            <option selected id="<?echo $d->id; ?>" value="<?echo $d->id; ?>"><? echo $d->Nombre; ?></option>                                                  
                                            <? } else {?>
                                                <option id="<?echo $d->id; ?>" value="<?echo $d->id; ?>"><? echo $d->Nombre; ?></option>                                                  
                                            <?}?>
                                        <?}?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="descripcion" class="col-2 col-form-label">Descripción</label>
                                <div class="col-10">
                                <div class="input-group">                                    
                                    <textarea rows="5" cols="10" class="form-control" name="descripcion" required data-validation-required-message="Descripción de inmueble inválido."><?echo $Descripcion?></textarea>
                                </div>
                                </div>
                            </div>             
                            <?if ($id == 0) { ?>
                                <button type="submit" class="btn waves-effect waves-light btn-secondary">Agregar</button>
                            <? } else { ?>
                                <button type="submit" class="btn waves-effect waves-light btn-secondary">Actualizar</button>
                            <? } ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>