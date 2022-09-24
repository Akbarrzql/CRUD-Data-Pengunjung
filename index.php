<?php

require "function.php";

$datapengunjung = mysqli_query($conn, "SELECT * FROM tb_wisata");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PTS DATA MASUK</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>

<?php
include "navbar.php";
?>

    <div class="container">
    <H1 align="center">Data Masuk Pengunjung</H1>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <a type="Button" class="btn btn-dark float-end" style="margin: auto;" href="tambah.php">Tambah Data Baru</a>
                <table class="table table-dark table-striped">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Umur</th>
                                <th>Alamat</th>
                                <th>Asal</th>
                                <th>Jenis Kelamin</th>
                                <th>Tgl Masuk</th>
                                <!-- <th>Foto</th> -->
                                <th>Aksi</th>
                            </tr>
                            <?php
                            $no=1;
                            foreach($datapengunjung as $pengunjung) : ?>
                                <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $pengunjung["nama"]; ?></td>
                                <td><?= $pengunjung["umur"]; ?></td>
                                <td><?= $pengunjung["alamat"]; ?></td>
                                <td><?= $pengunjung["asal"]; ?></td>
                                <td><?= $pengunjung["jenisKelamin"]; ?></td>
                                <td><?= $pengunjung["tgl_masuk"]; ?></td>
                                <!-- <td><img src="img/<?= $pengunjung["foto"]; ?>" alt="<?= $pengunjung["nama"]; ?>" width="50" height="50"></td> -->
                                <td>
                                    <a class="btn btn-primary" href=""  data-bs-toggle="modal" data-bs-target="#modalDetail<?= $pengunjung['id'] ?>">Detail</a>
                                    <a class="btn btn-warning" href="edit.php?id=<?= $pengunjung['id'] ?>">Edit</a>
                                    <a class="btn btn-danger" href="hapus.php?id=<?= $pengunjung['id'] ?>" onclick="return confirm('yakin?');">Delete</a>
                                </td>
                                </tr>

                                <!-- Modal -->
                                <div class="modal fade" id="modalDetail<?= $pengunjung['id'] ?>" tabindex="-1" aria-labelledby="modalDetailLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="modalDetailLabel">Detail Data Pengunjung</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                    <div class="modal-body">
                                    <div class="form-group">
                                        <label for="" class="form-label">Nama</label>
                                        <input type="text" class="form-control" name="nama" id="nama" value="<?= $pengunjung['nama'] ?>" readonly>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="" class="form-label">Umur</label>
                                        <input type="text" class="form-control" name="umur" id="umur" value="<?= $pengunjung['umur'] ?>" readonly>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="" class="form-label">Alamat</label>
                                        <input type="text" class="form-control" name="alamat" id="alamat" value="<?= $pengunjung['alamat'] ?>" readonly>
                                    </div>
                                    <br> 
                                    <div class="form-group">
                                        <label for="" class="form-label">Asal</label>
                                        <input type="text" class="form-control" name="asal" id="asal" value="<?= $pengunjung['asal'] ?>" readonly>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="" class="form-label">Jenis Kelamin</label>
                                        <input type="text" class="form-control" name="jenis_kelamin" id="jenis_kelamin"value="<?= $pengunjung['jenisKelamin'] ?>" readonly>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="" class="form-label">Tanggal Masuk</label>
                                        <input type="date" class="form-control" name="tgl_masuk" id="tgl_masuk" value="<?= $pengunjung['tgl_masuk'] ?>" readonly>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="" class="form-label">Foto</label>
                                        <br>
                                        <img src="img/<?= $pengunjung['foto'] ?>" alt="<?= $pengunjung['nama'] ?>" width="100" height="100">
                                    </div>
                                    <br>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <a class="btn btn-warning" href="edit.php?id=<?= $pengunjung['id'] ?>">edit</a>
                                    </div>
                
                                    </div>
                                </div>
                                </div>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
   </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script> 
</body>
</html>