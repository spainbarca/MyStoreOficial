<aside class="main-sidebar sidebar-dark-primary elevation-4">

  <!--=====================================
  LOGO
  ======================================-->
  <a href="inicio" class="brand-link">
  
    <img src="vistas/img/plantilla/icono.jpg" class="brand-image img-circle elevation-3" style="opacity: .8">

    <span class="brand-text font-weight-light">MyStore</span>

  </a>

  <!--=====================================
  MENÚ
  ======================================-->

  <div class="sidebar">

    <nav class="mt-2">
      
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- botón Ver sitio -->

        <li class="nav-item">
          
          <a href="<?php echo $ruta; ?>" class="nav-link active" target="_blank">
            
            <i class="nav-icon fas fa-globe"></i>
            
            <p>Ver sitio</p>

          </a>

        </li>

        <?php if ($admin["perfil"] == "Administrador"): ?>

        <!-- Botón página dashboard -->

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="inicio" class="nav-link active">
                <i class="fas fa-home nav-icon "></i>
                <p>Inicio</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="reporteAdmin" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Reportes Administradores</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="reporteCategorias" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Reportes Categorías</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="reporteProductos" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Reportes Productos</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="reporteTestimonios" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Reportes Testimonios</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="reporteCliente" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Reportes Clientes</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="reporteEmpresa" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Reportes Empresas</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="reportes" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Reportes Ventas</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Botón página administradores -->
          
          <li class="nav-item">

            <a href="administradores" class="nav-link">

              <i class="nav-icon fas fa-users-cog"></i>

              <p>Usuarios</p>

            </a>

          </li>

        <?php endif ?>

        <!-- Botón página banner -->

        <li class="nav-item">
          <a href="banner" class="nav-link">
            <i class="nav-icon far fa-images"></i>
            <p>
              Banner
            </p>
          </a>
        </li>

        <!-- Botón página planes -->

        <li class="nav-item">
          
          <a href="planes" class="nav-link">
            
            <i class="nav-icon fas fa-umbrella-beach"></i>
            
            <p>Temporadas</p>
          
          </a>

        </li>

        <!-- Botón página categorías -->

        <li class="nav-item">
          
          <a href="categorias" class="nav-link">
            
            <i class="nav-icon fas fa-list-ul"></i>
            
            <p>Categorías</p>
          
          </a>

        </li>

        <!-- Botón página habitaciones -->

        <li class="nav-item">

          <a href="habitaciones" class="nav-link">

            <i class="nav-icon fab fa-font-awesome-flag"></i>
            
            <p>Subcategorías</p>

          </a>

        </li>

        <li class="nav-item">

          <a href="etiquetas" class="nav-link">

            <i class="nav-icon fas fa-tags"></i>
            
            <p>Etiquetas</p>

          </a>

        </li>

        <!-- Botón página productos -->
        <li class="nav-item">
          
          <a href="productos" class="nav-link">
            
            <i class="nav-icon fab fa-product-hunt"></i>
            
            <p>Productos</p>

          </a>

        </li>

        <!-- Botón página testimonios -->

        <li class="nav-item">

          <a href="testimonios" class="nav-link">

            <i class="nav-icon fas fa-book-reader"></i>

            <p>Testimonios</p>

          </a>

        </li>

      

        <!-- Botón página recorrido -->

        <li class="nav-item">

          <a href="recorrido" class="nav-link">

            <i class="nav-icon fas fa-city"></i>

            <p>Recorrido</p>

          </a>

        </li>

        <!-- Botón página restaurante -->

        <li class="nav-item">
          
          <a href="restaurante" class="nav-link">
            
            <i class="nav-icon fas fa-business-time"></i>
            
            <p>Empresa</p>

          </a>

        </li>

          <!-- Botón página clientes -->

          <?php if ($admin["perfil"] == "Administrador"): ?>         

          <li class="nav-item">
          
          <a href="clientes" class="nav-link">
            
            <i class="nav-icon fas fa-users"></i>
            
            <p>Clientes</p>

          </a>

          </li>

          <?php endif ?>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-shopping-bag"></i>
              <p>
                Ventas
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">3</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="ventas" class="nav-link">
                  <i class="fas fa-folder-open nav-icon"></i>
                  <p>Administrar ventas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="crear-venta" class="nav-link">
                  <i class="fas fa-cart-plus nav-icon"></i>
                  <p>Crear venta</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="reportes" class="nav-link">
                  <i class="fas fa-chart-pie nav-icon"></i>
                  <p>Reporte de ventas</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item">
          
          <a href="correo" class="nav-link">
            
            <i class="nav-icon fas fa-bullhorn"></i>
            
            <p>Marketing</p>

          </a>

          </li>


          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link active">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Correo
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="mail" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inbox</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="redactar" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Redactar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="leer" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Leer</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
          
          <a href="contacto" class="nav-link">
            
            <i class="nav-icon fas fa-comments"></i>
            
            <p>Contacto</p>

          </a>

          </li>


          <!-- Botón página clientes -->

          <?php if ($admin["perfil"] == "Administrador"): ?>         

          <li class="nav-item">

          <a href="rfm" class="nav-link">
            
            <i class="nav-icon fas fa-tools"></i>
            
            <p>Modelo RFM</p>

          </a>

          </li>

          <?php endif ?>
    </nav>
  
  </div>

</aside>