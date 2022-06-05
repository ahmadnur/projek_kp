<?= $this->extend('layout/template');   ?>
<?= $this->section('content');   ?>
<div class="container">
    <div class="row">
        <?php $tahun_ini = date("Y");    ?>
        <div class="grid grid-cols-2 gap-2">
            <div id="karyawan_masuk">
            </div>
            <div id="karyawan_keluar">
            </div>
            <div id="pendaftar">
            </div>
            <div id="absensi">
            </div>
        </div>
        <h2 class="w-9/12 btn-primary rounded-r-2xl sm:w-1/2 xl:w-1/3  text-lg xl:text-2xl my-3 whitespace-nowrap "> 5 Karyawan Diterima Terakhir</h2>
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <td>no</td>
                    <td>Nama</td>
                    <td>jabatan</td>
                    <td>Tanggal Masuk</td>
                    <td>Durasi</td>
                </tr>
            </thead>
            <?php $i = 1;
            foreach ($masuk as $r) :    ?>
                <tr>
                    <td><?= $i;   ?></td>
                    <td><?= $r['nama'];   ?></td>
                    <td><?= $r['jabatan'];   ?></td>
                    <td><?= $r['tgl_diterima'];   ?></td>
                    <td><?php $booking    = new DateTime($r['tgl_diterima']);
                        $today        = new DateTime();
                        $diff         = $today->diff($booking);
                        echo $diff->y;
                        echo " Tahun ";
                        echo $diff->m;
                        echo " Bulan ";
                        echo $diff->d;
                        echo " Hari ";
                        ?></td>
                </tr>
            <?php $i++;
            endforeach;    ?>
        </table>
        <h2 class="w-9/12 btn-primary rounded-r-2xl sm:w-1/2 xl:w-1/3  text-lg xl:text-2xl my-3 whitespace-nowrap "> 5 Karyawan Resign Terakhir</h2>
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <td>no</td>
                    <td>Nama</td>
                    <td>jabatan</td>
                    <td>Tanggal Masuk</td>
                    <td>Tanggal keluar</td>
                    <td>Durasi</td>
                    <td>Alasan</td>
                </tr>
            </thead>
            <?php $i = 1;
            foreach ($resign as $r) :    ?>
                <tr>
                    <td><?= $i;   ?></td>
                    <td><?= $r['nama'];   ?></td>
                    <td><?= $r['jabatan'];   ?></td>
                    <td><?= $r['tgl_diterima'];   ?></td>
                    <td><?= $r['tgl_keluar'];   ?></td>
                    <td><?php $booking    = new DateTime($r['tgl_diterima']);
                        $today        = new DateTime($r['tgl_keluar']);
                        $diff         = $today->diff($booking);
                        echo $diff->y;
                        echo " Tahun ";
                        echo $diff->m;
                        echo " Bulan ";
                        echo $diff->d;
                        echo " Hari ";
                        ?></td>
                    <td><?= $r['alasan'];   ?></td>
                </tr>
            <?php $i++;
            endforeach;    ?>
        </table>

    </div>
</div>

<?= $this->endSection();;   ?>