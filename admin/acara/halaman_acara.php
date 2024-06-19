<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Acara</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="index.php?page=dashboard"><i class="bx bx-home-alt"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">List Acara</li>
            </ol>
        </nav>
    </div>
</div>
<!--end breadcrumb-->
<h6 class="mb-0 text-uppercase">List Acara</h6>
<hr />
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th width="5%"><center>No</center></th>
                        <th><center>Judul acara</center></th>
                        <th width="20%"><center>Jenis acara</center></th>
                        <th width="10%"><center>Lokasi</center></th>
                        <th><center>Tanggal acara</center></th>
                        <th><center>Action</center></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    function tgl_indo($tanggal){
                        $bulan = array (
                            1 =>   'Januari',
                            'Februari',
                            'Maret',
                            'April',
                            'Mei',
                            'Juni',
                            'Juli',
                            'Agustus',
                            'September',
                            'Oktober',
                            'November',
                            'Desember'
                        );
                        $pecahkan = explode('-', $tanggal);
                        return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
                    }

                    include "../conn/conn.php";
                    $no = 1;
                    $id_staff = $_SESSION['id_staff'];
                    $query = mysqli_query($conn, "SELECT * FROM acara as a JOIN jenis_acara as b ON b.id_jenis_acara = a.id_jenis_acara WHERE a.created_by = '$id_staff'");
                    while ($data = mysqli_fetch_array($query)) { ?>
                        <tr>
                            <td><center><?= $no++ ?></center></td>
                            <td><center><b><?= ucwords($data['judul_acara']) ?></b></center></td>
                            <td><center><?= ucfirst($data['judul']) ?></center></td>
                            <td><?= ucwords($data['lokasi']) ?></td>
                            <td><center><?= tgl_indo(date('Y-m-d', strtotime($data['tgl']))) ?></center></td>
                    
                
                            <td>
                               
                                    <a href="index.php?page=edit_acara&id=<?= $data['id_acara'] ?>"><i class="bx bxs-pencil"></i> Edit</a> |
                                    <a href="index.php?page=delete_acara&id=<?= $data['id_acara'] ?>" style="color:red" onClick="return confirm('Delete This acara ?')"><i class="bx bxs-trash"></i> Hapus</a>
                                <?php }
                                ?>
                            </td>
                        </tr>
                    <?php ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
