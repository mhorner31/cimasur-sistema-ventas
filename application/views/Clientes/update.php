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
                    <h4 class="card-title">Actualizar/Insertar Cliente</h4>
                    <h6 class="card-subtitle">Todos los campos son obligatorios.</h6>
                    <form class="form-material m-t-40" method="post" >
                        <div class="form-body">

                            <h3 class="card-title">Información Personal</h3>
                            <hr>

                            <div class="form-group">
                                <label for="nom">Nombre(s)</label>
                                <input type="text" class="form-control form-control-line" value="<? echo $nombres ?>" name="nombres"
                                       id="nom"> </div>
                            
                            <div class="form-group">
                                <label>Apellidos</label>
                                <input type="text" class="form-control form-control-line" value="<? echo $apellidos ?>" name="apellidos"> </div>
                            
                            <div class="form-group">
                                <label>Direccion (Calle y Número)</label>
                                <input type="text" class="form-control form-control-line" value="<? echo $direccion ?>" name="direccion"> </div>
                            
                            <div class="form-group">
                                <label>Colonia o Fraccionamiento</label>
                                <input type="text" class="form-control form-control-line" value="<? echo $colonia ?>" name="colonia"> </div>

                            <div class="form-group">
                                <label>Estado</label>
                                <select name="estado" id="estados_select">
                                    <option value="">Selecciona una opción</option>
                                    <? foreach ($Estados as $e) { ?>      
                                        <option value="<? echo $e->id ?>"><? echo $e->nombre?></option>      
                                    <? }?>
                                </select> </div>

                            <div class="form-group">
                                <label>Municipio o ciudad</label>
                                <select name="municipio" id="municipios_select" disabled>
                                    <option value="">No se ha seleccionado estado</option>
                                </select> </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" class="form-control" placeholder="ejemplo@gmail.com"
                                    value="<? echo $email ?>"> </div>

                            <br>
                            <h3 class="card-title">Información Adicional</h3>
                            <hr>

                            <div class="form-group">
                                <label>¿Cómo se enteró?</label>
                                <select name="comoSeEntero" id="entero_select">
                                    <option value="">Selecciona una opción</option>
                                    <? foreach ($ComoSeEntero as $e) { ?>      
                                        <option value="<? echo $e->id ?>"><? echo $e->Descripcion?></option>      
                                    <? }?>
                                </select> </div>

                            <div>
                                <div class="form-group">
                                <label>¿Hizo el recorrido?</label><br>
                                <div class="switch">
                                    <label>NO
                                    <input type="checkbox" checked><span class="lever"></span>SI</label> </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>¿Hizo el recorrido?</label><br>
                                <div class="switch">
                                    <label>NO
                                    <input type="checkbox" checked><span class="lever"></span>SI</label> </div>
                                </div>

                            <button type="submit" class="btn btn-info">Submit</button>
                        </div>
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