<?= $this->extend('layout/template');   ?>
<?= $this->section('content');   ?>
<div class="container">
    <div class="col">
        <div class="row">
            <div class="grid grid-cols-2 gap-2 w-1/3">
                <div>
                    <label for="">lowongan</label>
                </div>
                <div>
                    <label for="">sisa</label>
                </div>
                <?php foreach ($lowongan as $l) :    ?>
                    <div>
                        <label for="lab"><?= $l['jabatan'];   ?></label>
                    </div>
                    <div>
                        <label for="yu"><?= $l['sisa'];   ?></label>
                    </div>
                <?php endforeach;    ?>
            </div>
            <table class="table table-bordered mt-4">
                <tr>
                    <td><label for="proses">Id Proses</label></td>
                    <td><label for="profile">Id Profile</label></td>
                    <td><label for="nama">Nama Profile</label></td>
                    <td><label for="jabatan">Jabatan Dipilih</label></td>
                    <td><label for="status">Status Recruitment</label></td>
                    <td><label for="approval">Pending Approval</label></td>
                    <td><label for="Action"></label></td>
                </tr>
                <?php foreach ($seleksi as $s) :   ?>
                    <?php foreach ($hasilb as $h) :
                        if ($s['id_daftar'] == $h['id_daftar']) {    ?>
                            <tr>
                                <td><?= $s['id_proses'];   ?></td>
                                <td><?= $s['id_daftar'];   ?></td>
                                <td> <?= $s['nama'];   ?></td>
                                <?php foreach ($jabatan as $j) :
                                    if ($s['id_lowongan'] == $j['id_lowongan']) {  ?>
                                        <td><?= $j['jabatan'];   ?></td>

                                    <?php  }
                                endforeach;
                                if ($s['status_pendaftar'] == 0) { ?>
                                    <td>Masih Proses</td>
                                <?php } else if ($s['status_pendaftar'] == 1) {   ?>
                                    <td>Diterima</td>
                                <?php } else if ($s['status_pendaftar'] == 9) {    ?>
                                    <td>Ditolak</td>
                                <?php }    ?>
                                <td><?= $s['status_approve'];   ?></td>
                                <?php foreach ($hasil as $h) :
                                    if ($s['id_daftar'] == $h['id_daftar']) {
                                        $kunci = $h['id_status'];
                                    }
                                endforeach;
                                ?>
                                <td>
                                    <div class="">
                                        <a href="\recruitment\next\<?= $s['id_proses'];   ?>\<?= $s['status_approve'];   ?>" class="text-blue-900 ml-5 whitespace-nowrap">Next Approval</a>
                                    </div>
                                    <div>
                                        <a href="\recruitment\denied\<?= $s['id_proses'];   ?>\<?= $kunci;   ?>" class="text-red-600" onclick="return confirm('Apakah anda yakin?');">Denied</a>
                                        <?php foreach ($lowongan as $l) :
                                            if ($s['id_lowongan'] == $l['id_lowongan']) {
                                                if ($l['sisa'] != 0) {   ?>
                                                    <a href="\recruitment\accept\<?= $s['id_proses'];   ?>\<?= $kunci;   ?>\<?= $s['id_lowongan'];   ?>" class="text-green-600 ml-2" onclick="return confirm('Apakah anda yakin?');">Accept</a>
                                        <?php }
                                            }
                                        endforeach;    ?>
                                    </div>
                                </td>

                            </tr>
                    <?php }
                    endforeach;
                    ?>
                <?php
                endforeach; ?>
            </table>
            <div id="jabatan<?php echo $s['id_proses'];    ?>" class="modal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="/save/seleksi" method="POST">

                            <div class="modal-body">
                                <input type="text" id="pros" name="id_proses" value="<?= $s['id_proses'];    ?>">
                                <textarea placeholder="Note" name="note" id="note" cols="30" rows="10"></textarea>
                            </div>
                            <div class="modal-footer text-right">
                                <!-- <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1"></button> -->
                                <button type="submit" class="btn btn-primary w-20">Simpan</button>
                            </div> <!-- END: Modal Footer -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection();;   ?>