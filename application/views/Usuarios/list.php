
<div class="page-wrapper">

<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Usuarios</h4>
                    <h6 class="card-subtitle">Exportar los usuarios a Excel, PDF o Imprmirlos.</h6>
                    <div type="button" class="btn waves-effect waves-light btn-secondary">
                        <a href="<?php echo base_url('index.php/usuarios/update/') ?>">Agregar Usuario</a>
                    </div>
                    <div class="table-responsive m-t-40">
                        <table id="table" class="display wrap table table-hover table-striped table-bordered" 
                            cellspacing="0" width="97%">
                            <thead>
                                <tr>
                                    <th>Usuario</th>
                                    <th>Tipo</th>
                                    <th>Nombre</th>
                                    <th>Apellidos</th>
                                    <th>Correo</th>
                                    <th>Estatus</th>
                                    <th>Acciones</th>                                    
                                </tr>
                            </thead>
                            <tbody>                            
                            <? foreach($data as $d) { ?>
                                <tr>
                                    <th><a href="<?php echo base_url('index.php/usuarios/update/'.$d->id);?>"><?echo $d->nickname;?> </a></th>
                                    <th><?echo $d->Tipo?></th>
                                    <th><?echo $d->Nombre?></th>
                                    <th><?echo $d->Apellidos?></th>
                                    <th><?echo $d->email;?></th>
                                    <th><?echo $d->Estatus;?></th>
                                    <th>
                                        <a class="btn waves-effect waves-light btn-secondary" onclick="if (confirm('¿Desea activar el usuario?')) { location.href = '<?php echo base_url('index.php/usuarios/activar/'.$d->id) ?>'; } return false;">
                                            Activar
                                        </a>
                                        <a class="btn waves-effect waves-light btn-secondary" onclick="if (confirm('¿Desea elimiar la selección?')) { location.href = '<?php echo base_url('index.php/usuarios/delete/'.$d->id) ?>'; } return false;">
                                            Eliminar
                                        </a>
                                    </th>
                                </tr>
                            <?}?>
                            </tbody>                            
                        </table>
                    </div>
                </div>
            </div>         
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
<!-- ============================================================== -->