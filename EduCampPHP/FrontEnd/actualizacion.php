<?php include "Includes/header.php"; include "../Business/Presentacion.php";?> <!--Se hacen estos includes para agilizar el contenido recursivo en cada etapa-->


<?php 
if(isset($_POST["ActualAlumno"]))
{
    $cedula =$_POST["cedula"];
    $nombre =$_POST["nombre"];
    $apellido_1 =$_POST["apellido_1"];
    $apellido_2 =$_POST["apellido_2"];
    $email =$_POST["email"];
    if(empty($cedula)||empty($nombre)||empty($apellido_1)||empty($apellido_2)||empty($email)|| !is_numeric($cedula))
    {
        try{
            throw new Exception("El formato de entrada no es correcto o ya existe el usuario porfavor ingrese los datos nuevamente"); // si no inserta todos los valores salta a la pagina de aviso
        }catch(Exception $e){
            $_SESSION['error_message'] = 'Ha ocurrido un error: ' . $e->getMessage();
            header('Location: 404.php');
            exit;
        }
    }
    else {
        try
        {
            $layer = new ObtenerData();
            $soli = $layer->Send_Alumno([$cedula,$nombre,$apellido_1,$apellido_2,$email]);
        }catch(Exception $e){
            $_SESSION['error_message'] = 'Ha ocurrido un error: ' . $e->getMessage();
            header('Location: 404.php');
            exit;
        }
    }
}else if (isset($_POST["ElimAlumno"])){
    $cedula =$_POST["cedula"];
    if(empty($cedula)|| !is_numeric($cedula))
    {
        try{
            throw new Exception("El formato de entrada no es correcto porfavor ingrese los datos nuevamente"); // si no inserta todos los valores salta a la pagina de aviso
        }catch(Exception $e){
            $_SESSION['error_message'] = 'Ha ocurrido un error: ' . $e->getMessage();
            header('Location: 404.php');
            exit;
        }
    }
    else {
        try
        {
            $layer = new ObtenerData();
            $soli = $layer->Eliminar_Alumno([$cedula]);
        }catch(Exception $e){
            $_SESSION['error_message'] = 'Ha ocurrido un error: ' . $e->getMessage();
            header('Location: 404.php');
            exit;
        }
    }
}
?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">EduCamp <sup>&copy</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            
            <!-- Nav Item - index -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Lista Estudiantes</span></a>
            </li>

            <!-- Nav Item - creación -->
            <li class="nav-item">
                <a class="nav-link" href="creacion.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Creación Estudiantes</span></a>
            </li>

             <!-- Nav Item - actualización -->
             <li class="nav-item active">
                <a class="nav-link" href="actualizacion.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Actualización Estudiante</span></a>
            </li>
            <!-- Nav Item - cursos -->
            <li class="nav-item">
                <a class="nav-link active" href="cursos.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Cursos</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg"
                                            alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_3.svg"
                                            alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="card-header">               
                <div class="row">  
                    <h1 class="h3 mb-2 text-gray-800">Actualizar un alumno</h1>  
                </div>
                <p>Formato: la cédula es la forma de encontrar al alumno, por lo que no puede ser modificada.</br>Coloque los datos correctos en su casilla correspondiente y precione Actualizar Alumno.</br> Para dar de baja al estudiante coloque la cédula en cédula(busqueda) de click al botón eliminar.</p>     
              <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <form role="form" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">            

                                <div class="mb-3">
                                    <label for="cedula" class="form-label">Cédula(Búsqueda):</label>
                                    <input type="text" max="16" name="cedula" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Nombre:</label>
                                    <input type="text" name="nombre" class="form-control" >
                                </div>

                                <div class="mb-3">
                                    <label for="apellido_1" class="form-label">Apellido Paterno:</label>
                                    <input type="text" name="apellido_1" class="form-control">
                                </div>    

                                <div class="mb-3">
                                    <label for="apellido_2" class="form-label">Apellido Materno:</label>
                                    <input type="text" name="apellido_2" class="form-control">
                                </div> 
                                <div class="mb-3">
                                    <label for="email" class="form-label">Correo:</label>
                                    <input type="email" name="email" class="form-control">
                                </div>       


                                <button type="submit" name="ActualAlumno" class="btn btn-primary"><i class="fas fa-cog"></i> Actualizar Alumno</button>  
                                <button type="submit" name="ElimAlumno" class="btn btn-primary"><i class="fas fa-trash"></i> Eliminar Alumno</button> 
                                
                            </form>
                        </div>
                    </div>
                </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include "Includes/footer.php"?><!--Se hacen estos includes para agilizar el contenido recursivo en cada etapa-->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

   <?php include "Includes/boost.php"?><!--Se hacen estos includes para agilizar el contenido recursivo en cada etapa-->

</body>

</html>