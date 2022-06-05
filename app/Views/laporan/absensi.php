<?= $this->extend('layout/template');   ?>
<?= $this->section('content');   ?>
<div class="container overflow-scroll">
    <div class="col">
        <div class="row">
            <div class="flex">
                <form action="/laporan/absensi_tampil">
                    <input type="date" id="date" name="date">
                    <button class="static ml-4 btn btn-green" type="submit">Submit</button>
                </form>
            </div>
            <?php if (session()->getFlashdata('error')) :  ?>
                <div class="alert alert-primary alert-dismissible show flex items-center mb-2" role="alert">
                    <?= session()->getFlashData('error') ?>
                    <button type="button" class="btn-close" data-tw-dismiss="alert" aria-label="Close"> <i data-lucide="x" class="w-4 h-4"></i> </button>
                </div>
            <?php endif;    ?>
            <div class="mt-6">
                <table class="table table-bordered">
                    <tr>
                        <td><label for="id">ID</label></td>
                        <td><label for="nama">Nama</label></td>
                        <td><label for="pin">PIN</label></td>
                        <td><label for="tanggal">Tanggal</label></td>
                        <td><label for="jam">Jam Masuk</label></td>
                        <td><label for="status">Status</label></td>
                        <td><label for="sn">SN Mesin</label></td>
                        <td><label for="mesin">Mesin</label></td>
                    </tr>
                    <?php if (empty($hasil)) {
                        foreach ($absensi as $a) :    ?>
                            <tr>
                                <td><?= $a['id_absensi'];   ?></td>
                                <?php foreach ($daftar as $d) :
                                    if ($d['id_karyawan'] == $a['id_karyawan']) { ?>
                                        <td><?= $d['nama'];   ?></td>
                                <?php }
                                endforeach;    ?>
                                <td><?= $a['pin'];   ?></td>
                                <td><?= $a['tanggal_a'];   ?></td>
                                <td><?= $a['jam'];   ?></td>
                                <td><?= $a['status_a'];   ?></td>
                                <td><?= $a['sn_mesin'];   ?></td>
                                <td><?= $a['nama_mesin'];   ?></td>

                            </tr>
                        <?php endforeach;
                    } else if (isset($hasil)) {
                        foreach ($hasil as $a) :    ?>
                            <tr>
                                <td><?= $a['id_absensi'];   ?></td>
                                <?php foreach ($daftar as $d) :
                                    if ($d['id_karyawan'] == $a['id_karyawan']) { ?>
                                        <td><?= $d['nama'];   ?></td>
                                <?php }
                                endforeach;    ?>
                                <td><?= $a['pin'];   ?></td>
                                <td><?= $a['tanggal_a'];   ?></td>
                                <td><?= $a['jam'];   ?></td>
                                <td><?= $a['status_a'];   ?></td>
                                <td><?= $a['sn_mesin'];   ?></td>
                                <td><?= $a['nama_mesin'];   ?></td>

                            </tr>
                    <?php endforeach;
                    } ?>
                </table>
                <?php if (empty($hasil)) {
                ?>
                    <?= $pager->links('absensi', 'karyawan_pager');   ?>
                <?php
                } ?>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection();;   ?>