<?= $this->extend('layout/template');   ?>
<?= $this->section('content');   ?>
<div class="container">
    <div class="col">
        <div class="row">
            <div>
                <?php
                if (session()->getFlashData('message1')) {
                ?>
                    <div class="alert alert-warning alert-dismissible show flex items-center mb-2" role="alert"> <i data-lucide="alert-circle" class="w-6 h-6 mr-2"></i>
                        <?= session()->getFlashData('message1') ?>
                        <button type="button" class="btn-close" data-tw-dismiss="alert" aria-label="Close"> <i data-lucide="x" class="w-4 h-4"></i> </button>
                    </div>
                <?php
                } else if (session()->getFlashdata('message')) {
                ?>
                    <div class="alert alert-primary alert-dismissible show flex items-center mb-2" role="alert">
                        <?= session()->getFlashData('message') ?>
                        <button type="button" class="btn-close" data-tw-dismiss="alert" aria-label="Close"> <i data-lucide="x" class="w-4 h-4"></i> </button>

                    <?php } ?>
                    </div>
                    <div class="mb-3"> <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#ijin" class="btn btn-primary">ADD</a>
                    </div>
                    <div>
                        <table class="table table-bordered mb-4 ">
                            <tr>
                                <td><label for="id">No</label></td>
                                <td><label for="nama">Nama</label></td>
                                <td><label for="durasi">Durasi</label></td>
                                <td><label for="keterangan">Keterangan</label></td>
                                <td><label for="dokumen">Dokumen</label></td>
                                <td><label for="status">Status</label></td>
                                <td><label for="opsi">Opsi</label></td>
                            </tr>
                            <tbody>
                                <?php $no = 1 + (10 * ($page - 1));
                                foreach ($send as $k) :   ?>
                                    <tr>
                                        <td><?= $no;   ?></td>
                                        <?php foreach ($karyawan as $d) :
                                            if ($d['id_karyawan'] == $k['id_karyawan']) {   ?>
                                                <td><?= $d['nama'];   ?></td>
                                        <?php }
                                        endforeach; ?>
                                        <?php foreach ($ijin as $i) :
                                            if ($k['id_jenis'] == $i['id_jenis']) {  ?>
                                                <td><?= $i['durasi'];   ?> Hari</td>
                                                <td><?= $i['nama'];   ?></td>
                                        <?php }
                                        endforeach;    ?>
                                        <td><a href="/absensi/file/<?= $k['surat'];   ?>/"><?= $k['surat'];   ?></a></td>
                                        <td><?= $k['status_i'];   ?></td>
                                        <td><a href="javascript:;" data-tw-toggle="modal" data-tw-target="#edit<?php echo $k['id_ijin'];     ?>" class=" text-blue-800">Edit</a>
                                            <div id="edit<?php echo $k['id_ijin'];     ?>" class="modal" tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form action="/save/editijin/<?php echo $k['id_ijin'];     ?>" method="POST" enctype="multipart/form-data">
                                                            <div class="modal-body grid-cols-2 gap-2 ">

                                                                <div>
                                                                    <label for="file">Upload File</label>
                                                                </div>
                                                                <div>
                                                                    <input type="file" id="file" name="surat">
                                                                </div>
                                                                <div>
                                                                    <label for="status">Status</label>
                                                                </div>
                                                                <div>
                                                                    <select name="status" id="status">
                                                                        <?php if ($k['status_i'] == "belum diterima") { ?>
                                                                            <option selected value="belum diterima">Belum Diterima</option>
                                                                            <option value="diterima">Diterima</option>
                                                                        <?php } else if ($k['status_i'] == "diterima") {   ?>
                                                                            <option value="belum diterima">Belum Diterima</option>
                                                                            <option selected value="diterima">Diterima</option>
                                                                        <?php }    ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer text-right">
                                                                <!-- <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1"></button> -->
                                                                <button type="submit" class="btn btn-primary w-20">Simpan</button>
                                                            </div> <!-- END: Modal Footer -->
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>
                                <?php $no++;
                                endforeach;    ?>
                            </tbody>
                        </table>
                    </div>
                    <?= $pager->links('ijin', 'karyawan_pager');   ?>
                    <div id="ijin" class="modal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="/save/harian" method="POST">

                                    <div class="modal-body grid grid-cols-2 gap-2 ">
                                        <div>
                                            <label for="nama">Nama</label>
                                        </div>
                                        <div>
                                            <select name="id_karyawan" id="nama">

                                                <?php foreach ($karyawan as $k) :    ?>
                                                    <option value="<?= $k['id_karyawan'];   ?>"><?= $k['nama'];   ?></option>
                                                <?php endforeach;    ?>
                                            </select>

                                        </div>
                                        <div>
                                            <label for="pilihan ijin">Pilihan Ijin</label>
                                        </div>
                                        <div>
                                            <select name="nama" id="pilihan ijin">
                                                <?php foreach ($ijin as $k) :    ?>
                                                    <option value="<?= $k['id_jenis'];   ?>"><?= $k['nama'];   ?></option>
                                                <?php endforeach;    ?>
                                            </select>
                                        </div>
                                        <div>
                                            <input type="text" id="status" name="status" hidden value="belum diterima">
                                            <input type="file" id="surat" name="surat" hidden value="0">
                                        </div>
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
</div>


<?= $this->endSection();   ?>