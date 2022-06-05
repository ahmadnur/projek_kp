<?= $this->extend('layout/template');   ?>
<?= $this->section('content');   ?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="">
                <div class="flex justify-center mb-5"> <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#ijin" class="btn btn-primary">ADD IJIN</a>
                </div>
                <div>
                    <ul class="nav nav-tabs" role="tablist">
                        <li id="example-1-tab" class="nav-item flex-1" role="presentation"> <button class="nav-link w-full py-2 active" data-tw-toggle="pill" data-tw-target="#example-tab-1" type="button" role="tab" aria-controls="example-tab-1" aria-selected="true"> Jenis Ijin </button> </li>
                        <li id="example-2-tab" class="nav-item flex-1" role="presentation"> <button class="nav-link w-full py-2" data-tw-toggle="pill" data-tw-target="#example-tab-2" type="button" role="tab" aria-controls="example-tab-2" aria-selected="false"> kosong</button> </li>
                    </ul>
                    <div class="tab-content border-l border-r border-b form_control">
                        <div id="example-tab-1" class="tab-pane leading-relaxed p-5 active overflow-scroll" role="tabpanel" aria-labelledby="example-1-tab">

                            <div class="mt-6">
                                <table class="table table-bordered table-striped">
                                    <tr>
                                        <td><label for="no">No</label></td>
                                        <td><label for="nama">Nama ijin</label></td>
                                        <td><label for="deskripsi">Deskripsi</label></td>
                                        <td><label for="durasi">Durasi</label></td>
                                        <td><label for="total">Maksimal ijin</label></td>
                                    </tr>
                                    <?php foreach ($ijin as $k) :   ?>
                                        <tr>
                                            <td><?= $k['id_jenis'];  ?></td>
                                            <td><?= $k['nama'];   ?></td>
                                            <td><?= $k['deskripsi'];   ?></td>
                                            <td><?= $k['durasi'];   ?></td>
                                            <td><?= $k['total_ijin'];   ?></td>
                                        </tr>
                                    <?php endforeach;    ?>
                                </table>
                            </div>
                        </div>
                        <div id="example-tab-2" class="tab-pane leading-relaxed p-5 overflow-scroll" role="tabpanel" aria-labelledby="example-2-tab">
                            <div class=" items-center">

                                <div class="mt-6">
                                    <table class="table table-bordered table-striped">

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="ijin" class="modal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="/home/ijinadmin" method="POST">
                                <div class="modal-body grid grid-cols-2 gap-2 ">
                                    <div>
                                        <label for="nama">Nama Ijin</label>
                                    </div>
                                    <div>
                                        <input type="text" id="nama" name="nama">
                                    </div>
                                    <div>
                                        <label for="deskripsi">Deskripsi</label>
                                    </div>
                                    <div>
                                        <textarea name="deskripsi" id="deskripsi" cols="17" rows="2"></textarea>
                                    </div>
                                    <div>
                                        <label for="durasi">Durasi</label>
                                    </div>
                                    <div>
                                        <input type="text" id="durasi" name="durasi">
                                    </div>
                                    <div>
                                        <label for="mak">Maksimal Ijin</label>
                                    </div>
                                    <div>
                                        <input type="text" id="mak" name="total_ijin">
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