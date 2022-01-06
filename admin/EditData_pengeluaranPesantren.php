<?php
    $lokasi1 = "Pengeluaran";
    $lokasi2 = "Laporan Transaksi";
    $lokasi3 = "Tambah Transaksi";
    $linklokasi2 = "KelolaPelaporan_pengeluaranPesantren.php";
    $linklokasi3 = "TambahData_pengeluaranPesantren.php";

    include "../admin/template/header.php";   
    include "../admin/template/menu.php";
    include "../admin/template/lokasi.php";
    include "../admin/fungsi.php";

    ini_set('log_errors','On');
    ini_set('display_errors','Off');
    ini_set('error_reporting', E_ALL );
    define('WP_DEBUG', false);
    define('WP_DEBUG_LOG', true);
    define('WP_DEBUG_DISPLAY', false);


    $db_user= query("SELECT a.id_data_output, a.gambar, a.id_pp, a.kd_jumlah, a.kd_keterangan, b.kd_nama_usaha, c.nama_pengeluaran, d.kd_nama_bulan 

    FROM db_data_output a 
    
    INNER JOIN db_usaha b ON a.id_usaha = b.id_usaha
    INNER JOIN db_kategori_pengeluaran c ON a.id_kategori = c.id_kategori
    INNER JOIN db_bulan d ON a.id_bulan = d.id_bulan
    WHERE a.id_pp = 2 AND a.id_usaha = 'DTU005' AND NOT c.id_kategori BETWEEN 'KAP083' AND 'KAP084'
    ");


    ?>

<div class="container-fluid">
    <br>
        <h3 align="center">Detail Pengeluaran Pesantren Tahfidz DH</h3>
        <h3 align="center">Hidayatullah Probolinggo</h3>
    <br>
    <div class="row justify-content-center">
        <div class="col-sm-12 col-lg-12 ">

        <div style="overflow-x:auto;">

            <table class="table table-bordered" align = "center" id="data">
                <thead >
                    <tr align="center">
                        <th>No</th>
                        <th width="110px">Nama Kategori</th>
                        <th width="100px">Bulan </th>
                        <th width="100px">Nominal</th>
                        <th width="130px">Bukti Pengeluaran</th>
                        <th width="200px">Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($db_user as $data) {
                        ?>
                <tr align="center">

                    <td><?=$i++?>.</td>
                    <td><?=$data['nama_pengeluaran']?></td> 
                    <td><?=$data['kd_nama_bulan']?></td>
                    <td>Rp <?=number_format($data['kd_jumlah'], 0, ",", ".")?></td>
                    <td><img src="../assets/img/<?=$data['gambar']?>" alt="" height="130" width="100"></td>
                    <td><?=$data['kd_keterangan']?></td>
                    <td>
                        <div class="btn-group">
                            <a href="EditData_laporanpengeluaranPesantren.php?id=<?=$data['id_data_output']?>"  class="btn btn-success"><i class="nav-icon fa fa-database"></i> Edit</a>
                            <a href="Deletedata_pengeluaranPesantren.php?id=<?=$data['id_data_output']?>"  class="btn btn-danger"><i class="nav-icon fa fa-trash"></i> Hapus</a>
                        </div>
                    </td>
                </tr>
                    <?php } ?>
                </tbody>
                </table>
            </div>
        </div>
    </div>


    
<?php
    include "template/footer.php";
?>

<script type="text/javascript">
    $(document).ready(function () {
        $('#data').DataTable();
    });
</script>
