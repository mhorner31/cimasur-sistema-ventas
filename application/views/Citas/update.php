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
                    <h4 class="card-title">Actualizar/Insertar Cita</h4>
                    <h6 class="card-subtitle">Todos los campos son obligatorios.</h6>
                    <form class="form-material m-t-40" method="post" action="<?php echo base_url('index.php/citas/postData/'.$IdCita);?>">
                        <div class="form-group">
                            <label>Cliente</label>
                            <select name="idCliente">
                                <? foreach ($Clientes as $c) { ?>      
                                    <option value="<? echo $c->Id ?>"><? echo $c->Nombres . " " . $c->Apellidos ?></option>      
                                <? }?>
                            </select> </div>
                        <div class="form-group">
                            <label>Número de Cita</label>
                            <input class="form-control" type="number" value="<? echo $noCita ?>" name="noCita"> </div>
                        <div class="form-group">
                            <label>Fecha</label>
                            <input class="form-control" type="datetime-local" value="<? echo $fecha ?>" name="fecha"> </div>
                        <div class="form-group">
                            <label>Comentarios</label>
                            <textarea class="form-control" rows="5" name="comentarios"><? echo $comentarios ?></textarea> </div>
                        <div class="form-group">
                            <label>Inmueble</label><br>
                            <select name="idInmueble">
                                <? foreach ($Inmuebles as $i) { ?>      
                                    <option value="<? echo $i->id ?>"><? echo $i->Nombre . "  -  $" . $i->Precio . "  -  " . $i->Disponibilidad ?></option>      
                                <? }?>
                            </select> </div>
                        <div class="form-group">
                            <label>Nivel de Interés en el Inmueble</label><br>
                            <select name="tipoInteresadoId">
                                <? foreach ($TipoInteresados as $t) { ?>      
                                    <option value="<? echo $t->id ?>"><? echo $t->Nombre ?></option>      
                                <? }?>
                            </select> </div>
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