<?php
error_reporting(0);
include "../conn/conn.php";

// Ambil id acara dari parameter GET
$id_acara = $_GET['id'];

// Ambil data acara dari database berdasarkan id acara
$get_data = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM acara WHERE id_acara = '$id_acara'"));

// Jika form disubmit (saat tombol submit ditekan)
if (isset($_POST['submit'])) {
    // Proses untuk setiap file foto yang diupload
    foreach ($_FILES['foto']['name'] as $id => $val) {
        $fileName = $_FILES['foto']['name'][$id];
        $tempLocation = $_FILES['foto']['tmp_name'][$id];
        $alias_foto = date('d-m-Y') . '-' . $fileName;
        
        // Pindahkan file foto ke folder tujuan
        $move = move_uploaded_file($tempLocation, '../file/' . $alias_foto);
        
        // Simpan informasi foto ke dalam database
        $result = mysqli_query($conn, "INSERT INTO foto_acara (id_foto, id_acara, foto) VALUES ('', '$id_acara', '$alias_foto')");
    }
    
    // Proses untuk setiap file video yang diupload
    foreach ($_FILES['video']['name'] as $id_video => $val_video) {
        $fileName_video = $_FILES['video']['name'][$id_video];
        $tempLocation_video = $_FILES['video']['tmp_name'][$id_video];
        $alias_video = date('d-m-Y') . '-' . $fileName_video;
        
        // Pindahkan file video ke folder tujuan
        move_uploaded_file($tempLocation_video, '../file/' . $alias_video);
        
        // Simpan informasi video ke dalam database
        mysqli_query($conn, "INSERT INTO video_acara (id_video, id_acara, video) VALUES ('', '$id_acara', '$alias_video')");
    }
}
?>
<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">acara</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="index.php?page=dashboard"><i class="bx bx-home-alt"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">acara</li>
            </ol>
        </nav>
    </div>
</div>
<!--end breadcrumb-->

<div class="row">
    <div class="col-xl-9 mx-auto">
        <div class="card border-top border-0 border-4 border-warning">
            <div class="card-body">
                <div class="border p-4 rounded">
                    <div class="card-title d-flex align-items-center">
                        <div><i class="bx bxs-user me-1 font-22"></i></div>
                        <h5 class="mb-0">acara <?= ucwords($get_data['judul_acara']) ?></h5>
                    </div>
                    <hr />

                    <?php 
                    // Hitung jumlah foto dan video yang sudah diupload untuk acara ini
                    $data_foto = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM foto_acara WHERE id_acara = '$id_acara'"));
                    $data_video = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM video_acara WHERE id_acara = '$id_acara'"));

                    // Jika sudah ada foto atau video terkait acara ini, tampilkan pesan sukses
                    if ($data_foto > 0 OR $data_video > 0) { ?>
                        <button type="button" class="btn btn-success px-2" onClick="window.location.href = 'index.php?page=halaman_acara';"><i class='bx bx-check mr-1'></i> Berhasil Mengirimkan acara, Check Riwayat acara</button>
                    <?php } else {
                        // Jika belum ada foto atau video, tampilkan form untuk upload
                    ?>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="row mb-3">
                                <label for="tgl" class="col-sm-3 col-form-label">Upload Foto acara</label>
                                <div class="col-sm-9">
                                    <input id="image-uploadify" type="file" name="foto[]" accept="image/*" multiple>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="tgl" class="col-sm-3 col-form-label">Upload Video acara</label>
                                <div class="col-sm-9">
                                    <input id="image-uploadify2" type="file" name="video[]" accept="video/*" multiple>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <input type="submit" name="submit" value="Kirim acara" class="btn btn-primary px-5">
                                </div>
                            </div>
                        </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
