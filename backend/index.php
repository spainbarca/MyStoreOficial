<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/ruta.controlador.php";

require_once "controladores/administradores.controlador.php";
require_once "modelos/administradores.modelo.php";

require_once "controladores/banner.controlador.php";
require_once "modelos/banner.modelo.php";

require_once "controladores/planes.controlador.php";
require_once "modelos/planes.modelo.php";

require_once "controladores/categorias.controlador.php";
require_once "modelos/categorias.modelo.php";

require_once "controladores/habitaciones.controlador.php";
require_once "modelos/habitaciones.modelo.php";

require_once "controladores/reservas.controlador.php";
require_once "modelos/reservas.modelo.php";

require_once "controladores/testimonios.controlador.php";
require_once "modelos/testimonios.modelo.php";

require_once "controladores/usuarios.controlador.php";
require_once "modelos/usuarios.modelo.php";

require_once "controladores/recorrido.controlador.php";
require_once "modelos/recorrido.modelo.php";

require_once "controladores/restaurante.controlador.php";
require_once "modelos/restaurante.modelo.php";

require_once "controladores/inicio.controlador.php";
require_once "modelos/inicio.modelo.php";

require_once "controladores/productos.controlador.php";
require_once "modelos/productos.modelo.php";

require_once "controladores/ventas.controlador.php";
require_once "modelos/ventas.modelo.php";

require_once "controladores/clientes.controlador.php";
require_once "modelos/clientes.modelo.php";

require_once "controladores/etiquetas.controlador.php";
require_once "modelos/etiquetas.modelo.php";

require_once "controladores/rfm.controlador.php";
require_once "modelos/rfm.modelo.php";

$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();