<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Insertar Cita</h3>
        </div>
        <div class="">
            <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
        </div>
    </div> -->
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Citas</h4>
                    <h6 class="card-subtitle">Exportar las citas a Excel, PDF o imprimirlas</h6>
                    <button type="button" class="btn waves-effect waves-light btn-secondary">
                        <a href="<?php echo base_url('index.php/citas/update/') ?>">Agregar Nueva Cita</a>
                    </button>
                    <div class="table-responsive m-t-40">
                        <table id="citasList" class="display nowrap table table-hover table-striped table-bordered" 
                            cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                <th>Cliente</th>
                                <th>NoCita</th>
                                <th>Interes</th>
                                <th>Fecha</th>
                                <th>Actualizar</th>
                                </tr>
                            </thead>
                            <tbody>                            
                                <? foreach($Citas as $d) { ?>
                                    <tr>
                                        <th><?echo $d->Nombres . " " . $d->Apellidos?></th>
                                        <th><?echo $d->NoCita?></th>
                                        <th><?echo $d->Interesado?></th>
                                        <th><?echo $d->Fecha?></th>
                                        <th>
                                            <form method="POST" action="<?php echo base_url('index.php/citas/update/'.$d->id);?>">
                                                <button type="submit" class="btn btn-danger btn-xs">Actualizar</button>
                                            </form>
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
    <!-- End Page Content -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->