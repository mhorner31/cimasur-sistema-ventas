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
                <?if ($id == 0) { ?>
                    <h3 class="text-themecolor">Agregar nuevo medio de publicidad</h3>
                <? } else { ?>
                    <h3 class="text-themecolor">Actualizar medio de publicidad</h3>
                <?}?>                
            </div>
        </div>
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Publicidad</h4>
                        <h6 class="card-subtitle">Agregar nuevo medio de publicidad</h6>
                        
                        <form class="form" method="post" action="<?php echo base_url('/publicidad/postData/'.$id);?>">                
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