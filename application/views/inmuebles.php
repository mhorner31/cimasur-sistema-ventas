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
                        <h6 class="card-subtitle">Alta de inmuebles con descripción, precio y disponibilidad. </h6>
                        
                        <form class="form">
                            <div class="form-group m-t-40 row">
                                <label for="nombre" class="col-2 col-form-label">Nombre del Inmueble</label>
                                <div class="col-10">
                                    <input class="form-control" type="text" value="Departamento Planta Baja" id="nombre">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tipo" class="col-2 col-form-label">Tipo de Inmueble</label>
                                <div class="col-10">
                                        <select class="custom-select col-12" id="tipo">
                                            <option selected=""><?php echo $tipoIn->Nombre?></option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="precio" class="col-2 col-form-label">Precio del Inmueble</label>
                                <div class="col-10">
                                    <input class="form-control" type="number" value="1000000" id="precio">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="disponibilidad" class="col-2 col-form-label">Disponibilidad</label>
                                <div class="col-10">
                                    <select class="custom-select col-12" id="disponibilidad">
                                        <option selected="">Choose...</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="descripcion" class="col-2 col-form-label">Descripción</label>
                                <div class="col-10">
                                    <textarea class="form-control" value="Descripción" id="descripcion"></textarea>
                                </div>
                            </div>                    
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>