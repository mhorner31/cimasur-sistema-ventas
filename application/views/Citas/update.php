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
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Insertar Cita</h3>
        </div>
        <div class="">
            <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
        </div>
    </div>
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
                    <h4 class="card-title">Basic Material inputs</h4>
                    <h6 class="card-subtitle">Just add <code>form-material</code> class to the form that's it.</h6>
                    <form class="form-material m-t-40" method="post" action="<?php echo base_url('index.php/citas/insertar');?>">
                        <div class="form-group">
                            <label>Cliente</label>
                            <select name="idCliente">
                                <? foreach ($Clientes as $c) { ?>      
                                    <option value="<? echo $c->Id ?>"><? echo $c->Nombres ?></option>      
                                <? }?>
                            </select> </div>
                        <div class="form-group">
                            <label>Número de Cita</label>
                            <input class="form-control" type="number" value="42" name="noCita"> </div>
                        <div class="form-group">
                            <label>Fecha</label>
                            <input class="form-control" type="datetime-local" value="2011-08-19T13:45:00" name="fecha"> </div>
                        <div class="form-group">
                            <label>Comentarios</label>
                            <textarea class="form-control" rows="5" name="comentarios"></textarea> </div>
                        <button type="submit" class="btn btn-info">Submit</button>
                    </form>
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