<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Edit Laporan</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="index.php?page=dashboard"><i class="bx bx-home-alt"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Laporan</li>
            </ol>
        </nav>
    </div>
</div>
<!--end breadcrumb-->

<?php
// Include file koneksi database
include "../conn/conn.php";

// Mengambil ID laporan dari parameter GET
$id_laporan = $_GET['id'];

// Mengambil data laporan kegiatan dari database berdasarkan ID
$data_laporan = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM laporan_kegiatan WHERE id_laporan = '$id_laporan'"));

// Proses form jika tombol submit ditekan
if (isset($_POST['submit'])) {
    // Mengambil nilai form yang dikirimkan
    $judul = $_POST['judul'];
    $id_jenis = $_POST['id_jenis_laporan'];
    $lokasi = $_POST['lokasi'];
    $tgl = $_POST['tgl'];
    $mytextarea = $_POST['mytextarea'];
    $created_at = date('Y-m-d');
    
    // Melakukan update data laporan kegiatan ke dalam database
    mysqli_query($conn,"UPDATE laporan_kegiatan SET judul_laporan='$judul', id_jenis_laporan='$id_jenis', lokasi='$lokasi', tgl='$tgl', isi='$mytextarea', created_at='$created_at', status='PENDING' WHERE id_laporan='$id_laporan'");
    
    // Redirect ke halaman riwayat laporan setelah proses update selesai
    echo "<script>window.location.href='index.php?page=riwayat_laporan';</script>";
}
?>

<div class="row">
    <div class="col-xl-9 mx-auto">
        <div class="card border-top border-0 border-4 border-warning">
            <div class="card-body">
                <div class="border p-4 rounded">
                    <div class="card-title d-flex align-items-center">
                        <div><i class="bx bxs-user me-1 font-22"></i></div>
                        <h5 class="mb-0">Laporan <?= ucwords($data_laporan['judul_laporan']) ?></h5>
                    </div>
                    <hr />
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="row mb-3">
                            <label for="judul" class="col-sm-3 col-form-label">Judul Laporan</label>
                            <div class="col-sm-9">
                                <input type="text" name="judul" value="<?= $data_laporan['judul_laporan'] ?>" class="form-control" id="judul" placeholder="Judul laporan" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEnterYourName" class="col-sm-3 col-form-label">Jenis Laporan</label>
                            <div class="col-sm-9">
                                <select class="form-select mb-3" name="id_jenis_laporan" aria-label="Default select example">
                                    <?php
                                    // Mengambil daftar jenis laporan dari database
                                    $query_jenis = mysqli_query($conn, "SELECT * FROM jenis_laporan");
                                    while ($jenis = mysqli_fetch_array($query_jenis)) {
                                        // Menentukan opsi yang terpilih berdasarkan id jenis laporan saat ini
                                        $selected = ($jenis['id_jenis_laporan'] == $data_laporan['id_jenis_laporan']) ? 'selected' : '';
                                        echo "<option value=\"{$jenis['id_jenis_laporan']}\" $selected>" . ucwords($jenis['judul']) . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="lokasi" class="col-sm-3 col-form-label">Lokasi Kegiatan</label>
                            <div class="col-sm-9">
                                <input type="text" name="lokasi" value="<?= $data_laporan['lokasi'] ?>" class="form-control" id="lokasi" placeholder="Lokasi kegiatan" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="tgl" class="col-sm-3 col-form-label">Tanggal Laporan</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" name="tgl" value="<?= $data_laporan['tgl'] ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="mytextarea" class="col-sm-3 col-form-label">Isi Laporan</label>
                            <div class="col-sm-9">
                                <textarea id="mytextarea" name="mytextarea" class="form-control"><?= $data_laporan['isi'] ?></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-9">
                                <input type="submit" name="submit" value="Perbaharui Laporan" class="btn btn-primary px-5">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
