
<body class="hold-transition login-page">
  <!-- <img src="vistas/img/banner/fondo.jpg" class="img-fluid" alt=""> -->

  <div class="login-box">

    <div class="login-logo">

      <a href="<?php echo $ruta?>">My Store</a>
    
    </div>
    <!-- /.login-logo -->

    <div class="card">

      <div class="card-body login-card-body">

        <p class="login-box-msg">Iniciar Sesión</p>

        <form method="post">

          <div class="input-group mb-3">

            <input type="text" class="form-control" placeholder="Usuario" name="ingresoUsuario">

            <div class="input-group-append">

              <div class="input-group-text">

                <span class="fas fa-envelope"></span>

              </div>

            </div>

          </div>

          <div class="input-group mb-3">

            <input type="password" class="form-control" placeholder="Password" name="ingresoPassword">

            <div class="input-group-append">

              <div class="input-group-text">

                <span class="fas fa-lock"></span>

              </div>

            </div>

          </div>        

          <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button> 

          <?php

          $ingreso = new ControladorAdministradores();
          $ingreso -> ctrIngresoAdministradores(); 

          ?>   
   
        </form>

      </div>
      <!-- /.login-card-body -->
    </div>

  </div>
  <!-- /.login-box -->

</body>