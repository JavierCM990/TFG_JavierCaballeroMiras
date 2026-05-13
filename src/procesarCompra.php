<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit();
}

include 'comun/db.php';

$id_usuario = $_SESSION['usuario_id'];
$id_evento  = (int)$_POST['id_evento'];
$tipo       = $_POST['tipo'];
$cantidad   = (int)$_POST['cantidad'];
$total      = (float)$_POST['total'];

$insertar = $conexion->prepare("INSERT INTO compras (usuario_id, evento_id, tipo_entrada, cantidad, precio_total, metodo_pago) VALUES (?, ?, ?, ?, ?, 'tarjeta')");
$insertar->bind_param("iisid", $id_usuario, $id_evento, $tipo, $cantidad, $total);

if ($insertar->execute()) {
    $id_compra = $conexion->insert_id;

    $actualizar = $conexion->prepare("UPDATE eventos SET entradas_disponibles = entradas_disponibles - ? WHERE id = ?");
    $actualizar->bind_param("ii", $cantidad, $id_evento);
    $actualizar->execute();

    header('Location: confirmacion.php?id=' . $id_compra);
    exit();
} else {
    header('Location: compra.php?id=' . $id_evento . '&error=1');
    exit();
}