
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
                    <h6 class="card-subtitle">Exportar los inmuebles a CSV, Excel, PDF o Imprmirlos</h6>
                    <div class="table-responsive m-t-40">
                        <table id="inmuebles" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Tipo</th>
                                    <th>Disponibilidad</th>
                                    <th>Precio</th>
                                </tr>
                            </thead>
                            <tbody>                            
                            <? foreach($data as $d) { ?>
                                <tr>
                                    <th><?echo $d->Nombre?></th>
                                    <th><?echo $d->Tipo?></th>
                                    <th><?echo $d->Disponibilidad?></th>
                                    <th><?echo $d->Precio?></th>
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