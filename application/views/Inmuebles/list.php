
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
                    <h4 class="card-title">Inmuebles</h4>
                    <h6 class="card-subtitle">Exportar los inmuebles a Excel, PDF o Imprmirlos.</h6>
                    <div type="button" class="btn waves-effect waves-light btn-secondary">
                        <a href="<?php echo base_url('index.php/inmuebles/update/') ?>">Agregar Inmueble</a>
                    </div>
                    <div class="table-responsive m-t-40">
                        <table id="table" class="display wrap table table-hover table-striped table-bordered" 
                            cellspacing="0" width="97%">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Tipo</th>
                                    <th>Disponibilidad</th>
                                    <th>Precio</th>
                                    <th>Descripcion</th>
                                    <th>Eliminar</th>                                    
                                </tr>
                            </thead>
                            <tbody>                            
                            <? foreach($data as $d) { ?>
                                <tr>
                                    <th><a href="<?php echo base_url('index.php/inmuebles/update/'.$d->id);?>"><?echo $d->Nombre;?> </a></th>
                                    <th><?echo $d->Tipo?></th>
                                    <th><?echo $d->Disponibilidad?></th>
                                    <th><?echo $d->Precio?></th>
                                    <th><?echo $d->Descripcion;?></th>
                                    <th>
                                        <button type="button" class="btn waves-effect waves-light btn-secondary">
                                            <a href="<?php echo base_url('index.php/inmuebles/delete/'.$d->id) ?>">Eliminar</a>
                                        </button>
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