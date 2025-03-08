<?php
include 'save_data.php';

$sql = "SELECT SUM(jumlah) AS total FROM transaksi WHERE jenis = 'pemasukan'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$totalPemasukan = $row['total'] ? $row['total'] : 0;

$sql = "SELECT SUM(jumlah) AS total FROM transaksi WHERE jenis = 'pengeluaran'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$totalPengeluaran = $row['total'] ? $row['total'] : 0;

$totalPengeluaran = abs($totalPengeluaran); 
$totalSaldo = $totalPemasukan - $totalPengeluaran;

$conn->close();


echo json_encode([
    'totalSaldo' => $totalSaldo,
    'totalPemasukan' => $totalPemasukan,
    'totalPengeluaran' => $totalPengeluaran
]);
?>