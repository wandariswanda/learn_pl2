<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
<?php
    include 'koneksi.php';
    $db = new DbConnection();
    $conn = $db->getDbConnection();

    if(ISSET($_POST['proses'])){
        $available_nim = $db->available_mahasiswa($_POST['npm']);
        if($available_nim){
            echo '<div class="alert alert-primary" role="alert">
                    NIM sudah terdaftar, kembali ke <a href="insert.php" class="alert-link">Sebelumnya</a>.
                  </div>'; 
            die();
        }else{
            $query = mysqli_query($conn, "insert into mahasiswa values(
                NULL,
                '".$_POST['npm']."',
                '".$_POST['name']."'
            )");
    
            header('location:latihan.php');
        }
    }
?>

<head>
	<meta charset="utf-8">
	<title>.:: Programming Language ::.</title>
</head>
<body>
    <div class="container">
        <h1>Input Mahasiswa</h1>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="inputNPM" class="form-label">NIM</label>
                <input type="text" name="npm" class="form-control" id="inputNPM">
            </div>
            <div class="mb-3">
                <label for="inputName" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="inputName">
            </div>
            <a class="btn btn-danger" href="latihan.php">Kembali</a>
            <button type="submit" name="proses" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</body>
</html>