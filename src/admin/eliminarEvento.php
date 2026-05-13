<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

if (!isset($_SESSION['usuario_id']) || $_SESSION['usuario_rol'] !== 'admin') {
    header('Location: ../index.php');
    exit();
}

include '../comun/db.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id > 0) {
    // Primero eliminar las compras del evento
    $eliminarCompras = $conexion->prepare("DELETE FROM compras WHERE evento_id = ?");
    $eliminarCompras->bind_param("i", $id);
    $eliminarCompras->execute();

    // Luego eliminar el evento
    $eliminarEvento = $conexion->prepare("DELETE FROM eventos WHERE id = ?");
    $eliminarEvento->bind_param("i", $id);
    $eliminarEvento->execute();
}

header('Location: http://localhost/TFG_JavierCaballeroMiras/src/admin/index.php');
exit();
?>