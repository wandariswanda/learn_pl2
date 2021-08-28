<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
<?php
    include 'koneksi.php';
    $db = new DbConnection(); 
    $conn = $db->getDbConnection();

    $query = mysqli_query($conn, "select * from mahasiswa");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>.:: Programming Language ::.</title>
</head>
<body>
    <div class="container">
        <h1>Daftar Mahasiswa</h1><br>
        <a href="insert.php" class="btn btn-primary float-end"><i class="icon-plus"></i> Tambah Mahasiswa</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">NIM</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $no = 1;
                    while($data = mysqli_fetch_array($query)){
                ?>
                    <tr>
                        <th scope="row"><?= $no++; ?>.</th>
                        <td><?= $data['nim'] ?></td>
                        <td><?= $data['nama'] ?></td>
                        <td>
                            <a href="<?= 'edit.php?mahasiswa_id='.base64_encode($data['id']) ?>" title="Edit">
                                <i class="icon-pencil btn-lg"></i>
                            </a>
                            <a href="<?= 'delete.php?mahasiswa_id='.base64_encode($data['id']) ?>" onclick="return confirm('Are you sure you want to delete this item')" title="Hapus">
                                <i class="icon-trash btn-lg"></i>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>