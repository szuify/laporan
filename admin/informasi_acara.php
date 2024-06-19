<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Informasi Acara</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="index.php?page=dashboard"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Informasi Acara</li>
            </ol>
        </nav>
    </div>
</div>
<?php 
 include "../conn/conn.php";
?>
<!--end breadcrumb-->
<div class="">
    <div class="">
        <div class="container py-2">
            <h2 class="font-weight-light text-center text-muted py-3">Informasi Acara</h2>
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
                
                // variabel pecahkan 0 = tanggal
                // variabel pecahkan 1 = bulan
                // variabel pecahkan 2 = tahun
             
                return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
            }
              $query = mysqli_query($conn, "SELECT * FROM acara as a JOIN staff as b ON b.id_staff = a.created_by JOIN jenis_acara as c ON c.id_jenis_acara = a.id_jenis_acara ORDER BY a.id_acara DESC");
              while ($data = mysqli_fetch_array($query)) 
              { ?>
                <div class="row">
                <div class="col-auto text-center flex-column d-none d-sm-flex">
                    <div class="row h-50">
                        <div class="col border-end">&nbsp;</div>
                        <div class="col">&nbsp;</div>
                    </div>
                    <h5 class="m-2">
                        <span class="badge rounded-pill bg-warning">&nbsp;</span>
                    </h5>
                    <div class="row h-50">
                        <div class="col border-end">&nbsp;</div>
                        <div class="col">&nbsp;</div>
                    </div>
                </div>
                <div class="col py-2">
                     <div class="card border-primary shadow radius-15">
                        <div class="card-body">
                            <div class="float-end text-primary"><?= tgl_indo(date('Y-m-d', strtotime($data['tgl']))).', '.$data['judul']?></div>
                            <h4 class="card-title text-primary"><?= ucwords($data['judul_acara']) ?></h4>
                            <p class="card-text"><?= $data['isi'] ?></p>
                            <button class="btn btn-sm btn-outline-warning" type="button" data-bs-target="#t2_details<?= $data['id_acara']?>" data-bs-toggle="collapse">Detail Acara ▼</button>
                            <div class="collapse border" id="t2_details<?= $data['id_acara']?>">
                                <div class="p-2 text-monospace">
                                    <div>Lokasi : <?= ucwords($data['lokasi']) ?></div>
                                    <div>Pengirim : <b><?= strtoupper($data['nama'])?></b></div>
                                    <hr>
                                    <div>Foto : </div>
                                    <div>
                                        <?php
                                        $id_acara = $data['id_acara'];
                                        $query_foto = mysqli_query($conn, "SELECT * FROM foto_acara WHERE id_acara = '$id_acara'");
                                         while ($foto = mysqli_fetch_array($query_foto)) {
                                          echo  '<img src="../file/'.$foto['foto'].'" width="150" height="120" class="border rounded cursor-pointer mr-5" alt=""> ';
                                         }
                                        ?>
                                    </div>
                                    <hr>
                                    <div>video : </div>
                                    <div>
                                        <?php
                                        $query_video = mysqli_query($conn, "SELECT * FROM video_acara WHERE id_acara = '$id_acara'");
                                         while ($video = mysqli_fetch_array($query_video)) {
                                          echo  '
                                          <video width="320" height="240" controls>
                                            <source src="../file/'.$video['video'].'" type="video/mp4">
                                            </video>
                                          ';
                                         }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div> 
            <?php }
            ?>
        <!--container-->
    </div>
</div>