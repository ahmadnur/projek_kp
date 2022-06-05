<?= $this->extend('layout/template');   ?>
<?= $this->section('content');   ?>
<div class="container">
    <div class="col">
        <div class="row">
            <div class=""> <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#jabatan" class="btn btn-primary">ADD</a>
            </div>
            <ul class="nav nav-tabs" role="tablist">
                <li id="example-1-tab" class="nav-item flex-1" role="presentation"> <button class="nav-link w-full py-2 active" data-tw-toggle="pill" data-tw-target="#example-tab-1" type="button" role="tab" aria-controls="example-tab-1" aria-selected="true"> Jabatan Aktif </button> </li>
                <li id="example-2-tab" class="nav-item flex-1" role="presentation"> <button class="nav-link w-full py-2" data-tw-toggle="pill" data-tw-target="#example-tab-2" type="button" role="tab" aria-controls="example-tab-2" aria-selected="false"> Jabatan Tidak Aktif </button> </li>
            </ul>
            <div class="tab-content border-l border-r border-b form_control">
                <div id="example-tab-1" class="tab-pane leading-relaxed p-5 active overflow-scroll" role="tabpanel" aria-labelledby="example-1-tab">

                    <div class="mt-6">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <td><label for="no">No</label></td>
                                <td><label for="nama">Nama Jabatan</label></td>
                                <td><label for="deskripsi">Deskripsi</label></td>
                                <td><label for="index">Index</label></td>
                                <td><label for="parent_index">Parent Index</label></td>
                                <td><label for="divisi">Divisi</label></td>
                                <td><label for="edit">Edit</label></td>
                            </tr>
                            <?php foreach ($jabat as $k) :   ?>
                                <?php if ($k['enable'] == 0) {
                                    continue;
                                } ?>
                                <tr>
                                    <td><?= $k['id_jabatan'];  ?></td>
                                    <td><?= $k['jabatan'];   ?></td>
                                    <td><?= $k['deskripsi'];   ?></td>
                                    <td><?= $k['indek'];   ?></td>
                                    <td><?= $k['parent_indek'];   ?></td>
                                    <td><?= $k['divisi'];   ?></td>
                                    <td><a href="javascript:;" data-tw-toggle="modal" data-tw-target="#edit<?php echo $k['id_jabatan'];     ?>" class=" text-blue-800">Edit</a>
                                        <div id="edit<?php echo $k['id_jabatan'];     ?>" class="modal" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="/save/editjabatan/<?php echo $k['id_jabatan'];     ?>" method="POST">
                                                        <div class="modal-body grid-cols-2 gap-2 ">
                                                            <div>
                                                                <label for="id_j">ID Jabatan</label>
                                                            </div>
                                                            <div>
                                                                <input type="text" disabled id="id_j" name="id_jabatan" value="<?= $k['id_jabatan'];   ?>">
                                                            </div>
                                                            <div>
                                                                <label for="nama">Nama Jabatan</label>
                                                            </div>
                                                            <div>
                                                                <input type="text" id="nama" name="nama" value="<?= $k['jabatan'];   ?>">
                                                            </div>
                                                            <div>
                                                                <label for="deskripsi">Deskripsi</label>
                                                            </div>
                                                            <div>
                                                                <input type="text" id="deskripsi" name="deskripsi" value="<?= $k['deskripsi'];   ?>">
                                                            </div>
                                                            <div>
                                                                <label for="index">Index</label>
                                                            </div>
                                                            <div>
                                                                <input type="text" id="index" name="indek" value="<?= $k['indek'];   ?>">
                                                            </div>
                                                            <div>
                                                                <label for="parent_index">Parent Index</label>
                                                            </div>
                                                            <div>
                                                                <input type="text" id="parent_index" name="parent_indek" value="<?= $k['parent_indek'];   ?>">
                                                            </div>
                                                            <div>
                                                                <label for="divisi">Divisi</label>
                                                            </div>
                                                            <div>
                                                                <input type="text" id="divisi" name="divisi" value="<?= $k['divisi'];   ?>">
                                                            </div>

                                                            <div>
                                                                <label for="status">Status</label>
                                                            </div>
                                                            <div>
                                                                <select name="enable" id="status">
                                                                    <option value="1">Enable</option>
                                                                    <option value="0">Disable</option>
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
                            <?php endforeach;    ?>
                        </table>
                    </div>
                </div>
                <div id="example-tab-2" class="tab-pane leading-relaxed p-5 overflow-scroll" role="tabpanel" aria-labelledby="example-2-tab">
                    <div class=" items-center">

                        <div class="mt-6">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <td><label for="no">No</label></td>
                                    <td><label for="nama">Nama Jabatan</label></td>
                                    <td><label for="deskripsi">Deskripsi</label></td>
                                    <td><label for="index">Index</label></td>
                                    <td><label for="parent_index">Parent Index</label></td>
                                    <td><label for="divisi">Divisi</label></td>
                                    <td><label for="edit">Edit</label></td>
                                </tr>
                                <?php foreach ($jabat as $k) :   ?>
                                    <?php if ($k['enable'] == 1) {
                                        continue;
                                    } ?>
                                    <tr>
                                        <td><?= $k['id_jabatan'];  ?></td>
                                        <td><?= $k['jabatan'];   ?></td>
                                        <td><?= $k['deskripsi'];   ?></td>
                                        <td><?= $k['indek'];   ?></td>
                                        <td><?= $k['parent_indek'];   ?></td>
                                        <td><?= $k['divisi'];   ?></td>
                                        <td><a href="javascript:;" data-tw-toggle="modal" data-tw-target="#edit<?php echo $k['id_jabatan'];     ?>" class=" text-blue-800">Edit</a>
                                            <div id="edit<?php echo $k['id_jabatan'];     ?>" class="modal" tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form action="/save/editjabatan/<?php echo $k['id_jabatan'];     ?>" method="POST">
                                                            <div class="modal-body grid-cols-2 gap-2 ">
                                                                <div>
                                                                    <label for="id_j">ID Jabatan</label>
                                                                </div>
                                                                <div>
                                                                    <input type="text" disabled id="id_j" name="id_jabatan" value="<?= $k['id_jabatan'];   ?>">
                                                                </div>
                                                                <div>
                                                                    <label for="nama">Nama Jabatan</label>
                                                                </div>
                                                                <div>
                                                                    <input type="text" id="nama" name="nama" value="<?= $k['jabatan'];   ?>">
                                                                </div>
                                                                <div>
                                                                    <label for="deskripsi">Deskripsi</label>
                                                                </div>
                                                                <div>
                                                                    <input type="text" id="deskripsi" name="deskripsi" value="<?= $k['deskripsi'];   ?>">
                                                                </div>
                                                                <div>
                                                                    <label for="index">Index</label>
                                                                </div>
                                                                <div>
                                                                    <input type="text" id="index" name="indek" value="<?= $k['indek'];   ?>">
                                                                </div>
                                                                <div>
                                                                    <label for="parent_index">Parent Index</label>
                                                                </div>
                                                                <div>
                                                                    <input type="text" id="parent_index" name="parent_indek" value="<?= $k['parent_indek'];   ?>">
                                                                </div>
                                                                <div>
                                                                    <label for="divisi">Divisi</label>
                                                                </div>
                                                                <div>
                                                                    <input type="text" id="divisi" name="divisi" value="<?= $k['divisi'];   ?>">
                                                                </div>

                                                                <div>
                                                                    <label for="status">Status</label>
                                                                </div>
                                                                <div>
                                                                    <select name="enable" id="status">
                                                                        <option value="1">Enable</option>
                                                                        <option value="0">Disable</option>
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
                                <?php endforeach;    ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div id="jabatan" class="modal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="/save/jabatan" method="POST">
                            <div class="modal-body grid grid-cols-2 gap-2 ">
                                <div>
                                    <label for="nama">Nama Jabatan</label>
                                </div>
                                <div>
                                    <input type="text" id="nama" name="nama">
                                </div>
                                <div>
                                    <label for="deskripsi">Deskripsi</label>
                                </div>
                                <div>
                                    <input type="text" id="deskripsi" name="deskripsi">
                                </div>
                                <div>
                                    <label for="index">Index</label>
                                </div>
                                <div>
                                    <input type="text" id="index" name="indek">
                                </div>
                                <div>
                                    <label for="parent_index">Parent Index</label>
                                </div>
                                <div>
                                    <input type="text" id="parent_index" name="parent_indek">
                                </div>
                                <div>
                                    <label for="divisi">Divisi</label>
                                </div>
                                <div>
                                    <input type="text" id="divisi" name="divisi">
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
<?= $this->endSection();;   ?>