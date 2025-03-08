<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tanggal = $_POST['tanggal'];
    $keterangan = $_POST['keterangan'];
    $jenis = $_POST['jenis']; 
    $jumlah = $_POST['jumlah'];
    echo json_encode($newRecord);

    $stmt = $conn->prepare("INSERT INTO transaksi (tanggal, keterangan, jenis, jumlah) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $tanggal, $keterangan, $jenis, $jumlah);
    
    if ($stmt->execute()) {
        echo "Data berhasil disimpan!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
