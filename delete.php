<?php
    include 'koneksi.php';
    $db = new DbConnection(); 
    $conn = $db->getDbConnection();
    $id = $_GET['mahasiswa_id'];

    $query = mysqli_query($conn, "DELETE from mahasiswa where id='$id'");
    header("location:latihan.php");
?>