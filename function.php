<?php 
$conn = mysqli_connect("localhost", "root", "root", "db_wisata");
function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
}
return $rows;

}

function tambah($data) {
    global $conn;
    $id = htmlspecialchars($data["id"]);
    $nama = $data["nama"];
    $umur = $data["umur"];
    $alamat = $data["alamat"];
    $asal = $data["asal"];
    $jenis_kelamin = $data["jenis_kelamin"];
    $tgl_masuk = $data["tgl_masuk"];
    // $foto = $data["foto"];
    $foto = upload_foto();
        if(!$foto){
            return false;
        }
    
    $query = "INSERT INTO tb_wisata VALUES ('$id', '$nama', '$umur', '$alamat','$asal','$jenis_kelamin','$tgl_masuk', '$foto')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}


function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM tb_wisata WHERE id = $id");
    return mysqli_affected_rows($conn);
}


function edit($data) {
    global $conn;

    // ambil data dari tiap elemen
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $umur = htmlspecialchars($data["umur"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $asal = htmlspecialchars($data["asal"]);
    $jenis_kelamin = htmlspecialchars($data["jenis_kelamin"]);
    $tgl_masuk = htmlspecialchars($data["tgl_masuk"]);
    // $foto = $data["foto"];
    $fotolama = $data["foto_lama"];
    $noUploadFoto = $_FILES['foto']['error'];

    if($noUploadFoto === 4){
        $foto = $fotolama;
    } else {
        $foto = upload_foto();
    }

    // query insert data
    $query = "UPDATE tb_wisata SET nama = '$nama', umur = '$umur', alamat = '$alamat', asal= '$asal', jenisKelamin= '$jenis_kelamin', tgl_masuk = '$tgl_masuk' ,foto = '$foto' WHERE id = '$id'";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload_foto(){
    $namaFoto = $_FILES['foto']['name'];
    $ukuranFoto = $_FILES['foto']['size'];
    $errorFoto = $_FILES['foto']['error'];
    $tempFoto = $_FILES['foto']['tmp_name'];

    //cek upload foto
    if ($errorFoto === 4) {
        echo "<script>
                alert('pilih foto terlebih dahulu');
            </script>";
        return false;
    }

    //cek ekstensi foto
    $ekstensiFotoValid = ['jpg', 'jpeg', 'png','gif'];
    $ekstensiFoto = explode('.', $namaFoto);
    $ekstensiFoto = strtolower(end($ekstensiFoto));

    //cek gambar atau bukan
    if (!in_array($ekstensiFoto, $ekstensiFotoValid)) {
        echo "<script>
                alert('yang anda upload bukan gambar');
            </script>";
        return false;
    }

    //cek ukuran foto
    if ($ukuranFoto > 1000000) {
        echo "<script>
                alert('ukuran foto terlalu besar');
            </script>";
        return false;
    }

    //jika sudah melewati bebrapa validasi, maka file akan disimpan ke storage
    $date = date('YmdHis');
    move_uploaded_file($tempFoto, 'img/'.$date.$namaFoto);
    return $date.$namaFoto;
}
?>