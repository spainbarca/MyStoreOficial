<?php 

  if($admin["perfil"] != "Administrador"){

    echo '<script>

      window.location = "banner";

    </script>';

    return;

  }

 ?>

<div class="content-wrapper" style="min-height: 717px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Enviar correo electrónico Gmail</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
            <li class="breadcrumb-item active">Enviar Correo</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
 <section class="content">

    <div class="card card-primary card-outline" >

      <div class="card-body">

        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Formulario</title>
            <link rel="stylesheet" href="vistas/css/estilosCorreo.css">
            <link href="https://fonts.googleapis.com/css?family=Poppins:400,800,900" rel="stylesheet">
        </head>
        <body>
        <!-- Hola qué tal, te recuerdo que la web es de uso libre -->
        <!-- usala para lo que desees y no olvides suscribirte a AlexCG Design -->
        <!-- Web hecha por AlexCG Design, si te sirvió la plantilla por favor entra a AlexCG Design -->
        <!-- ->>>> https://www.youtube.com/alexcgdesign <<<<- -->
            <form action="modelos/correo.modelo.php" method="POST">
                <div class="form" >
                    <h1>Manda un correo a tus clientes</h1>
                    <div class="grupo">
                        <input type="text" name="nombre" id="" required><span class="barra"></span>
                        <label>Nombre</label>
                    </div>
                    <div class="grupo">
                        <input type="email" name="email" id="" required><span class="barra"></span>
                        <label>Email</label>
                    </div>
                    <div class="grupo">
                        <input type="text" name="subject" id="" required><span class="barra"></span>
                        <label>Asunto</label>
                    </div>
                    <div class="grupo">
                        <textarea name="message" id="" rows="4" required></textarea><span class="barra"></span>
                        <label>Mensaje</label>
                    </div>
                    <button type="submit">Enviar</button>
                </div>
            </form>
        </body>
        </html>

      </div>

    </div>
    <!-- /.card -->
  </section>
  <!-- /.content -->
</div>