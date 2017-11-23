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
                    <h3 class="text-themecolor">Agregar nuevo usuario</h3>
                <? } else { ?>
                    <h3 class="text-themecolor">Actualizar usuario</h3>
                <?}?>      
            </div>
        </div>
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Usuarios</h4>
                        <h6 class="card-subtitle">Alta de usuario</h6>
                        
                        <form class="form" method="post" action="<?php echo base_url('/usuarios/postData/'.$id);?>">
                            <div class="form-group m-t-40 row">
                                <label for="usuario" class="col-2 col-form-label">Usuario</label>
                                <div class="col-10">
                                    <input class="form-control" type="text" value="<?echo $Nickname; ?>" name="nickname" required data-validation-required-message="Campo obligatorio">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tipo" class="col-2 col-form-label">Tipo de Usuario</label>        
                                <div class="col-10">
                                        <select class="custom-select col-12" name="tipo">
                                            <? foreach ($tipoUsuario as $d) { 
                                                if($d->Nombre == $Tipo) { ?>
                                                    <option selected id="<?echo $d->id; ?>" value="<?echo $d->id; ?>"><? echo $d->Nombre; ?></option>      
                                                <?} else { ?>
                                                    <option id="<?echo $d->id; ?>" value="<?echo $d->id; ?>"><? echo $d->Nombre; ?></option>      
                                                <?}  ?>
                                            <? }?>
                                        </select>
                                </div>
                            </div>
                            <div class="form-group m-t-40 row">
                                <label for="nombre" class="col-2 col-form-label">Nombre</label>
                                <div class="col-10">
                                    <input class="form-control" type="text" value="<?echo $Nombre; ?>" name="nombre" required data-validation-required-message="Campo obligatorio">
                                </div>
                            </div>
                            <div class="form-group m-t-40 row">
                                <label for="nombre" class="col-2 col-form-label">Apellidos</label>
                                <div class="col-10">
                                    <input class="form-control" type="text" value="<?echo $Apellidos; ?>" name="apellidos" required data-validation-required-message="Campo obligatorio">
                                </div>
                            </div>
                            <div class="form-group m-t-40 row">
                                <label for="nombre" class="col-2 col-form-label">Correo</label>
                                <div class="col-10">
                                    <input class="form-control" type="email" value="<?echo $Email; ?>" name="email" required data-validation-required-message="Campo obligatorio">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tipo" class="col-2 col-form-label">Estatus</label>        
                                <div class="col-10">
                                        <select class="custom-select col-12" name="estatus">
                                            <? foreach ($estatusUsuario as $d) { 
                                                if($d->Nombre == $Tipo) { ?>
                                                    <option selected id="<?echo $d->id; ?>" value="<?echo $d->id; ?>"><? echo $d->Nombre; ?></option>      
                                                <?} else { ?>
                                                    <option id="<?echo $d->id; ?>" value="<?echo $d->id; ?>"><? echo $d->Nombre; ?></option>      
                                                <?}  ?>
                                            <? }?>
                                        </select>
                                </div>
                            </div>
                            <div class="form-group m-t-40 row">
                                <label for="nombre" class="col-2 col-form-label">Contraseña</label>
                                <div class="col-10">
                                    <input type="password" name="password" class="form-control" value="<?echo $Password;?>">
                                </div>
                            </div>
                            <!--<div class="form-group m-t-40 row">
                                <label for="nombre" class="col-2 col-form-label">Confirmar Contraseña</label>
                                <div class="col-10">
                                    <input type="password" name="password2" data-validation-match-match="password" class="form-control" required> 
                                </div>
                            </div>-->
                                       
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