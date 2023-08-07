<?php if(!isset($_SESSION)) { session_start(); } ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistema Otomies</title>

	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="../css/admin/sb-admin-2.min.css" rel="stylesheet">
	<link href="../Admin/style.css" rel="stylesheet" type="text/css" />
   
    
    <link rel="shortcut icon" href="../css/Otomies-gourment.ico">
	<!--iconos-->
	<script src="https://kit.fontawesome.com/646ac4fad6.js" crossorigin="anonymous"></script>



       <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
       <script src="../js/jquery.min.js"></script>

       <link href="../css/animate.css" rel="stylesheet" type="text/css" media="all">
       <script src="../js/wow.min.js"></script>
       <script>
         new WOW().init();
      </script>

</head>
<body>


<?php
if($_SESSION['loginstatus']=="")
{
	header("location:loginform.php");
}
?>




</head>

<body id="page-top">
      
  
    <div id="wrapper">
        
        <ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">

         <hr>
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
					<div class="navbar-brand" href="#">
                        <img  src="../images/otomies.png" width="100%">
                     </div>
             </a>

            <hr>
            <hr>

            <li class="nav-item active" >
                <a class="nav-link" href="">
                    <span>Marcas Otomies</span></a>
            </li>


            <hr class="sidebar-divider">    


            
            <li class="dropdown">
                <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<i class="fa-solid fa-user"></i>
                         <span>Usuarios</span></a>
                </button>
				
      

                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenu2">
				<?php if($_SESSION["usertype"]=="Admin")
                 {?>
                    <li><a class="dropdown-item active" href="../Admin/Añadir-Usuario.php">
                         <span>Añadir usuario</span></a>
                    </li>
                    <li><a class="dropdown-item" href="../Admin/Modificar-Usuario.php">
                                 <span>Modificar usuario</span></a>
                    </li>
					<li><a class="dropdown-item" href="../Admin/Eliminar-Usuario.php">
                                 <span>Ekiminar usuario</span></a>
                    </li> 
				<?php }?>    
                </ul>
		
            </li>



			<li class="dropdown">
                <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<i class="fa-solid fa-list"></i>
                         <span>Categorias-Turismo</span></a>
                </button>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenu2">
                    <li><a class="dropdown-item active" href="../Admin/Añadir-Categoria.php">
                         <span>Añadir categoria</span></a>
                    </li>

			  <?php if($_SESSION["usertype"]=="Admin")
              {?>
                    <li><a class="dropdown-item" href="../Admin/Modificar-Categoria.php">
                                 <span>Modificar categoria</span></a>
                    </li>
					<li><a class="dropdown-item" href="../Admin/Eliminar-Categoria.php">
                                 <span>Eliminar categoria</span></a>
                    </li>
			 <?php }?>

					<li><a class="dropdown-item" href="../Admin/Ver-Categoria.php">
                                 <span>Ver categorias</span></a>
                    </li>     
                </ul>
            </li>


			<li class="dropdown">
                <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         <span>Subcategorias-Turismo</span></a>
                </button>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenu2">
                    <li><a class="dropdown-item active" href="../Admin/Añadir-Subcategoria.php">
                         <span>Añadir subcategoria</span></a>
                    </li>

				<?php if($_SESSION["usertype"]=="Admin")
                {?>
                    <li><a class="dropdown-item" href="../Admin/Modificar-Subcategoria.php">
                                 <span>Modificar subcategoria</span></a>
                    </li>
					<li><a class="dropdown-item" href="../Admin/Eliminar-Subcategoria.php">
                                 <span>Eliminar subcategoria</span></a>
                    </li>
				<?php }?>
					<li><a class="dropdown-item" href="../Admin/Ver-Subcategoria.php">
                                 <span>Ver subcategoria</span></a>
                    </li>       
                </ul>
            </li>



			<li class="dropdown">
                <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				        <i class="fa-solid fa-box-archive"></i>
				    <span>Paquetes turisticos</span></a>
                </button>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenu2">
                    <li><a class="dropdown-item active" href="../Admin/Añadir-Paquete.php">
                         <span>Añadir paquete</span></a>
                    </li>
			<?php if($_SESSION["usertype"]=="Admin")
             {?>
                    <li><a class="dropdown-item" href="../Admin/Modificar-Paquete.php">
                                 <span>Modificar paquete</span></a>
                    </li>
					<li><a class="dropdown-item" href="../Admin/Eliminar Paquete.php">
                                 <span>Eliminar paquete</span></a>
                    </li>
			<?php }?>
					<li><a class="dropdown-item" href="../Admin/Ver-Paquete.php">
                                 <span>Ver paquete</span></a>
                    </li>
                        
                        
                </ul>
            </li>



			<li class="dropdown">
                <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				         <i class="fa-brands fa-product-hunt"></i>
				    <span>Productos Gourment</span></a>
                </button>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenu2">
                    <li><a class="dropdown-item active" href="../Admin/Añadir-Producto.php">
                         <span>Añadir producto</span></a>
                    </li>
			<?php if($_SESSION["usertype"]=="Admin")
            {?>
					<li><a class="dropdown-item" href="../Admin/Eliminar-Producto.php">
                                 <span>Eliminar producto</span></a>
                    </li>
			<?php }?>
					<li><a class="dropdown-item" href="../Admin/Ver-Producto.php">
                                 <span>Ver producto</span></a>
                    </li>        
                </ul>
            </li>

			<hr class="sidebar-divider"> 


			<li class="nav-item" >
                <a class="nav-link" href="../Admin/Ver-Consultas.php">
                    <span>Ver consultas</span></a>
            </li> 




            

        </ul>
       

        <div id="content-wrapper" class="d-flex flex-column">

            
            <div id="content">

                
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <ul class="navbar-nav ml-auto">

                       
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                        
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"></span>
                                <img class="img-profile rounded-circle" src="../images/otomies.png">
                            </a>
                            
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="../index.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Pagina web
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Cerrar sesion
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                

                
                <div class="container-fluid">


				</div>
        
</div>







