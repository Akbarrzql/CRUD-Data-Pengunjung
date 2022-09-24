<?php 

    require 'function.php';

    // ambil data di url
    $id = $_GET["id"];

    // query
    $data = query("SELECT * FROM tb_wisata WHERE id = $id")[0];

    // cek apakah submit sudah ditekan
    if (isset($_POST["submit"])) {

        // cek apakah data berhasil diubah atau tidak
        if ( edit($_POST) > 0 ) {
            echo "
            <script>
                alert('data berhasil diedit!');
                document.location.href = 'index.php';
            </script>
            ";   
        } else {
            echo "
            <script>
                alert('data gagal diedit!');
            </script>
            ";
        }
    }

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
    
    <!-- Tabel -->

    <?php
        include "navbar.php"
    ?>

    

    <div class="container container-fluid mt-5">
        <div class="card"><div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <h3 align="center">Edit Data Siswa</h3>
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $data["id"]; ?>">
                        <input type="hidden" name="foto_lama" value="<?= $data["foto"]; ?>">
                        <div class="mb-3">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $data["nama"]; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="umur" name="umur">Umur</label>
                            <input type="num" class="form-control" id="exampleInputEmail1" name="umur" value="<?= $data["umur"]; ?>">
                            
                        </div>
                        <div class="mb-3">
                            <label for="alamat" name="alamat">Alamat</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="alamat" value="<?= $data["alamat"]; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="alamat" name="alamat">Asal</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="asal" value="<?= $data["asal"]; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="alamat" name="alamat">Jenis Kelamin</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="jenis_kelamin" value="<?= $data["jenisKelamin"]; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="alamat" name="alamat">Tanggal Masuk</label>
                            <input type="date" class="form-control" id="exampleInputEmail1" name="tgl_masuk" value="<?= $data["tgl_masuk"]; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="">Foto</label>
                            <br>
                            <img src="img/<?= $data["foto"]; ?>">
                            <br>
                            <input type="file" class="form-control" id="exampleInputEmail1" name="foto" value="<?= $data["foto"]; ?>">
                        </div>

                        <div></div>
                        <button type="submit" class="btn btn-primary mt-3" name="submit">Edit Data</button>
                        </form>
                                            
                </div>
            </div>     
    
</body>
</html>