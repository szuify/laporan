<?php
error_reporting(0); // Menyembunyikan error reporting untuk menjaga keamanan dan kebersihan tampilan
include "../conn/conn.php"; // Menghubungkan ke file koneksi database

// Proses saat tombol submit ditekan
if (isset($_POST['submit'])) {
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];
    $pass = $_POST['pass'];
    $tipe = $_POST['tipe'];

    // Mengecek apakah nik sudah terdaftar
    $query = mysqli_query($conn, "SELECT * FROM staff WHERE nik = '$nik'");
    $cek_user = mysqli_num_rows($query);

    if ($cek_user > 0) {
        // Jika nik sudah terdaftar, tampilkan pesan error
        echo '
        <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show py-2">
            <div class="d-flex align-items-center">
                <div class="font-35 text-white"><i class="bx bxs-user-x"></i></div>
                <div class="ms-3">
                    <h6 class="mb-0 text-white">Oops! nik Telah Digunakan</h6>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ';
    } else {
        // Jika nik belum terdaftar, tambahkan data anggota baru ke dalam database
        $query_insert = mysqli_query($conn, "INSERT INTO staff (id_staff, nik, nama, jenis_kelamin, alamat, password, tipe)
        VALUES ('', '$nik', '$nama', '$jk', '$alamat', '$pass', '$tipe')");
        
        if ($query_insert) {
            // Jika berhasil ditambahkan, tampilkan pesan sukses
            echo '
            <div class="alert alert-success border-0 bg-success alert-dismissible fade show py-2">
                <div class="d-flex align-items-center">
                    <div class="font-35 text-white"><i class="bx bxs-user-check"></i></div>
                    <div class="ms-3">
                        <h6 class="mb-0 text-white">Berhasil Menambahkan Staff Baru</h6>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            ';
        } else {
            // Jika gagal ditambahkan, tampilkan pesan error
            echo '
            <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show py-2">
                <div class="d-flex align-items-center">
                    <div class="font-35 text-white"><i class="bx bxs-user-x"></i></div>
                    <div class="ms-3">
                        <h6 class="mb-0 text-white">Gagal Menambahkan Staff Baru</h6>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            ';
        }
    }
}
?>
<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Anggota</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="index.php?page=dashboard"><i class="bx bx-home-alt"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah Anggota</li>
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
                        <h5 class="mb-0">Anggota Registration</h5>
                    </div>
                    <hr />
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="row mb-3">
                            <label for="nik" class="col-sm-3 col-form-label">NIK</label>
                            <div class="col-sm-9">
                                <input type="number" name="nik" class="form-control" id="nik" placeholder="nik" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEnterYourName" class="col-sm-3 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-9">
                                <input type="text" name="nama" class="form-control" id="inputEnterYourName" placeholder="Nama Lengkap" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-9">
                                <select class="form-select mb-3" name="jk" aria-label="Default select example">
                                    <option value="laki-laki" selected>Laki-Laki</option>
                                    <option value="perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                            <div class="col-sm-9">
                                <input type="text" name="alamat" class="form-control" id="alamat" placeholder="alamat" required>
                            </div>
                        </div>
                        <hr>
                        <div class="row mb-3">
                            <label for="inputChoosePassword2" class="col-sm-3 col-form-label">Password Login</label>
                            <div class="col-sm-9">
                                <div class="input-group" id="show_hide_password">
                                    <input type="password" name="pass" class="form-control border-end-0" id="inputChoosePassword" placeholder="Password" required>
                                    <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Tipe</label>
                            <div class="col-sm-9">
                                <select class="form-select mb-3" name="tipe">
                                    <option value="anggota" selected>Anggota</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-9">
                                <button type="submit" name="submit" class="btn btn-success px-5">Daftarkan Anggota</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
