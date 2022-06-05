<?= $this->extend('layout/template');   ?>
<?= $this->section('content');   ?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="intro-y box lg:mt-5">
                <?php if ($karyawan['status_karyawan'] == 1) { ?>
                    <h2 class="btn-danger rounded-full align-middle text-xl text-center m-auto">KARYAWAN RESIGN</h2>
                <?php   }    ?>
                <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">
                        Display Information
                    </h2>
                    <?php if ($karyawan['status_karyawan'] == 0) {    ?>
                        <div>
                            <div class=""> <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#resign<?php echo $karyawan['id_k'];    ?>" class="btn btn-warning">Resign</a>
                            </div>
                        </div>
                    <?php }    ?>
                </div>
                <div class="p-5">
                    <form action="/save/edit_karyawan/<?= $karyawan['id_k'];   ?>" method="POST" enctype="multipart/form-data">
                        <div class="flex flex-col-reverse xl:flex-row">
                            <div class="flex-1 mt-6 xl:mt-0">
                                <div class="grid grid-cols-12 gap-x-5">
                                    <div class="sm:flex col-span-12 2xl:col-span-6 mt-3">
                                        <label class="whitespace-nowrap w-3/12 for=" update-profile-form-1" class="form-label ">Nama Karyawan</label>
                                        <input id="update-profile-form-1" type="text" class="form-control" value="<?= $tambah['nama'];   ?>" disabled>
                                        <input id="update-profile-form-1" type="text" name="id_karyawan" class="form-control" value="<?= $karyawan['id_karyawan'];   ?>" hidden>
                                        <input type="hidden" id="id" name="fotolama" value="<?= $karyawan['foto'];   ?>">
                                    </div>
                                    <div class="sm:flex col-span-12 2xl:col-span-6 mt-3">
                                        <label class="whitespace-nowrap w-3/12 for=" update-profile-form-2" class="form-label">Email</label>
                                        <input class="form-control" type="text" id="update-profile-2" name="email" value="<?= $karyawan['email'];   ?>">
                                    </div>
                                    <div class="sm:flex col-span-12 2xl:col-span-6 mt-3">
                                        <label class="whitespace-nowrap w-3/12 for=" update-profile-form-3" class="form-label">Jabatan</label>
                                        <select id="update-profile-form-3" data-search="true" name="id_jabatan" class="tom-select form-control">
                                            <?php foreach ($jabatan as $j) :
                                                if ($j['id_jabatan'] == $karyawan['id_jabatan']) {
                                            ?>
                                                    <option value="<?= $j['id_jabatan'];   ?>" selected><?= $j['jabatan'];   ?></option>
                                                <?php } else {    ?>
                                                    <option value="<?= $j['id_jabatan'];   ?>"><?= $j['jabatan'];   ?></option>
                                            <?php }
                                            endforeach;    ?>
                                        </select>
                                    </div>
                                    <div class="sm:flex col-span-12 2xl:col-span-6 mt-3">
                                        <label class="whitespace-nowrap w-3/12 for=" update-profile-form-4" class="form-label">Nomor Hp</label>
                                        <input id="update-profile-form-4" type="text" name="no_hp" class="form-control" placeholder="Input text" value="<?= $karyawan['no_hp_'];   ?>">
                                    </div>
                                    <div class="sm:flex col-span-12 2xl:col-span-6 mt-3">
                                        <label class="whitespace-nowrap w-3/12 for=" update-profile-form-4" class="form-label">Nomor Telepon</label>
                                        <input id="update-profile-form-4" type="text" name="no_telp" class="form-control" placeholder="Input text" value="<?= $karyawan['no_telp_'];   ?>">
                                    </div>
                                    <div class="sm:flex col-span-12 2xl:col-span-6 mt-3">
                                        <label class="whitespace-nowrap w-3/12 for=" update-profile-form-4" class="form-label">Nomor BPJS</label>
                                        <input id="update-profile-form-4" type="text" name="bpjs" class="form-control" placeholder="Input text" value="<?= $karyawan['nmr_bpjs'];   ?>">
                                    </div>
                                    <div class="sm:flex col-span-12 2xl:col-span-6 mt-3">
                                        <label class="whitespace-nowrap w-3/12 for=" update-profile-form-4" class="form-label">Nomor Jamsostek</label>
                                        <input id="update-profile-form-4" type="text" name="jamsostek" class="form-control" placeholder="Input text" value="<?= $karyawan['nmr_jamsostek'];   ?>">
                                    </div>

                                    <div class="sm:flex col-span-12 2xl:col-span-6 mt-3">
                                        <label class="whitespace-nowrap w-3/12 for=" update-profile-form-5" class="form-label">Alamat</label>
                                        <textarea id="update-profile-form-5" class="form-control" disabled placeholder="Adress"><?= $tambah['alamat'];   ?></textarea>
                                    </div>
                                    <div class="sm:flex col-span-12 2xl:col-span-6 mt-3"> <label class="whitespace-nowrap w-3/12 for=" update-profile-form-5" class="form-label">Fasilitas</label>
                                        <textarea id="update-profile-form-5" class="form-control" name="fasilitas" placeholder="Adress"><?= $karyawan['fasilitas'];   ?></textarea>
                                    </div>
                                </div>

                            </div>
                            <!-- Kalau ada Foto Pakai yang dibawah -->
                            <div class="w-72 mx-auto xl:mr-0 xl:ml-6">
                                <div class="border-0 shadow-sm border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                                    <div class="h-72 relative image-fit cursor-pointer zoom-in mx-auto">
                                        <img class="rounded-md img-preview" src="/foto/<?= $karyawan['foto'];   ?>">
                                        <!-- <div title="Remove this profile photo?" class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2"> <i data-lucide="x" class="w-4 h-4"></i> </div> -->
                                    </div>
                                    <div class="mx-auto cursor-pointer relative mt-5">
                                        <button type="button" class="btn btn-primary w-full">Change Photo</button>
                                        <input type="file" id="foto" name="foto" onchange="preview()" accept=".jpg,.jpeg" class="w-full h-full top-0 left-0 absolute opacity-0">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary w-20 mt-3">Save</button>
                    </form>
                </div>
            </div>
            <!-- END: Display Information -->
            <!-- BEGIN: Personal Information -->

            <!-- END: Personal Information -->
            <div id="resign<?php echo $karyawan['id_k'];    ?>" class="modal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="/save/resign" method="POST">
                            <div class="modal-body grid grid-cols-2 gap-2 ">
                                <div>
                                    <label for="alasan">Alasan</label>
                                </div>
                                <div>
                                    <input type="text" id="alasan" name="alasan">
                                </div>
                                <div>
                                    <label for="tanggal">Tanggal Keluar</label>
                                </div>
                                <div>
                                    <input type="date" id="tanggal" name="keluar">
                                </div>
                                <input hidden type="text" id="id" name="id_k" value="<?= $karyawan['id_k'];   ?>">
                                <input hidden type="text" id="id" name="id_daftar" value="<?= $karyawan['id_daftar'];   ?>">
                            </div>
                            <div class="modal-footer text-right">
                                <!-- <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1"></button> -->
                                <button type="submit" class="btn btn-primary w-20" onclick="return confirm('Apakah Anda Yakin?');">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<?= $this->endSection();;   ?>