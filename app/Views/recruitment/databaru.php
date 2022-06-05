<?= $this->extend('layout/template');   ?>
<?= $this->section('content');   ?>
<div class="container">
    <div class="col">
        <div class="row">
            <div class="mb-6">
                <select id="searching1" data-search="true" class="tom-select w-full" onchange="data1()">
                    <option value="">Nama Karyawan</option>
                    <?php foreach ($status as $k) : ?>
                        <option data-stat="<?= $k['id_status'];   ?>" data-jab="<?= $k['id_jabatan'];   ?>" value="<?= $k['id_daftar'];   ?>"><?= $k['nama'];   ?></option>
                    <?php endforeach;    ?>
                </select>
            </div>
            <form action="/save/databaru" method="POST" enctype="multipart/form-data">
                <!-- foreach -->
                <input type="text" id="id_jab" name="id_jabatan" hidden>
                <input type="text" id="id_stat" name="id_status" hidden>
                <!-- <div class="flex-1 mt-6 xl:mt-0">
                    <div class="flex-1">
                        <div class="w-1/2 grid grid-cols-2 gap-2 "> -->

                <div class="flex flex-col-reverse xl:flex-row">
                    <div class="flex-1 mt-6 xl:mt-0">
                        <div class="grid grid-cols-12 gap-x-5">
                            <div class="sm:flex col-span-12 2xl:col-span-6 mt-3">
                                <label class="whitespace-nowrap w-3/12 items-center" for="id_daf">ID daftar</label>
                                <input class="form-control" type="text" id="id_daf" name="id_daftar">
                            </div>
                            <div class="sm:flex col-span-12 2xl:col-span-6 mt-3">
                                <label class="whitespace-nowrap w-3/12" for="id2">ID Karyawan</label>
                                <input class="form-control" type="text" id="id_kar" name="id_karyawan">
                            </div>
                            <div class="t col-span-4 text-red-500 text-xs italic whitespace-nowrap">
                                <?= $validation->getError('id_karyawan');   ?></div>
                            <div class="sm:flex col-span-12 2xl:col-span-6 mt-3">
                                <label class="whitespace-nowrap w-3/12" for="bpjs">Nomor BPJS</label>
                                <input class="form-control" type="text" id="bpjs" name="nmr_bpjs">
                            </div>
                            <div class="sm:flex col-span-12 2xl:col-span-6 mt-3">
                                <label class="whitespace-nowrap w-3/12" for="jamsostek">Nomor Jamsostek</label>
                                <input class="form-control" type="text" id="jamsostek" name="nmr_jamsostek">
                            </div>
                            <div class="sm:flex col-span-12 2xl:col-span-6 mt-3">
                                <label class="whitespace-nowrap w-3/12" for="email">Email</label>
                                <input class="form-control" type="email" id="email" name="email">
                            </div>
                            <div class="sm:flex col-span-12 2xl:col-span-6 mt-3">
                                <label class="whitespace-nowrap w-3/12" for="nmr_hp">Nomor Hp</label>
                                <input class="form-control" type="text" id="nmr_hp" name="nmr_hp">
                            </div>
                            <div class="sm:flex col-span-12 2xl:col-span-6 mt-3">
                                <label class="whitespace-nowrap w-3/12" for="nmr_telp">Nomor Telepon</label>
                                <input class="form-control" type="text" id="nmr_telp" name="nmr_telp">
                            </div>
                            <div class="sm:flex col-span-12 2xl:col-span-6 mt-3">
                                <label class="whitespace-nowrap w-3/12" for="tgl">Tanggal Diterima</label>
                                <input class="form-control" type="date" id="tgl" name="tgl">
                            </div>
                            <div class="sm:flex col-span-12 2xl:col-span-6 mt-3">
                                <label class="whitespace-nowrap w-3/12" for="Fasilitas">Fasilitas</label>
                                <textarea class="form-control" name="fasilitas" id="fasilitas" cols="30" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="w-52 mx-auto xl:mr-0 xl:ml-6">
                        <div class="border-2 border-dashed shadow-sm border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                            <div class="h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                                <img class="rounded-md img-preview" src="/foto/default.jpg">
                                <!-- <div title="Remove this profile photo?" class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2"> <i data-lucide="x" class="w-4 h-4"></i> </div> -->
                            </div>

                            <div class="mx-auto cursor-pointer relative mt-5">
                                <button type="button" class="btn btn-primary w-full">Change Photo</button>
                                <input type="file" id="foto" onchange="preview()" name="foto" accept=".jpg,.jpeg" class="w-full h-full top-0 left-0 absolute opacity-0">

                            </div>
                        </div>
                    </div>
                </div>
                <button onclick="return confirm('apakah anda yakin?'); " type="submit" class="btn-success justify-center btn ">Simpan</button>
            </form>
        </div>
    </div>
</div>



<?= $this->endSection();;   ?>