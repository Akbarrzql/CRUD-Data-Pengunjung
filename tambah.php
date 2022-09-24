<?php
$conn = mysqli_connect('localhost', 'root', 'root', 'db_wisata');
if (isset($_POST['submit'])) {
    require 'function.php';

    if (tambah($_POST) > 0) {
        echo "
        <script>
            alert('Data Sukses di Tambahkan');
            document.location.href = 'index.php';
        </script>";
    } else {
        echo "
        <script>
            alert('Data Gagal Di Tambahkan');
            document.location.href = 'index.php';
        </script>";
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Pengunjung</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
<?php include 'navbar.php'; ?>

    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <div class="col-md-12">
                <h3 align="center">Tambah Data Pengunjung</h3>
                <div class="card">
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="text" class="form-control" name="id" id="id" value="0" placeholder="Tambah ID" hidden>
                            </div>
                            <br>
                            <div class="form-group">
                            <label for="" class="form-label">Nama</label>
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Tambah Nama">
                            </div>
                            <br>
                            <div class="form-group">
                            <label for="" class="form-label">Umur</label>
                                <input type="text" class="form-control" name="umur" id="umur" placeholder="Tambah Umur">
                            </div>
                            <br>
                            <div class="form-group">
                            <label for="" class="form-label">Alamat</label>
                                <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Tambah Alamat">
                            </div>
                            <br>
                            <div class="form-group">
                            <label for="" class="form-label">Asal</label>
                                <input type="text" class="form-control" name="asal" id="asal" placeholder="Tambah Asal">
                            </div>
                            <br>
                            <div class="form-group">
                            <label for="" class="form-label">Jenis Kelamin</label>
                                <input type="text" class="form-control" name="jenis_kelamin" id="jenis_kelamin" placeholder="Tambah Jenis kelamin">
                            </div>
                            <br>
                            <div class="form-group">
                            <label for="" class="form-label">Tanggal Masuk</label>
                                <input type="date" class="form-control" name="tgl_masuk" id="tgl_masuk" placeholder="Tambah tgl_masuk">
                            </div>
                            <br>
                            <div class="form-group">
                            <label for="foto">Upload</label>
                            <input type="file" class="form-control" id="foto" name="foto">
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary float-end" name="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>