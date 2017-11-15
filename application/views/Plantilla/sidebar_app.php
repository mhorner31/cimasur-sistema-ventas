        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="user-profile"> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-account-circle"></i><span class="hide-menu"> Usuario Sistema</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="javascript:void()">Mi Perfil </a></li>
                                <li><a href="javascript:void()">Cambiar Contraseña</a></li>
                                <li><a href="<?php echo base_url();?>index.php/login/cerrarSesion">Cerrar Sesión</a></li>
                            </ul>
                        </li>
                        <li class="nav-devider"></li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Principal</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url();?>index.php/clientes">Clientes </a></li>
                                <li><a href="<?php echo base_url();?>index.php/inmuebles">Inmuebles</a></li>
                                <li><a href="<?php echo base_url();?>index.php/usuarios">Vendedores</a></li>
                            </ul>
                        </li>
                        <li class="nav-small-cap">ADMINISTRADOR</li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-laptop-chromebook"></i><span class="hide-menu">Sistema</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url();?>index.php/usuarios">Usuarios</a></li>
                                <li><a href="<?php echo base_url();?>index.php/clientes">Clientes</a></li>
                                <li><a href="<?php echo base_url();?>index.php/inmuebles">Inmuebles</a></li>
                                <li><a href="<?php echo base_url();?>index.php/citas">Citas</a></li>
                                <li><a href="<?php echo base_url();?>index.php/publicidad">Medios de Publcidad</a></li>
                                <li><a href="app-ticket.html">Base de Datos</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-file-chart"></i><span class="hide-menu">Medios de Publicidad</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url();?>index.php/publicidad">Lista de Medios</a></li>
                                <li><a href="<?php echo base_url();?>index.php/publicidad/update">Agregar Medios</a></li>
                            </ul>
                        </li>
                        <li class="nav-small-cap">VENDEDORES</li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-file"></i><span class="hide-menu">Clientes</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url();?>index.php/clientes">Lista de Clientes</a></li>
                                <li><a href="<?php echo base_url();?>index.php/clientes/update">Agregar Clientes</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-table"></i><span class="hide-menu">Citas</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url();?>index.php/citas">Lista de Citas</a></li>
                                <li><a href="<?php echo base_url();?>index.php/citas/update">Agregar Cita</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-home-variant"></i><span class="hide-menu">Inmuebles</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url();?>index.php/inmuebles">Catálogo</a></li>
                                <li><a href="<?php echo base_url();?>index.php/inmuebles/update">Agregar Inmueble ADMON</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-book-open-variant"></i><span class="hide-menu">Guia de Usuario</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url();?>index.php/guia">Guia 1</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->