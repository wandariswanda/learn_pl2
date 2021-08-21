<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
<?php
    include 'koneksi.php';
    $db = new DbConnection();
    $conn = $db->getDbConnection();
    $mahasiswa_id = $_GET['mahasiswa_id'];
    $get_mahasiswa = mysqli_query($conn, "select * from mahasiswa where id='".$mahasiswa_id."'");
    $res_mahasiswa = mysqli_fetch_array($get_mahasiswa);


    if(ISSET($_POST['proses'])){
        $exec = false;
        if($res_mahasiswa['nim'] == $_POST['npm']){
            $exec = true;
        }else{
            $available_nim = $db->available_mahasiswa($_POST['npm']);
            if($available_nim){
                echo '<div class="alert alert-primary" role="alert">
                        NIM sudah terdaftar, kembali ke <a href="edit.php?mahasiswa_id='.$mahasiswa_id.'" class="alert-link">Sebelumnya</a>.
                    </div>'; 
                die();
            }else{
                $exec = true;
            }
        }

        if($exec){
            $query = mysqli_query($conn, 
                                        "update mahasiswa
                                        SET nim = '".$_POST['npm']."', nama = '".$_POST['name']."'
                                        WHERE id = '".$mahasiswa_id."'");
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
        <h1>Input Mahasiswa</h1><br>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="inputNPM" class="form-label">NIM</label>
                <input type="text" name="npm" value="<?= $res_mahasiswa['nim'] ?>" class="form-control" id="inputNPM">
            </div>
            <div class="mb-3">
                <label for="inputName" class="form-label">Name</label>
                <input type="text" name="name" value="<?= $res_mahasiswa['nama' ] ?>" class="form-control" id="inputName">
            </div>
            <a class="btn btn-danger" href="latihan.php">Kembali</a>
            <button type="submit" name="proses" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</body>
</html>