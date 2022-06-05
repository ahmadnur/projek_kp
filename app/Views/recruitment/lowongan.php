<?= $this->extend('layout/template');   ?>
<?= $this->section('content');   ?>
<div class="container">
    <div class="col">
        <div class="row">
            <div>
                <div class=""> <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#lowongan" class="btn btn-primary">ADD</a>
                </div>
                <ul class="nav nav-tabs" role="tablist">
                    <li id="example-1-tab" class="nav-item flex-1" role="presentation"> <button class="nav-link w-full py-2 active" data-tw-toggle="pill" data-tw-target="#example-tab-1" type="button" role="tab" aria-controls="example-tab-1" aria-selected="true"> Lowongan Aktif </button> </li>
                    <li id="example-2-tab" class="nav-item flex-1" role="presentation"> <button class="nav-link w-full py-2" data-tw-toggle="pill" data-tw-target="#example-tab-2" type="button" role="tab" aria-controls="example-tab-2" aria-selected="false"> Lowongan Tidak Aktif </button> </li>
                </ul>
                <div class="tab-content border-l border-r border-b form_control">
                    <div id="example-tab-1" class="tab-pane leading-relaxed p-5 active overflow-scroll" role="tabpanel" aria-labelledby="example-1-tab">
                        <?php $angka = 1    ?>
                        <div class="mt-6">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <td><label for="no">No</label></td>
                                    <td><label for="lowongan">ID Lowongan</label></td>
                                    <td><label for="jabatam">Jabatan</label></td>
                                    <td><label for="jumlah">Jumlah</label></td>
                                    <td><label for="mulai">Tgl Mulai</label></td>
                                    <td><label for="exp">Tgl Expired</label></td>
                                    <td><label for="opsi">Opsi</label></td>
                                </tr>
                                <?php foreach ($lowong as $k) :  ?>
                                    <?php if ($k['status'] == '0') {
                                        continue;
                                    }    ?>
                                    <tr>
                                        <td><?= $angka;   ?></td>
                                        <td><?= $k['id_lowongan'];   ?></td>
                                        <td><?= $k['jabatan'];   ?></td>
                                        <td><?= $k['jumlah'];   ?></td>
                                        <td><?= $k['tgl_start'];   ?></td>
                                        <td><?= $k['tgl_exp'];   ?></td>
                                        <td><a href="javascript:;" data-tw-toggle="modal" data-tw-target="#edit<?php echo $k['id_lowongan']    ?>" class="text-blue-900">Edit</a>
                                            <div id="edit<?php echo $k['id_lowongan']    ?>" class="modal" tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form action="/save/editlowongan/<?= $k['id_lowongan'];   ?>">
                                                            <div class="modal-body grid grid-cols-2 gap-2 ">
                                                                <div>
                                                                    <label for="idowongan">ID Lowongan</label>
                                                                </div>
                                                                <div>
                                                                    <input type="text" id="idlowongan" disabled name="id_lowongan" value="<?= $k['id_lowongan'];   ?>">
                                                                </div>
                                                                <div>
                                                                    <label for="jabatan">Jabatan</label>
                                                                </div>
                                                                <div>
                                                                    <select name="id_jabatan" id="jabatan">
                                                                        <?php foreach ($jabatan as $j) :    ?>
                                                                            <?php if ($k['jabatan'] == $j['jabatan']) { ?>
                                                                                <option value="<?= $j['id_jabatan'];   ?>" selected><?= $j['jabatan'];   ?></option>

                                                                            <?php } else { ?>
                                                                                <option value="<?= $j['id_jabatan'];   ?>"><?= $j['jabatan'];   ?></option>

                                                                            <?php }    ?>
                                                                        <?php endforeach;    ?>
                                                                    </select>
                                                                </div>
                                                                <div>
                                                                    <label for="quantity">Quantity</label>
                                                                </div>
                                                                <div>
                                                                    <input type="text" id="quantity" name="jumlah" value="<?= $k["jumlah"];   ?>">
                                                                </div>
                                                                <div>
                                                                    <label for="mulai">Dari</label>
                                                                </div>
                                                                <div>
                                                                    <input type="date" id="mulai" name="tgl_start" value="<?= $k['tgl_start'];   ?>">
                                                                </div>
                                                                <div>
                                                                    <label for="exp">Sampai</label>
                                                                </div>
                                                                <div>
                                                                    <input type="date" id="exp" name="tgl_exp" value="<?= $k['tgl_exp'];   ?>">
                                                                </div>
                                                                <div>
                                                                    <label for="Note">Note</label>
                                                                </div>
                                                                <div>
                                                                    <textarea name="note" id="note" cols="17" rows="3" ?><?= $k['note'];   ?></textarea>
                                                                </div>
                                                                <div>
                                                                    <label for="status">Status</label>
                                                                </div>
                                                                <div>
                                                                    <select name="status" id="status">
                                                                        <?php if ($k['status'] == 1) { ?>
                                                                            <option selected value="1">aktif</option>
                                                                            <option value="0">tidak aktif</option>
                                                                        <?php } else if ($k['status'] == 0) {   ?>
                                                                            <option value="1"> aktif</option>
                                                                            <option selected value="0">tidak aktif</option>
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

                                <?php $angka = $angka + 1;
                                endforeach;    ?>
                            </table>
                        </div>
                    </div>
                    <div id="example-tab-2" class="tab-pane leading-relaxed p-5 overflow-scroll" role="tabpanel" aria-labelledby="example-2-tab">
                        <div class=" items-center">
                            <?php $angka1 = 1 + (10 * ($page - 1));    ?>
                            <div class="mt-6">
                                <table class="table table-bordered table-striped mb-4">
                                    <tr>
                                        <td><label for="no">No</label></td>
                                        <td><label for="lowongan">ID Lowongan</label></td>
                                        <td><label for="jabatam">Jabatan</label></td>
                                        <td><label for="jumlah">Jumlah</label></td>
                                        <td><label for="mulai">Tgl Mulai</label></td>
                                        <td><label for="exp">Tgl Expired</label></td>
                                        <td><label for="opsi">Opsi</label></td>
                                    </tr>
                                    <?php foreach ($lowongan as $l) :
                                        foreach ($lowong as $k) :
                                            if ($l['id_lowongan'] == $k['id_lowongan']) {    ?>
                                                <?php if ($k['status'] == '1') {
                                                    continue;
                                                }    ?>
                                                <tr>
                                                    <td><?= $angka1;   ?></td>
                                                    <td><?= $k['id_lowongan'];   ?></td>
                                                    <td><?= $k['jabatan'];   ?></td>
                                                    <td><?= $k['jumlah'];   ?></td>
                                                    <td><?= $k['tgl_start'];   ?></td>
                                                    <td><?= $k['tgl_exp'];   ?></td>
                                                    <td><a href="javascript:;" data-tw-toggle="modal" data-tw-target="#edit<?php echo $k['id_lowongan']    ?>" class="text-blue-900">Edit</a>
                                                        <div id="edit<?php echo $k['id_lowongan']    ?>" class="modal" tabindex="-1" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <form action="/save/editlowongan/<?= $k['id_lowongan'];   ?>">
                                                                        <div class="modal-body grid grid-cols-2 gap-2 ">
                                                                            <div>
                                                                                <label for="idowongan">ID Lowongan</label>
                                                                            </div>
                                                                            <div>
                                                                                <input type="text" id="idlowongan" disabled name="id_lowongan" value="<?= $k['id_lowongan'];   ?>">
                                                                            </div>
                                                                            <div>
                                                                                <label for="jabatan">Jabatan</label>
                                                                            </div>
                                                                            <div>
                                                                                <select name="id_jabatan" id="jabatan">
                                                                                    <?php foreach ($jabatan as $j) :    ?>
                                                                                        <?php if ($k['jabatan'] == $j['jabatan']) { ?>
                                                                                            <option value="<?= $j['id_jabatan'];   ?>" selected><?= $j['jabatan'];   ?></option>

                                                                                        <?php } else { ?>
                                                                                            <option value="<?= $j['id_jabatan'];   ?>"><?= $j['jabatan'];   ?></option>

                                                                                        <?php }    ?>
                                                                                    <?php endforeach;    ?>
                                                                                </select>
                                                                            </div>
                                                                            <div>
                                                                                <label for="quantity">Quantity</label>
                                                                            </div>
                                                                            <div>
                                                                                <input type="text" id="quantity" name="jumlah" value="<?= $k["jumlah"];   ?>">
                                                                            </div>
                                                                            <div>
                                                                                <label for="mulai">Dari</label>
                                                                            </div>
                                                                            <div>
                                                                                <input type="date" id="mulai" name="tgl_start" value="<?= $k['tgl_start'];   ?>">
                                                                            </div>
                                                                            <div>
                                                                                <label for="exp">Sampai</label>
                                                                            </div>
                                                                            <div>
                                                                                <input type="date" id="exp" name="tgl_exp" value="<?= $k['tgl_exp'];   ?>">
                                                                            </div>
                                                                            <div>
                                                                                <label for="Note">Note</label>
                                                                            </div>
                                                                            <div>
                                                                                <textarea name="note" id="note" cols="17" rows="3" ?><?= $k['note'];   ?></textarea>
                                                                            </div>
                                                                            <div>
                                                                                <label for="status">Status</label>
                                                                            </div>
                                                                            <div>
                                                                                <select name="status" id="status">
                                                                                    <?php if ($k['status'] == 1) { ?>
                                                                                        <option selected value="1">aktif</option>
                                                                                        <option value="0">tidak aktif</option>
                                                                                    <?php } else if ($k['status'] == 0) {   ?>
                                                                                        <option value="1"> aktif</option>
                                                                                        <option selected value="0">tidak aktif</option>
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
                                    <?php $angka1 = $angka1 + 1;
                                            }
                                        endforeach;
                                    endforeach;    ?>
                                </table>
                                <?= $pager->links('lowongan', 'karyawan_pager');   ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="lowongan" class="modal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="/save/lowongan" method="POST">
                                <div class="modal-body grid grid-cols-2 gap-2 ">
                                    <div>
                                        <label for="jabatan">Jabatan</label>
                                    </div>
                                    <div>
                                        <select name="id_jabatan" id="jabatan">
                                            <?php foreach ($jabatan as $k) :    ?>
                                                <option value="<?= $k['id_jabatan'];   ?>"><?= $k['jabatan'];   ?></option>
                                            <?php endforeach;    ?>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="quantity">Quantity</label>
                                    </div>
                                    <div>
                                        <input type="text" id="quantity" name="jumlah">
                                    </div>
                                    <div>
                                        <label for="mulai">Dari</label>
                                    </div>
                                    <div>
                                        <input type="date" id="mulai" name="tgl_start">
                                    </div>
                                    <div>
                                        <label for="exp">Sampai</label>
                                    </div>
                                    <div>
                                        <input type="date" id="exp" name="tgl_exp">
                                    </div>
                                    <div>
                                        <label for="Note">Note</label>
                                    </div>
                                    <div>
                                        <textarea name="note" id="note" cols="17" rows="3" placeholder="Note"></textarea>
                                    </div>
                                    <div>
                                        <label for="status">Status</label>
                                    </div>
                                    <div>
                                        <select name="status" id="status">
                                            <option value="1">aktif</option>
                                            <option value="0">tidak aktif</option>
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
            </div>
        </div>
    </div>
</div>

<?= $this->endSection();;   ?>