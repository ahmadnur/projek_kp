<?= $this->extend('layout/template');   ?>
<?= $this->section('content');   ?>
<div class="container">
    <div class="col">
        <div class="row">
            <!-- <div class=""> <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#datepicker-modal-preview" class="btn btn-primary">Rentang</a> </div> END: Show Modal Toggle -->
            <!-- <div id="datepicker-modal-preview" class="modal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="/save/laprecruit" method="POST">
                            <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                                <div class="col-span-12 sm:col-span-6"> <label for="modal-datepicker-1" class="form-label">From</label> <input type="text" id="modal-datepicker-1" class="datepicker form-control" data-single-mode="true"> </div>
                                <div class="col-span-12 sm:col-span-6"> <label for="modal-datepicker-2" class="form-label">To</label> <input type="text" id="modal-datepicker-2" class="datepicker form-control" data-single-mode="true"> </div>
                            </div>
                            <div class="modal-footer text-right"> <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Cancel</button> <button type="submit" class="btn btn-primary w-20">Submit</button> </div> <!-- END: Modal Footer -->
            <!-- </form>
        </div> -->
            <!-- </div>
    </div>
    <div> -->

            <table class="table table-bordered table-striped mt-4">
                <tr>
                    <td>No</td>
                    <td><label for="profile">Id Profile</label></td>
                    <td><label for="nama">Nama Profile</label></td>
                    <td><label for="jabatan">Jabatan Dipilih</label></td>
                    <td><label for="status">Status</label></td>
                    <td><label for="opsi">opsi</label></td>
                </tr>
                <?php $angka = 1 + (10 * ($page - 1));
                foreach ($recruit as $r) :    ?>
                    <tr>
                        <td><?= $angka;   ?></td>
                        <td><?= $r['id_daftar'];   ?></td>
                        <?php foreach ($seleksi as $s) :
                            if ($r['id_proses'] == $s['id_proses']) {    ?>
                                <td><?= $s['nama'];   ?></td>
                        <?php }
                        endforeach;    ?>
                        <?php foreach ($seleksi as $s) :
                            if ($r['id_proses'] == $s['id_proses']) {
                                foreach ($jabatan as $j) :
                                    if ($s['id_lowongan'] == $j['id_lowongan']) {   ?>
                                        <td><?= $j['jabatan'];   ?></td>
                        <?php }
                                endforeach;
                            }
                        endforeach;    ?>
                        <?php foreach ($seleksi as $ts) :
                            if ($r['id_proses'] == $ts['id_proses']) {
                                if ($ts['status_pendaftar'] == 1) {  ?>
                                    <td>Diterima</td>
                                <?php } else if ($ts['status_pendaftar'] == 9) {  ?>
                                    <td>Ditolak</td>
                                <?php } else if ($ts['status_pendaftar'] == 0) { ?>
                                    <td>Masih Proses Seleksi</td>
                        <?php

                                }
                            }

                        endforeach;    ?>
                        <td><a href="/home/profil_daftar/<?= $r['id_daftar'];   ?>" class="text-blue-900">Profil</a></td>
                    </tr>
                <?php $angka++;
                endforeach;    ?>
            </table>
            <?= $pager->links('seleksi', 'karyawan_pager');   ?>
        </div>
    </div>
</div>
</div>


<?= $this->endSection();;   ?>