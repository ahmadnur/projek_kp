<?= $this->extend('layout/template');   ?>
<?= $this->section('content');   ?>
<div class="container">
    <?php if (session()->getFlashdata('pesan')) :  ?>
        <div class="alert alert-primary alert-dismissible show flex items-center mb-2" role="alert">
            <?= session()->getFlashData('pesan') ?>
            <button type="button" class="btn-close" data-tw-dismiss="alert" aria-label="Close"> <i data-lucide="x" class="w-4 h-4"></i> </button>
        </div>
    <?php endif;    ?>
    <div class="row">
        <div class="">
            <a href="/login/daftar" class="mt-3"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10" />
                    <path d="M12 8l-4 4 4 4M16 12H9" />
                </svg></a>
        </div>
        <div class="col-8 sm:p-4 sm:m-3">
            <form method="POST" action="/save/edit_daftar/<?php echo $id;    ?> " enctype="multipart/form-data">
                <div class="flex flex-col-reverse xl:flex-row">
                    <div class="flex-1 mt-6 xl:mt-0">
                        <div class="grid-cols-12">
                            <div id="pertama">
                                <div class="overflow-x-scroll h-96">
                                    <table class="table " class="">
                                        <tr>
                                            <td>
                                                <label for="posisi" class="whitespace-nowrap"> <span class="text-red-600">*</span>Posisi yang Dilamar</label>
                                            </td>
                                            <td>
                                                <input type="text" id="id_lamar" name="id_daftar" value="<?= $id;   ?>" hidden>
                                                <select name="posisi" id="posisi2" class="form-control ">
                                                    <option value=""></option>
                                                    <?php $cek = 0;
                                                    foreach ($jabatan as $k) :
                                                        if ($ambil == $k['id_lowongan']) {
                                                            $cek = 1;   ?>
                                                            <option data-jabatan2=" <?= $k['id_jabatan'];   ?>" value="<?= $k['id_lowongan'];   ?>" selected><?= $k['jabatan'];   ?></option>
                                                        <?php
                                                        } else {  ?>
                                                            <option data-jabatan2=" <?= $k['id_jabatan'];   ?>" value="<?= $k['id_lowongan'];   ?>"><?= $k['jabatan'];   ?></option>
                                                            <?php }
                                                    endforeach;
                                                    if ($cek == 0) {
                                                        foreach ($lowongan as $l) :
                                                            if ($l['id_lowongan'] == $ambil) { ?>
                                                                <option data-jabatan2=" <?= $l['id_jabatan'];   ?>" value="<?= $l['id_lowongan'];   ?>" selected><?= $l['jabatan'];   ?></option>
                                                    <?php  }
                                                        endforeach;
                                                    } ?>
                                                </select>
                                                <input type="text" id="posisilamar2" name="posisi2" value="<?= $datadiri[0]['id_jabatan'];   ?>" hidden>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label class="form-control" for="ktp"><span class="text-red-600">*</span>Nomor KTP</label></td>
                                            <td><input class="form-control" type="text" id="ktp" name="no_ktp" value="<?= $datadiri[0]['no_ktp'];   ?>"></td>
                                        </tr>
                                        <tr>
                                            <td><label class="form-control" for="nama"><span class="text-red-600">*</span>Nama</label></td>
                                            <td><input class="form-control" type="text" id="nama" name="nama_daftar" value="<?= $datadiri[0]['nama'];   ?>"></td>
                                        </tr>
                                        <tr>
                                            <td><label class="form-control" for="ttl"><span class="text-red-600">*</span>Tempat Tanggal Lahir</label></td>
                                            <td><input class="form-control" type="text" id="ttl" name="tempat_lahir" value="<?= $datadiri[0]['tempat_lahir'];   ?>"></td>
                                            <td><input class="form-control" type="date" id="ttl" name="tanggal_lahir" value="<?= $datadiri[0]['tanggal_lahir'];   ?>"></td>
                                        </tr>
                                        <tr>
                                            <td><label class="form-control" for="alamat">Alamat Domisili</label></td>
                                            <td><input class="form-control" type="text" id="alamat" name="domisili" value="<?= $datadiri[0]['alamat'];   ?>"></td>
                                        </tr>
                                        <tr>
                                            <td><label class="form-control" for="nohp">Nomor Hp</label></td>
                                            <td><input class="form-control" type="text" id="nohp" name="no_hp" value="<?= $datadiri[0]['no_hp'];   ?>"></td>
                                        </tr>
                                        <tr>
                                            <td><label class="form-control" for="notelp">Nomor Telepon</label></td>
                                            <td><input class="form-control" type="text" id="notelp" name="no_telp" value="<?= $datadiri[0]['telp'];   ?>"></td>
                                        </tr>
                                        <tr>
                                            <td><label for="jekel">Jenis Kelamin</label></td>
                                            <td>
                                                <select class="form-control" name="jekel_d" id="jekel">
                                                    <?php if ($datadiri[0]['jekel'] == 'laki-laki') {   ?>
                                                        <option selected value="laki-laki">laki-laki</option>
                                                        <option value="perempuan">perempuan</option>
                                                    <?php } else if ($datadiri[0]['jekel'] == 'perempuan') {   ?>
                                                        <option value="laki-laki">laki-laki</option>
                                                        <option selected value="perempuan">perempuan</option>
                                                    <?php }    ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label class="form-control" for="agama">Agama</label></td>
                                            <td><input class="form-control" type="text" id="agama" name="agama" value="<?= $datadiri[0]['agama'];   ?>"></td>
                                        </tr>
                                        <tr>
                                            <td><label class="form-control" for="kewarganegaraan">Kewarganegaraan</label></td>
                                            <td><input class="form-control" type="text" id="kewarganegaraan" name="kewarganegaraan" value="<?= $datadiri[0]['kewarganegaraan'];   ?>"></td>
                                        </tr>
                                        <tr>
                                            <td><label class="form-control" for="suku">Suku Bangsa</label></td>
                                            <td><input class="form-control" type="text" id="suku" name="suku_bangsa" value="<?= $datadiri[0]['suku_bangsa'];   ?>"></td>
                                        </tr>
                                        <tr>
                                            <td><label class="form-control" for="anaknmr">Anak Nomor</label></td>
                                            <td><input class="form-control" type="text" id="anaknmr" name="anak_nomor" value="<?= $datadiri[0]['anak_nomor'];   ?>"></td>
                                        </tr>
                                        <tr>
                                            <td><label class="form-control" for="status">Status</label></td>
                                            <td><select class="form-control" name="status_m" id="status">
                                                    <?php if ($datadiri[0]['status_menikah'] == 'Sudah Menikah') {    ?>
                                                        <option selected value="Sudah Menikah">Sudah Menikah</option>
                                                        <option value="Belum Menikah">Belum Menikah</option>
                                                    <?php } else if ($datadiri[0]['status_menikah'] == 'Belum Menikah') {    ?>
                                                        <option value="Sudah Menikah">Sudah Menikah</option>
                                                        <option selected value="Belum Menikah">Belum Menikah</option>
                                                    <?php }    ?>
                                                </select></td>
                                        </tr>
                                        <tr>
                                            <td><label class="form-control" for="tahun">Tahun Menikah</label></td>
                                            <td><input class="form-control" type="text" id="tahun" name="tahun_menikah" value="<?= $datadiri[0]['tahun_menikah'];   ?>"></td>
                                        </tr>
                                        <tr>
                                            <td><label class="form-control" for="berat">Berat Badan</label></td>
                                            <td><input class="form-control" type="text" id="berat" name="berat_badan" value="<?= $datadiri[0]['berat_badan'];   ?>"></td>
                                            <td>KG</td>
                                        </tr>
                                        <tr>
                                            <td><label class="form-control" for="tinggi">Tinggi Badan</label></td>
                                            <td><input class="form-control" type="text" id="tinggi" name="tinggi_badan" value="<?= $datadiri[0]['tinggi_badan'];   ?>"></td>
                                            <td>cm</td>
                                        </tr>
                                        <tr>
                                            <td><label class="form-control" for="gaji">Gaji yang diharapkan</label></td>
                                            <td><input class="form-control" type="text" id="gaji" name="gaji_diharapkan" value="<?= $datadiri[0]['gaji_diharapkan'];   ?>"></td>
                                        </tr>
                                        <tr>
                                            <td><label class="form-control" for="transportasi">Alat Transportasi yang dimiliki</label></td>
                                            <td><input class="form-control" type="text" id="transportasi" name="transportasi" value="<?= $datadiri[0]['transportasi'];   ?>"></td>
                                        </tr>
                                        <tr>
                                            <td><label for="minat">Minat anda pada jenis Pekerjaan</label></td>
                                            <td>
                                                <select class="form-control" name="minat_k" id="minat">
                                                    <option value="<?= $datadiri[0]['minat'];   ?>"><?= $datadiri[0]['minat'];   ?></option>
                                                    <option value="Manajerial">Manajerial</option>
                                                    <option value="Akuntan">Akuntan</option>
                                                    <option value="IT/EDP">IT/EDP</option>
                                                    <option value="Pembelian">Pembelian</option>
                                                    <option value="Audit">Audit</option>
                                                    <option value="Piutang/Kasir">Piutang/Kasir</option>
                                                    <option value="QC/QA">QC/QA</option>
                                                    <option value="R&D">R&D</option>
                                                    <option value="Mekanik/Utility">Mekanik/Utility</option>
                                                    <option value="Administrasi">Administrasi</option>
                                                    <option value="Humas/PR">Humas/PR</option>
                                                    <option value="HRD/Personalia">HRD/Personalia</option>
                                                    <option value="Marketing">Marketing</option>
                                                    <option value="Produksi">Produksi</option>
                                                    <option value="Desain Grafis">Desain Grafis</option>
                                                    <option value="Pengawas Proyek">Pengawas Proyek</option>
                                                    <option value="Arsitek/Desain Interior">Arsitek/Desain Interior</option>
                                                    <option value="Pendidikan">Pendidikan</option>
                                                    <option value="Gudang">Gudang</option>
                                                    <option value="0">Lainnya</option>
                                                </select>
                                            </td>
                                            <td><input class="form-control" type="text" id="minat" name="minat_l" placeholder="ketik apabila memilih lainnya" value="<?= $datadiri[0]['minat_l'];   ?>"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">Dalam keadaan darurat,keluarga dekat yang dapat dihubungi</td>
                                        </tr>
                                        <tr>
                                            <td><label class="form-control" for="namahub">Nama</label></td>
                                            <td><input class="form-control" type="text" id="namahub" name="nama_kerabat" value="<?= $datadiri[0]['nama_kerabat'];   ?>"></td>
                                        </tr>
                                        <tr>
                                            <td><label class="form-control" for="telphub">Telp</label></td>
                                            <td><input class="form-control" type="text" id="telphub" name="telp_kerabat" value="<?= $datadiri[0]['telp_kerabat'];   ?>"></td>
                                        </tr>
                                        <tr>
                                            <td><label class="form-control" for="hubkerabat">Hubungan</label></td>
                                            <td><input class="form-control" type="text" id="hubkerabat" name="hubungan_kerabat" value="<?= $datadiri[0]['hubungan_kerabat'];   ?>"></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="mt-3">
                                    <a class="btn btn-primary" id="next1"> Next</a>
                                </div>
                            </div>
                            <div id="kedua" hidden>
                                <div class="overflow-x-scroll h-96 items-center">
                                    <label class="text-xl text-ellipsis mt-3 ">Data Keluarga</label>
                                    <table class=" table-bordered" id="tbUser">
                                        <tr style="text-align: center;">
                                            <td>status</td>
                                            <td>Nama</td>
                                            <td>L/P</td>
                                            <td>Usia</td>
                                            <td>Pendidikan</td>
                                            <td>Pekerjaan</td>
                                            <td>M/BM</td>
                                        </tr>
                                        <tbody id="1">
                                            <?php if ($keluarga == $id) {   ?>
                                                <tr>
                                                    <td><select class="form-control" name="status_k[]" id="status">
                                                            <option value="Ayah">Ayah</option>
                                                            <option value="Ibu">Ibu</option>
                                                            <option value="Saudara">Saudara</option>
                                                            <option value="Suami/istri">Suami/istri</option>
                                                            <option value="Anak">Anak</option>
                                                        </select></td>
                                                    <td><input class="form-control " type="text" id="nama" name="nama_k[]"></td>
                                                    <td><select class="form-control" name="jekel_k[]" id="jekel">
                                                            <option value="laki-laki">laki-laki</option>
                                                            <option value="perempuan">perempuan</option>
                                                        </select></td>
                                                    <td><input class="form-control" type="text" id="usia" name="usia_k[]"></td>
                                                    <td><input class="form-control" type="text" id="pendidikan" name="pendidikan_k[]"></td>
                                                    <td><input class="form-control" type="text" id="pekerjaan" name="pekerjaan_k[]"></td>
                                                    <td><select class="form-control" name="m_bm[]" id="m_bm">
                                                            <option value="Belum Menikah">Belum Menikah</option>
                                                            <option value="Sudah Menikah">Sudah Menikah</option>
                                                        </select></td>
                                                    <!-- <td style="border: none;"><a href="#" class="btn-red ml-6" onClick="$(this).closest('tr').remove();">Delete</a></td> -->
                                                    <td style="border: none;"><a href="#" onclick="tambah();" class="btn-greeen ml-1 ">ADD</a></td>
                                                </tr>
                                            <?php } else if (is_array($keluarga)) {   ?>
                                                <?php foreach ($keluarga as $k) :  ?>
                                                    <tr>
                                                        <td><select class="form-control" name="status_k[] w-32" id="status">
                                                                <option value="<?= $k['status_k'];   ?>"><?= $k['status_k'];   ?></option>
                                                                <option value="Ayah">Ayah</option>
                                                                <option value="Ibu">Ibu</option>
                                                                <option value="Saudara">Saudara</option>
                                                                <option value="Suami/istri">Suami/istri</option>
                                                                <option value="Anak">Anak</option>
                                                            </select></td>
                                                        <td><input class="form-control" type="text" id="nama" name="nama_k[]" value="<?= $k['nama_k'];   ?>">
                                                            <input type="text" id="id_keluarga" name="id_keluarga[]" value="<?= $k['id_keluarga'];   ?>" hidden>
                                                        </td>
                                                        <td><select class="form-control" name="jekel_k[]" id="jekel">
                                                                <?php if ($k['jekel_k'] == 'laki-laki') {  ?>
                                                                    <option selected value="laki-laki">laki-laki</option>
                                                                    <option value="perempuan">perempuan</option>
                                                                <?php } else if ($k['jekel_k'] == 'perempuan') {  ?>
                                                                    <option value="laki-laki">laki-laki</option>
                                                                    <option selected value="perempuan">perempuan</option>
                                                                <?php }    ?>
                                                            </select></td>
                                                        <td><input class="form-control" type="text" id="usia" name="usia_k[]" value="<?= $k['usia'];   ?>"></td>
                                                        <td><input class="form-control" type="text" id="pendidikan" name="pendidikan_k[]" value="<?= $k['pendidikan'];   ?>"></td>
                                                        <td><input class="form-control" type="text" id="pekerjaan" name="pekerjaan_k[]" value="<?= $k['pekerjaan'];   ?>"></td>
                                                        <td><select class="form-control" name="m_bm[]" id="m_bm">
                                                                <?php if ($k['m_bm'] == 'Belum Menikah') {    ?>
                                                                    <option selected value="Belum Menikah">Belum Menikah</option>
                                                                    <option value="Sudah Menikah">Sudah Menikah</option>
                                                                <?php }
                                                                if ($k['m_bm'] == 'Sudah Menikah') {    ?>
                                                                    <option value="Belum Menikah">Belum Menikah</option>
                                                                    <option selected value="Sudah Menikah">Sudah Menikah</option>
                                                                <?php }    ?>
                                                            </select></td>
                                                        <!-- <td style="border: none;"><a href="#" class="btn-red ml-6" onClick="$(this).closest('tr').remove();">Delete</a></td> -->
                                                        <td style="border: none;"><a href="#" onclick="tambah();" class="btn-greeen ml-1 ">ADD</a></td>
                                                    </tr>
                                            <?php endforeach;
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="mt-3">
                                    <a class="btn btn-primary" id="previous2"> Previous</a>
                                    <a class="btn btn-primary" id="next2"> Next</a>
                                </div>
                            </div>
                            <div id="ketiga" hidden>
                                <div class="overflow-x-scroll h-96">
                                    <label class="text-xl text-ellipsis mt-3 ">Riwayat Pendidikan</label>
                                    <table class=" table-bordered">
                                        <tr style="text-align: center;">
                                            <td>Jenjang</td>
                                            <td>Sekolah</td>
                                            <td>Jurusan</td>
                                            <td>IPK</td>
                                            <td>Masuk</td>
                                            <td>Keluar</td>
                                        </tr>
                                        <tbody id="2">
                                            <?php if (($pendidikan) == $id) {    ?>
                                                <tr>
                                                    <td><select class="form-control" name="status_p[]" id="">
                                                            <option value="SD">SD</option>
                                                            <option value="SMP">SMP</option>
                                                            <option value="SLTA">SLTA</option>
                                                            <option value="Akademik">Akademik</option>
                                                            <option value="Sarjana">Sarjana</option>
                                                            <option value="Pasca Sarjana">Pasca Sarjana</option>
                                                        </select></td>
                                                    <td><input class="form-control" type="text" id="" name="nama_p[]"></td>
                                                    <td><input class="form-control" type="text" id="" name="jurusan_p[]"></td>
                                                    <td><input class="form-control" type="text" id="" name="IPK_p[]"></td>
                                                    <td><input class="form-control" type="text" id="" name="masuk_p[]"></td>
                                                    <td><input class="form-control" type="text" id="" name="keluar_p[]"></td>
                                                    <!-- <td style="border :none;"><a href="#" class="btn-red ml-6" onClick="$(this).closest('tr').remove();">Delete</a></td> -->
                                                </tr>
                                                <?php } else if (is_array($pendidikan)) {
                                                foreach ($pendidikan as $p) :    ?>
                                                    <tr>
                                                        <td><select class="form-control" name="status_p[]" id="">
                                                                <option selected value="<?= $p['status_p'];   ?>"><?= $p['status_p'];   ?></option>
                                                                <option value="SD">SD</option>
                                                                <option value="SMP">SMP</option>
                                                                <option value="SLTA">SLTA</option>
                                                                <option value="Akademik">Akademik</option>
                                                                <option value="Sarjana">Sarjana</option>
                                                                <option value="Pasca Sarjana">Pasca Sarjana</option>
                                                            </select></td>
                                                        <td><input class="form-control" type="text" id="" name="nama_p[]" value="<?= $p['nama_p'];   ?>"></td>
                                                        <td><input class="form-control" type="text" id="" name="jurusan_p[]" value="<?= $p['jurusan_p'];   ?>"></td>
                                                        <td><input class="form-control" type="text" id="" name="IPK_p[]" value="<?= $p['ipk'];   ?>"></td>
                                                        <td><input class="form-control" type="text" id="" name="masuk_p[]" value="<?= $p['masuk'];   ?>"></td>
                                                        <td><input class="form-control" type="text" id="" name="keluar_p[]" value="<?= $p['lulus'];   ?>">
                                                            <input type="text" id="" name="id_pendidikan[]" value="<?= $p['id_pendidikan'];   ?>" hidden>
                                                        </td>
                                                        <!-- <td style="border :none;"><a href="#" class="btn-red ml-6" onClick="$(this).closest('tr').remove();">Delete</a></td> -->
                                                        <td style="border: none;"><a href="#" onclick="tambah2();" class="btn-greeen ml-1 ">ADD</a></td>
                                                    </tr>
                                            <?php endforeach;
                                            }     ?>
                                        </tbody>
                                    </table>

                                    <label class="text-xl text-ellipsis mt-3 ">Riwayat Kursus </label>
                                    <table class="table-bordered">
                                        <tr style="text-align: center;">
                                            <td>Jenis Kursus</td>
                                            <td>Tahun</td>
                                            <td>Lama Kursus</td>
                                            <td>Keterangan</td>
                                            <td>Dibiayai Oleh</td>
                                        </tr>
                                        <tbody id="3">
                                            <?php if ($kursus == $id) {    ?>
                                                <tr>
                                                    <td><input class="form-control" type="text" id="" name="jenis_ku[]"></td>
                                                    <td><input class="form-control" type="text" id="" name="tahun_ku[]"> </td>
                                                    <td><input class="form-control" type="text" id="" name="durasi_ku[]"></td>
                                                    <td><select class="form-control" name="keterangan_ku[]" id="">
                                                            <option value="Berijazah">Berijazah</option>
                                                            <option value="Tidak Berijazah">Tidak Berijazah</option>
                                                        </select></td>
                                                    <td><input class="form-control" type="text" id="" name="dibiayai_ku[]"></td>
                                                    <!-- <td style="border :none;"><a href="#" class="btn-red ml-6" onclick="$(this).closest('tr').remove();">Delete</a></td> -->
                                                    <td style="border: none;"><a href="#" onclick="tambah3();" class="btn-greeen ml-1 ">ADD</a></td>
                                                </tr>
                                                <?php } else if (is_array($kursus)) {
                                                foreach ($kursus as $k) :    ?>
                                                    <tr>
                                                        <td><input class="form-control" type="text" id="" name="jenis_ku[]" value="<?= $k['nama_ku'];   ?>">
                                                            <input type="text" id="id_kursus" name="id_kursus[]" value="<?= $k['id_kursus'];   ?>" hidden>
                                                        </td>
                                                        <td><input class="form-control" type="text" id="" name="tahun_ku[]" value="<?= $k['tahun_ku'];   ?>"> </td>
                                                        <td><input class="form-control" type="text" id="" name="durasi_ku[]" value="<?= $k['durasi'];   ?>"></td>
                                                        <td><select class="form-control" name="keterangan_ku[]" id="">
                                                                <?php if ($k['berijazah'] == 'Berijazah') {    ?>
                                                                    <option selected value="Berijazah">Berijazah</option>
                                                                    <option value="Tidak Berijazah">Tidak Berijazah</option>
                                                                <?php } else if ($k['berijazah'] == 'Tidak Berijazah') {    ?>
                                                                    <option value="Berijazah">Berijazah</option>
                                                                    <option selected value="Tidak Berijazah">Tidak Berijazah</option>
                                                                <?php }    ?>
                                                            </select></td>
                                                        <td><input class="form-control" type="text" id="" name="dibiayai_ku[]" value="<?= $k['dibiayai'];   ?>"></td>
                                                        <!-- <td style="border :none;"><a href="#" class="btn-red ml-6" onclick="$(this).closest('tr').remove();">Delete</a></td> -->
                                                        <td style="border: none;"><a href="#" onclick="tambah3();" class="btn-greeen ml-1 ">ADD</a></td>
                                                    </tr>
                                            <?php endforeach;
                                            }    ?>
                                        </tbody>
                                    </table>
                                    <label class="text-xl text-ellipsis mt-3 ">Bahasa yang Dikuasai</label>
                                    <table class=" table-bordered mt-2">
                                        <?php $i = 0;    ?>
                                        <tr>
                                            <td><label class="text-center" for="bahasa">bahasa </label></td>
                                            <td><label for="aktifpasif">Aktif/Pasif</label></td>
                                        </tr>
                                        <tbody id="4">
                                            <?php if ($bahasa == $id) {    ?>
                                                <tr>
                                                    <td><select class="form-control" name="bahasa[]" id="bahasa">
                                                            <option value="Indonesia">Indonesia</option>
                                                            <option value="Inggris">Inggris</option>
                                                            <option value="Jepang">Jepang</option>
                                                            <option value="Cina">Cina</option>
                                                            <option value="Jerman">Jerman</option>
                                                            <option value="Jawa">Jawa</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select class="form-control" name="aktif_pasif[]" id="aktif">
                                                            <option value="1">aktif</option>
                                                            <option value="0">pasif</option>
                                                        </select>
                                                    </td>
                                                    <!-- <td style="border :none;"><a href="#" class="btn-red ml-6" onclick="$(this).closest('tr').remove();">Delete</a></td> -->
                                                    <td style="border: none;"><a href="#" onclick="tambah4();" class="btn-greeen ml-1 ">ADD</a></td>
                                                </tr>
                                                <?php } else if (is_array($bahasa)) {
                                                foreach ($bahasa as $b) :    ?>
                                                    <tr>
                                                        <td><select class="form-control" name="bahasa[]" id="bahasa">
                                                                <option selected value="<?= $b['nama_b'];   ?>"><?= $b['nama_b'];   ?></option>
                                                                <option value="Indonesia">Indonesia</option>
                                                                <option value="Inggris">Inggris</option>
                                                                <option value="Jepang">Jepang</option>
                                                                <option value="Cina">Cina</option>
                                                                <option value="Jerman">Jerman</option>
                                                                <option value="Jawa">Jawa</option>
                                                            </select>
                                                            <input type="text" id="id_bahasa" name="id_bahasa[]" value="<?= $b['id_bahasa'];   ?>" hidden>
                                                        </td>
                                                        <td>
                                                            <select class="form-control" name="aktif_pasif[]" id="aktif">
                                                                <?php if ($b['status_b'] == 1) {   ?>
                                                                    <option selected value="1">aktif</option>
                                                                    <option value="0">pasif</option>
                                                                <?php } else if ($b['status_b'] == 0) {  ?>
                                                                    <option value="1">aktif</option>
                                                                    <option selected value="0">pasif</option>
                                                                <?php }    ?>
                                                            </select>
                                                        </td>
                                                        <!-- <td style="border :none;"><a href="#" class="btn-red ml-6" onclick="$(this).closest('tr').remove();">Delete</a></td> -->
                                                        <td style="border: none;"><a href="#" onclick="tambah4();" class="btn-greeen ml-1 ">ADD</a></td>
                                                    </tr>
                                            <?php endforeach;
                                            }    ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="mt-3">
                                    <a class="btn btn-primary" id="previous3"> Previous</a>
                                    <a class="btn btn-primary" id="next3"> Next</a>
                                </div>
                            </div>
                            <div id="keempat" hidden>
                                <div class="overflow-x-scroll h-96">
                                    <label class="text-xl text-ellipsis mt-3 ">Pengalaman Kerja</label>
                                    <table class=" table-bordered">
                                        <tr class="text-center">
                                            <td>Tahun Masuk</td>
                                            <td>Tahun Keluar</td>
                                            <td>Nama Perusahaan</td>
                                            <td>Jabatan</td>
                                            <td>Gaji & Tunjangan</td>
                                            <td>Alasan Berhenti</td>
                                        </tr>
                                        <tbody id="5">
                                            <?php if ($pengalaman == $id) {   ?>
                                                <tr>
                                                    <td><input class="form-control" type="text" id="" name="tahun_masuk[]"></td>
                                                    <td><input class="form-control" type="text" id="" name="tahun_keluar[]"></td>
                                                    <td><input class="form-control" type="text" id="" name="nama_perusahaan[]"></td>
                                                    <td><input class="form-control" type="text" id="" name="jabatan_p[]"></td>
                                                    <td><input class="form-control" type="text" id="" name="gaji_tunjangan[]"></td>
                                                    <td><input class="form-control" type="text" id="" name="alasan_p[]"></td>
                                                    <!-- <td style="border :none;"><a href="#" class="btn-red ml-6" onclick="$(this).closest('tr').remove();">Delete</a></td> -->
                                                    <td style="border: none;"><a href="#" onclick="tambah5();" class="btn-greeen ml-1 ">ADD</a></td>
                                                </tr>
                                                <?php } else if (is_array($pengalaman)) {
                                                foreach ($pengalaman as $p) :    ?>
                                                    <tr>
                                                        <td><input type="text" id="id_pengalaman" name="id_pengalaman[]" value="<?= $p['id_pengalaman'];   ?>" hidden>
                                                            <input class="form-control" type="text" id="" name="tahun_masuk[]" value="<?= $p['tahun_masuk'];   ?>">
                                                        </td>
                                                        <td><input class="form-control" type="text" id="" name="tahun_keluar[]" value="<?= $p['tahun_keluar'];   ?>"></td>
                                                        <td><input class="form-control" type="text" id="" name="nama_perusahaan[]" value="<?= $p['nama_perusahaan'];   ?>"></td>
                                                        <td><input class="form-control" type="text" id="" name="jabatan_p[]" value="<?= $p['jabatan_p'];   ?>"></td>
                                                        <td><input class="form-control" type="text" id="" name="gaji_tunjangan[]" value="<?= $p['gaji_tunjangan'];   ?>"></td>
                                                        <td><input class="form-control" type="text" id="" name="alasan_p[]" value="<?= $p['alasan_p'];   ?>"></td>
                                                        <!-- <td style="border :none;"><a href="#" class="btn-red ml-6" onclick="$(this).closest('tr').remove();">Delete</a></td> -->
                                                        <td style="border: none;"><a href="#" onclick="tambah5();" class="btn-greeen ml-1 ">ADD</a></td>
                                                    </tr>
                                            <?php endforeach;
                                            }    ?>
                                        </tbody>
                                    </table>
                                    <label for="" class="text-xl text-ellipsis mt-3">Apakah anda memiliki family / kenalan di duniatex group</label>
                                    <table class=" table-bordered">
                                        <tr class="text-center">
                                            <td>Nama</td>
                                            <td>Alamat </td>
                                            <td>Nomor telepon</td>
                                            <td>jabatan</td>
                                            <td>Hubungan dengan anda</td>
                                            <td class="hidden ">Status</td>
                                        </tr>
                                        <tbody id="6">
                                            <?php if ($kenalan == $id) {   ?>
                                                <tr>
                                                    <td><input class="form-control" type="text" id="" name="nama_ken[]"></td>
                                                    <td><input class="form-control" type="text" id="" name="alamat_ken[]"></td>
                                                    <td><input class="form-control" type="text" id="" name="nmr_telp_ken[]"></td>
                                                    <td><input class="form-control" type="text" id="" name="jabatan_ken[]"></td>
                                                    <td><input class="form-control" type="text" id="" name="hubungan_ken[]"></td>
                                                    <td class="hidden"><input class="form-control" type="text" id="" name="status_ken[]" value="kenalan">
                                                        <!-- <td style="border :none;"><a href="#" class="btn-red ml-6" onclick="$(this).closest('tr').remove();">Delete</a></td> -->
                                                    <td style="border: none;"><a href="#" onclick="tambah6();" class="btn-greeen ml-1 ">ADD</a></td>
                                                </tr>
                                                <?php  } else if (is_array($kenalan)) {
                                                foreach ($kenalan as $k) :
                                                    if ($k['status_kenalan'] == 'kenalan') {    ?>
                                                        <tr>
                                                            <td><input class="form-control" type="text" id="" name="nama_ken[]" value="<?= $k['nama_kenalan'];   ?>">
                                                                <input type="text" id="id_kenalan" name="id_kenalan[]" value="<?= $k['id_kenalan'];   ?>" hidden>
                                                            </td>
                                                            <td><input class="form-control" type="text" id="" name="alamat_ken[]" value="<?= $k['alamat_kenalan'];   ?>"></td>
                                                            <td><input class="form-control" type="text" id="" name="nmr_telp_ken[]" value="<?= $k['telp_kenalan'];   ?>"></td>
                                                            <td><input class="form-control" type="text" id="" name="jabatan_ken[]" value="<?= $k['jabatan_kenalan'];   ?>"></td>
                                                            <td><input class="form-control" type="text" id="" name="hubungan_ken[]" value="<?= $k['hubungan_kenalan'];   ?>"></td>
                                                            <td class="hidden"><input class="form-control" type="text" id="" name="status_ken[]" value="kenalan">
                                                                <!-- <td style="border :none;"><a href="#" class="btn-red ml-6" onclick="$(this).closest('tr').remove();">Delete</a></td> -->
                                                            <td style="border: none;"><a href="#" onclick="tambah6();" class="btn-greeen ml-1 ">ADD</a></td>
                                                        </tr>
                                            <?php }
                                                endforeach;
                                            }    ?>
                                        </tbody>
                                    </table>
                                    <label for="" class="text-xl text-ellipsis mt-3">referensi diri anda dapat diperoleh dari</label>
                                    <table class=" table-bordered">
                                        <tr class="text-center">
                                            <td>Nama</td>
                                            <td>Alamat </td>
                                            <td>Nomor telepon</td>
                                            <td>jabatan</td>
                                            <td>Hubungan dengan anda</td>
                                            <td class="hidden ">Status</td>
                                        </tr>
                                        <tbody id="7">
                                            <?php if ($kenalan == $id) {    ?>
                                                <tr>
                                                    <td><input class="form-control" type="text" id="" name="nama_ken[]"></td>
                                                    <td><input class="form-control" type="text" id="" name="alamat_ken[]"></td>
                                                    <td><input class="form-control" type="text" id="" name="nmr_telp_ken[]"></td>
                                                    <td><input class="form-control" type="text" id="" name="jabatan_ken[]"></td>
                                                    <td><input class="form-control" type="text" id="" name="hubungan_ken[]"></td>
                                                    <td class="hidden"><input class="form-control" type="text" id="" name="status_ken[]" value="referensi">
                                                        <!-- <td style="border :none;"><a href="#" class="btn-red ml-6" onclick="$(this).closest('tr').remove();">Delete</a></td> -->
                                                    <td style="border: none;"><a href="#" onclick="tambah7();" class="btn-greeen ml-1 ">ADD</a></td>
                                                </tr>
                                                <?php } else if (is_array($kenalan)) {
                                                foreach ($kenalan as $k) :
                                                    if ($k['status_kenalan'] == 'referensi') {    ?>
                                                        <tr>
                                                            <td><input class="form-control" type="text" id="" name="nama_ken[]" value="<?= $k['nama_kenalan'];   ?>">
                                                                <input type="text" id="id_kenalan" name="id_kenalan[]" value="<?= $k['id_kenalan'];   ?>" hidden>
                                                            </td>
                                                            <td><input class="form-control" type="text" id="" name="alamat_ken[]" value="<?= $k['alamat_kenalan'];   ?>"></td>
                                                            <td><input class="form-control" type="text" id="" name="nmr_telp_ken[]" value="<?= $k['telp_kenalan'];   ?>"></td>
                                                            <td><input class="form-control" type="text" id="" name="jabatan_ken[]" value="<?= $k['jabatan_kenalan'];   ?>"></td>
                                                            <td><input class="form-control" type="text" id="" name="hubungan_ken[]" value="<?= $k['hubungan_kenalan'];   ?>"></td>
                                                            <td class="hidden"><input class="form-control" type="text" id="" name="status_ken[]" value="referensi">
                                                                <!-- <td style="border :none;"><a href="#" class="btn-red ml-6" onclick="$(this).closest('tr').remove();">Delete</a></td> -->
                                                            <td style="border: none;"><a href="#" onclick="tambah7();" class="btn-greeen ml-1 ">ADD</a></td>
                                                        </tr>
                                            <?php }
                                                endforeach;
                                            }    ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="mt-3">
                                    <a class="btn btn-primary" id="previous4"> Previous</a>
                                    <a class="btn btn-primary" id="next4"> Next</a>
                                </div>
                            </div>
                            <div id="kelima" hidden>
                                <div class="overflow-x-scroll h-96">
                                    <label for="" class="text-xl text-ellipsis mt-3">Organisasi Yang Diikuti</label>
                                    <label for="">*) Organisasi Politik - Sosial - Olahraga - Kesenian - Kerohanian yang diikuti</label>
                                    <table class=" table-bordered">
                                        <tr class="text-center">
                                            <td class=" text-center">Nama Organisasi</td>
                                            <td class=" text-center">Jenis</td>
                                            <td class=" text-center">Tahun</td>
                                            <td class=" text-center">Jabatan</td>
                                            <td class=" text-center">Masih Aktif / Tidak</td>
                                            <td class=" text-center">Pengalaman Pemimpin</td>
                                        </tr>
                                        <tbody id="8">
                                            <?php if ($kegiatan == $id) {     ?>
                                                <tr>
                                                    <td><input class="form-control" type="text" id="" name="nama_o[]"></td>
                                                    <td><input class="form-control" type="text" id="" name="jenis_o[]"></td>
                                                    <td><input class="form-control" type="text" id="" name="tahun_o[]"></td>
                                                    <td><input class="form-control" type="text" id="" name="jabatan_o[]"></td>
                                                    <td><select class="form-control" name="aktif_o[]" id="">
                                                            <option value="aktif">aktif</option>
                                                            <option value="tidak aktif">tidak aktif</option>
                                                        </select></td>
                                                    <td><textarea class="form-control" name="pengalaman_o[]" id="" cols="20" rows="2"></textarea></td>
                                                    <!-- <td style="border :none;"><a href="#" class="btn-red ml-6" onclick="$(this).closest('tr').remove();">Delete</a></td> -->
                                                    <td style="border: none;"><a href="#" onclick="tambah8();" class="btn-greeen ml-1 ">ADD</a></td>
                                                </tr>
                                                <?php } else if (is_array($kegiatan)) {
                                                foreach ($kegiatan as $k) :    ?>
                                                    <tr>
                                                        <td> <input type="text" id="id_kegiatan" name="id_kegiatan[]" value="<?= $k['id_kegiatan'];   ?>" hidden>
                                                            <input class="form-control" type="text" id="" name="nama_o[]" value="<?= $k['nama_organisasi'];   ?>">
                                                        </td>
                                                        <td><input class="form-control" type="text" id="" name="jenis_o[]" value="<?= $k['jenis_o'];   ?>"></td>
                                                        <td><input class="form-control" type="text" id="" name="tahun_o[]" value="<?= $k['tahun_o'];   ?>"></td>
                                                        <td><input class="form-control" type="text" id="" name="jabatan_o[]" value="<?= $k['jabatan_o'];   ?>"></td>
                                                        <td><select class="form-control" name="aktif_o[]" id="">
                                                                <?php if ($k['aktif'] == 'aktif') {    ?>
                                                                    <option selected value="aktif">aktif</option>
                                                                    <option value="tidak aktif">tidak aktif</option>
                                                                <?php } else if ($k['aktif'] == 'tidak aktif') {    ?>
                                                                    <option value="aktif">aktif</option>
                                                                    <option selected value="tidak aktif">tidak aktif</option>
                                                                <?php }    ?>
                                                            </select></td>
                                                        <td><textarea class="form-control" name="pengalaman_o[]" id="" cols="20" rows="2"><?= $k['pengalaman_o'];   ?></textarea></td>
                                                        <!-- <td style="border :none;"><a href="#" class="btn-red ml-6" onclick="$(this).closest('tr').remove();">Delete</a></td> -->
                                                        <td style="border: none;"><a href="#" onclick="tambah8();" class="btn-greeen ml-1 ">ADD</a></td>
                                                    </tr>
                                            <?php endforeach;
                                            }    ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="mt-3">
                                    <a class="btn btn-primary" id="previous5"> Previous</a>
                                    <a class="btn btn-primary" id="next5"> Next</a>
                                </div>
                            </div>
                            <div id="keenam" hidden>
                                <div class="overflow-x-scroll h-96">
                                    <?php if (is_array($keterangan)) {
                                        foreach ($keterangan as $k) :    ?>
                                            <input type="text" id="id_keterangan" name="id_keterangan" value="<?= $k['id_keterangan'];   ?>" hidden>
                                            <label for="">Bila anda diterima di duniatek group bersediakan anda segera masuk kerja</label>
                                            <div class="flex flex-col sm:flex-row mt-2">
                                                <?php if ($k['jawaban1'] == 1) {    ?>
                                                    <div class="form-check mr-2">
                                                        <input id="ya1" type="radio" checked name="jawaban1" value="1">
                                                        <label class="form-check-label" for="ya1">Ya</label>
                                                    </div>
                                                    <div class="form-check mr-2 mt-2 sm:mt-0">
                                                        <input id="tidak1" type="radio" name="jawaban1" value="0">
                                                        <label class="form-check-label" for="tidak1">Tidak</label>
                                                    </div>
                                                <?php } else if ($k['jawaban1'] == 0) {   ?>
                                                    <div class="form-check mr-2">
                                                        <input id="ya1" type="radio" name="jawaban1" value="1">
                                                        <label class="form-check-label" for="ya1">Ya</label>
                                                    </div>
                                                    <div class="form-check mr-2 mt-2 sm:mt-0">
                                                        <input id="tidak1" type="radio" checked name="jawaban1" value="0">
                                                        <label class="form-check-label" for="tidak1">Tidak</label>
                                                    </div>
                                                <?php }    ?>
                                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                                    <input class="form-control" id="input1" class="form-check-input  " type="text" name="jawaban1_1" value="<?= $k['jawaban1_1'];   ?>">
                                                </div>
                                            </div>
                                            <label for="">Saya bersedia ditempatkan di semua cabang duniatek group</label>
                                            <div class="flex flex-col sm:flex-row mt-2">
                                                <?php if ($k['jawaban2'] == 1) { ?>
                                                    <div class="form-check mr-2">
                                                        <input id="ya2" type="radio" checked name="jawaban2" value="1">
                                                        <label class="form-check-label" for="ya2">Ya</label>
                                                    </div>
                                                    <div class="form-check mr-2 mt-2 sm:mt-0">
                                                        <input id="tidak2" type="radio" name="jawaban2" value="0">
                                                        <label class="form-check-label" for="tidak2">Tidak</label>
                                                    </div>
                                                <?php } else if ($k['jawaban2'] == 0) {    ?>
                                                    <div class="form-check mr-2">
                                                        <input id="ya2" type="radio" name="jawaban2" value="1">
                                                        <label class="form-check-label" for="ya2">Ya</label>
                                                    </div>
                                                    <div class="form-check mr-2 mt-2 sm:mt-0">
                                                        <input id="tidak2" type="radio" checked name="jawaban2" value="0">
                                                        <label class="form-check-label" for="tidak2">Tidak</label>
                                                    </div>
                                                <?php }    ?>
                                                <div>
                                                    <input class="form-control" type="text" id="input2" name="jawaban2_1" value="<?= $k['jawaban2_1'];   ?>">
                                                </div>
                                            </div>
                                            <label for="">Apakah Anda Merokok?</label>
                                            <div class="flex flex-col sm:flex-row mt-2">
                                                <?php if ($k['jawaban3'] == 1) {    ?>
                                                    <div class="form-check mr-2">
                                                        <input id="" type="radio" checked name="jawaban3" value="1">
                                                        <label class="form-check-label" for="">Ya</label>
                                                    </div>
                                                    <div class="form-check mr-2 mt-2 sm:mt-0">
                                                        <input id="" type="radio" name="jawaban3" value="0">
                                                        <label class="form-check-label" for="">Tidak</label>
                                                    </div>
                                                <?php } else if ($k['jawaban3'] == 0) {    ?>
                                                    <div class="form-check mr-2">
                                                        <input id="" type="radio" name="jawaban3" value="1">
                                                        <label class="form-check-label" for="">Ya</label>
                                                    </div>
                                                    <div class="form-check mr-2 mt-2 sm:mt-0">
                                                        <input id="" type="radio" checked name="jawaban3" value="0">
                                                        <label class="form-check-label" for="">Tidak</label>
                                                    </div>
                                                <?php }    ?>
                                            </div>
                                            <label for="">Apakah anda memiliki gangguan penglihatan?</label>
                                            <div class="flex flex-col sm:flex-row mt-2">
                                                <?php if ($k['jawaban4'] == 1) {   ?>
                                                    <div class="form-check mr-2">
                                                        <input id="ya3" type="radio" checked name="jawaban4" value="1">
                                                        <label class="form-check-label" for="ya3">Ya</label>
                                                    </div>
                                                    <div class="form-check mr-2 mt-2 sm:mt-0">
                                                        <input id="tidak3" type="radio" name="jawaban4" value="0">
                                                        <label class="form-check-label" for="tidak3">Tidak</label>
                                                    </div>
                                                <?php } else if ($k['jawaban4'] == 0) {    ?>
                                                    <div class="form-check mr-2">
                                                        <input id="ya3" type="radio" name="jawaban4" value="1">
                                                        <label class="form-check-label" for="ya3">Ya</label>
                                                    </div>
                                                    <div class="form-check mr-2 mt-2 sm:mt-0">
                                                        <input id="tidak3" type="radio" checked name="jawaban4" value="0">
                                                        <label class="form-check-label" for="tidak3">Tidak</label>
                                                    </div>
                                                <?php }    ?>
                                                <div>
                                                    <input class="form-control" type="text" id="input3" name="jawaban4_1" placeholder="minus/plus/silinder" value="<?= $k['jawaban4_1'];   ?>">
                                                </div>
                                            </div>
                                            <label for="">Pernahkah anda menderita sakit berat sampai dirawat di rumah sakit/menderita sakit yang lama sembuh?</label>
                                            <div class="flex flex-col sm:flex-row mt-2">
                                                <?php if ($k['jawaban5'] == 1) {    ?>
                                                    <div class="form-check mr-2">
                                                        <input id="ya4" type="radio" checked name="jawaban5" value="1">
                                                        <label class="form-check-label" for="ya4">Ya</label>
                                                    </div>
                                                    <div class="form-check mr-2 mt-2 sm:mt-0">
                                                        <input id="tidak4" type="radio" name="jawaban5" value="0">
                                                        <label class="form-check-label" for="tidak4">Tidak</label>
                                                    </div>
                                                <?php } else if ($k['jawaban5'] == 0) {    ?>
                                                    <div class="form-check mr-2">
                                                        <input id="ya4" type="radio" name="jawaban5" value="1">
                                                        <label class="form-check-label" for="ya4">Ya</label>
                                                    </div>
                                                    <div class="form-check mr-2 mt-2 sm:mt-0">
                                                        <input id="tidak4" type="radio" checked name="jawaban5" value="0">
                                                        <label class="form-check-label" for="tidak4">Tidak</label>
                                                    </div>
                                                <?php }    ?>
                                                <div>
                                                    <input class="form-control" type="text" id="input4" name="jawaban5_1" placeholder="tahun,jenis,berapa lama" value="<?= $k['jawaban5_1'];   ?>">
                                                </div>
                                            </div>
                                            <label class="form=control" for="">Pernahkah anda mengalami kecelakaan lalu lintas / yang lain?</label>
                                            <div class="flex flex-col sm:flex-row mt-2">
                                                <?php if ($k['jawaban6'] == 1) {    ?>
                                                    <div class="form-check mr-2">
                                                        <input id="ya5" type="radio" checked name="jawaban6" value="1">
                                                        <label class="form-check-label" for="ya5">Ya</label>
                                                    </div>
                                                    <div class="form-check mr-2 mt-2 sm:mt-0">
                                                        <input id="tidak5" type="radio" name="jawaban6" value="0">
                                                        <label class="form-check-label" for="tidak5">Tidak</label>
                                                    </div>
                                                <?php } else if ($k['jawaban6'] == 0) {    ?>
                                                    <div class="form-check mr-2">
                                                        <input id="ya5" type="radio" name="jawaban6" value="1">
                                                        <label class="form-check-label" for="ya5">Ya</label>
                                                    </div>
                                                    <div class="form-check mr-2 mt-2 sm:mt-0">
                                                        <input id="tidak5" type="radio" checked name="jawaban6" value="0">
                                                        <label class="form-check-label" for="tidak5">Tidak</label>
                                                    </div>
                                                <?php }    ?>
                                                <div>
                                                    <input class="form-control" type="text" id="input5" name="jawaban6_1" placeholder="tahun,kecelakaan apa, akibat kecelakaan" value="<?= $k['jawaban6_1'];   ?>">
                                                </div>
                                            </div>
                                            <label for="">pernahkah anda mengalami psikotest?</label>
                                            <div class="flex flex-col sm:flex-row mt-2">
                                                <?php if ($k['jawaban7'] == 1) {  ?>
                                                    <div class="form-check mr-2">
                                                        <input id="ya6" type="radio" checked name="jawaban7" value="1">
                                                        <label class="form-check-label" for="ya6">Ya</label>
                                                    </div>
                                                    <div class="form-check mr-2 mt-2 sm:mt-0">
                                                        <input id="tidak6" type="radio" name="jawaban7" value="0">
                                                        <label class="form-check-label" for="tidak6">Tidak</label>
                                                    </div>
                                                <?php } else if ($k['jawaban7'] == 0) { ?>
                                                    <div class="form-check mr-2">
                                                        <input id="ya6" type="radio" name="jawaban7" value="1">
                                                        <label class="form-check-label" for="ya6">Ya</label>
                                                    </div>
                                                    <div class="form-check mr-2 mt-2 sm:mt-0">
                                                        <input id="tidak6" type="radio" checked name="jawaban7" value="0">
                                                        <label class="form-check-label" for="tidak6">Tidak</label>
                                                    </div>
                                                <?php }    ?>
                                                <div>
                                                    <input class="form-control" type="text" id="input6" name="jawaban7_1" placeholder="tahun,dimana, keperluan" value="<?= $k['jawaban7_1'];   ?>">
                                                </div>
                                            </div>
                                            <label for="">pernahkah anda mendapatkan perawatan psikologi</label>
                                            <div class="flex flex-col sm:flex-row mt-2">
                                                <?php if ($k['jawaban8'] == 1) {    ?>
                                                    <div class="form-check mr-2">
                                                        <input id="" type="radio" checked name="jawaban8" value="1">
                                                        <label class="form-check-label" for="">Ya</label>
                                                    </div>
                                                    <div class="form-check mr-2 mt-2 sm:mt-0">
                                                        <input id="" type="radio" name="jawaban8" value="0">
                                                        <label class="form-check-label" for="">Tidak</label>
                                                    </div>
                                                <?php } else if ($k['jawaban8'] == 0) {   ?>
                                                    <div class="form-check mr-2">
                                                        <input id="" type="radio" name="jawaban8" value="1">
                                                        <label class="form-check-label" for="">Ya</label>
                                                    </div>
                                                    <div class="form-check mr-2 mt-2 sm:mt-0">
                                                        <input id="" type="radio" checked name="jawaban8" value="0">
                                                        <label class="form-check-label" for="">Tidak</label>
                                                    </div>
                                                <?php }    ?>
                                            </div>
                                            <label for="">pernahkah anda mengikuti pelatihan militer?menwa?</label>
                                            <div class="flex flex-col sm:flex-row mt-2">
                                                <?php if ($k['jawaban9'] == 1) {    ?>
                                                    <div class="form-check mr-2">
                                                        <input id="" type="radio" checked name="jawaban9" value="1">
                                                        <label class="form-check-label" for="">Ya</label>
                                                    </div>
                                                    <div class="form-check mr-2 mt-2 sm:mt-0">
                                                        <input id="" type="radio" name="jawaban9" value="0">
                                                        <label class="form-check-label" for="">Tidak</label>
                                                    </div>
                                                <?php } else if ($k['jawaban9'] == 0) {    ?>
                                                    <div class="form-check mr-2">
                                                        <input id="" type="radio" name="jawaban9" value="1">
                                                        <label class="form-check-label" for="">Ya</label>
                                                    </div>
                                                    <div class="form-check mr-2 mt-2 sm:mt-0">
                                                        <input id="" type="radio" checked name="jawaban9" value="0">
                                                        <label class="form-check-label" for="">Tidak</label>
                                                    </div>
                                                <?php }    ?>
                                            </div>
                                            <label for="">pernahkah anda memanipulasi data</label>
                                            <div class="flex flex-col sm:flex-row mt-2">
                                                <?php if ($k['jawaban10'] == 1) { ?>
                                                    <div class="form-check mr-2">
                                                        <input id="" type="radio" checked name="jawaban10" value="1">
                                                        <label class="form-check-label" for="">Ya</label>
                                                    </div>
                                                    <div class="form-check mr-2 mt-2 sm:mt-0">
                                                        <input id="" type="radio" name="jawaban10" value="0">
                                                        <label class="form-check-label" for="">Tidak</label>
                                                    </div>
                                                <?php } else if ($k['jawaban10'] == 0) {    ?>
                                                    <div class="form-check mr-2">
                                                        <input id="" type="radio" name="jawaban10" value="1">
                                                        <label class="form-check-label" for="">Ya</label>
                                                    </div>
                                                    <div class="form-check mr-2 mt-2 sm:mt-0">
                                                        <input id="" type="radio" checked name="jawaban10" value="0">
                                                        <label class="form-check-label" for="">Tidak</label>
                                                    </div>
                                                <?php }    ?>
                                            </div>
                                            <label for="">pernahkah anda menggunakan uang perusahaan/ pelanggan?</label>
                                            <div class="flex flex-col sm:flex-row mt-2">
                                                <?php if ($k['jawaban11'] == 1) {    ?>
                                                    <div class="form-check mr-2">
                                                        <input id="" type="radio" checked name="jawaban11" value="1">
                                                        <label class="form-check-label" for="">Ya</label>
                                                    </div>
                                                    <div class="form-check mr-2 mt-2 sm:mt-0">
                                                        <input id="" type="radio" name="jawaban11" value="0">
                                                        <label class="form-check-label" for="">Tidak</label>
                                                    </div>
                                                <?php } else if ($k['jawaban11'] == 0) {    ?>
                                                    <div class="form-check mr-2">
                                                        <input id="" type="radio" name="jawaban11" value="1">
                                                        <label class="form-check-label" for="">Ya</label>
                                                    </div>
                                                    <div class="form-check mr-2 mt-2 sm:mt-0">
                                                        <input id="" type="radio" checked name="jawaban11" value="0">
                                                        <label class="form-check-label" for="">Tidak</label>
                                                    </div>
                                                <?php }    ?>
                                            </div>
                                            <label for="">pernahkah anda berurusan dengan polisi</label>
                                            <div class="flex flex-col sm:flex-row mt-2">
                                                <?php if ($k['jawaban12'] == 1) {    ?>
                                                    <div class="form-check mr-2">
                                                        <input id="ya7" type="radio" checked name="jawaban12" value="1">
                                                        <label class="form-check-label" for="ya7">Ya</label>
                                                    </div>
                                                    <div class="form-check mr-2 mt-2 sm:mt-0">
                                                        <input id="tidak7" type="radio" name="jawaban12" value="0">
                                                        <label class="form-check-label" for="tidak7">Tidak</label>
                                                    </div>
                                                <?php } else if ($k['jawaban12'] == 0) {    ?>
                                                    <div class="form-check mr-2">
                                                        <input id="ya7" type="radio" name="jawaban12" value="1">
                                                        <label class="form-check-label" for="ya7">Ya</label>
                                                    </div>
                                                    <div class="form-check mr-2 mt-2 sm:mt-0">
                                                        <input id="tidak7" type="radio" checked name="jawaban12" value="0">
                                                        <label class="form-check-label" for="tidak7">Tidak</label>
                                                    </div>
                                                <?php }    ?>
                                                <div>
                                                    <input class="form-control" type="text" id="input7" name="jawaban12_1" placeholder="Rincian" value="<?= $k['jawaban12_1'];   ?>">
                                                </div>
                                            </div>
                                            <label for="">pernahkah anda terlibat dengan obat-obat terlarang?</label>
                                            <div class="flex flex-col sm:flex-row mt-2">
                                                <?php if ($k['jawaban13'] == 1) {    ?>
                                                    <div class="form-check mr-2">
                                                        <input id="ya8" type="radio" checked name="jawaban13" value="1">
                                                        <label class="form-check-label" for="ya8">Ya</label>
                                                    </div>
                                                    <div class="form-check mr-2 mt-2 sm:mt-0">
                                                        <input id="tidak8" type="radio" name="jawaban13" value="0">
                                                        <label class="form-check-label" for="tidak8">Tidak</label>
                                                    </div>
                                                <?php } else if ($k['jawaban13'] == 0) {    ?>
                                                    <div class="form-check mr-2">
                                                        <input id="ya8" type="radio" name="jawaban13" value="1">
                                                        <label class="form-check-label" for="ya8">Ya</label>
                                                    </div>
                                                    <div class="form-check mr-2 mt-2 sm:mt-0">
                                                        <input id="tidak8" type="radio" checked name="jawaban13" value="0">
                                                        <label class="form-check-label" for="tidak8">Tidak</label>
                                                    </div>
                                                <?php }    ?>
                                                <div>
                                                    <input class="form-control" type="text" id="input8" name="jawaban13_1" placeholder="Rincian" value="<?= $k['jawaban13_1'];   ?>">
                                                </div>
                                            </div>
                                            <label for="">apakah anda senang membaca?</label>
                                            <div class="flex flex-col sm:flex-row mt-2">
                                                <?php if ($k['jawaban14'] == 1) {    ?>
                                                    <div class="form-check mr-2">
                                                        <input id="ya9" type="radio" checked name="jawaban14" value="1">
                                                        <label class="form-check-label" for="ya9">Ya</label>
                                                    </div>
                                                    <div class="form-check mr-2 mt-2 sm:mt-0">
                                                        <input id="tidak9" type="radio" name="jawaban14" value="0">
                                                        <label class="form-check-label" for="tidak9">Tidak</label>
                                                    </div>
                                                <?php } else if ($k['jawaban14'] == 0) {    ?>
                                                    <div class="form-check mr-2">
                                                        <input id="ya9" type="radio" name="jawaban14" value="1">
                                                        <label class="form-check-label" for="ya9">Ya</label>
                                                    </div>
                                                    <div class="form-check mr-2 mt-2 sm:mt-0">
                                                        <input id="tidak9" type="radio" checked name="jawaban14" value="0">
                                                        <label class="form-check-label" for="tidak9">Tidak</label>
                                                    </div>
                                                <?php }    ?>
                                                <div>
                                                    <input class="form-control" type="text" id="input9" name="jawaban14_1" placeholder="bacaan yang anda senangi" value="<?= $k['jawaban14_1'];   ?>">
                                                </div>
                                            </div>
                                            <label for="">urutkan prinsip anda dalam bekerja</label>
                                            <div class="grid grid-cols-8 gap-5">
                                                <div>
                                                    <label for="keahlian">keahlian</label>
                                                </div>
                                                <div>
                                                    <input type="text" id="keahlian" class="w-16 form-control" name="jawaban15_1" value="<?= $k['jawaban15_1'];   ?>">
                                                </div>
                                                <div>
                                                    <label for="kejujuran">kejujuran</label>
                                                </div>
                                                <div>
                                                    <input type="text" id="kejujuran" class="w-16 form-control" name="jawaban15_2" value="<?= $k['jawaban15_2'];   ?>">
                                                </div>
                                                <div>
                                                    <label for="religiusitas">religiusitas</label>
                                                </div>
                                                <div>
                                                    <input type="text" id="religiusitas" class="w-16 form-control" name="jawaban15_3" value="<?= $k['jawaban15_3'];   ?>">
                                                </div>
                                                <div>
                                                    <label for="kedisiplinan">kedisiplinan</label>
                                                </div>
                                                <div>
                                                    <input type="text" id="kedisiplinan" class="w-16 form-control" name="jawaban15_4" value="<?= $k['jawaban15_4'];   ?>">
                                                </div>
                                                <div>
                                                    <label for="tanggung-jawab">tanggung-jawab</label>
                                                </div>
                                                <div>
                                                    <input type="text" id="tanggung-jawab" class="w-16 form-control" name="jawaban15_5" value="<?= $k['jawaban15_5'];   ?>">
                                                </div>
                                                <div>
                                                    <label for="sopan-santun">sopan-santun</label>
                                                </div>
                                                <div>
                                                    <input type="text" id="sopan-santun" class="w-16 form-control" name="jawaban15_6" value="<?= $k['jawaban15_6'];   ?>">
                                                </div>
                                                <div>
                                                    <label for="komunikasi">komunikasi</label>
                                                </div>
                                                <div>
                                                    <input type="text" id="komunikasi" class="w-16 form-control" name="jawaban15_7" value="<?= $k['jawaban15_7'];   ?>">
                                                </div>
                                                <div>
                                                    <label for="kerjasama">kerjasama</label>
                                                </div>
                                                <div>
                                                    <input type="text" id="kerjasama" class="w-16 form-control" name="jawaban15_8" value="<?= $k['jawaban15_8'];   ?>">
                                                </div>
                                            </div>
                                    <?php endforeach;
                                    }   ?>
                                    <?php if ($keterangan == $id) {    ?>
                                        <label for="">Bila anda diterima di duniatek group bersediakan anda segera masuk kerja</label>
                                        <div class="flex flex-col sm:flex-row mt-2">
                                            <div class="form-check mr-2">
                                                <input id="ya1" type="radio" name="jawaban1" value="1">
                                                <label class="form-check-label" for="ya1">Ya</label>
                                            </div>
                                            <div class="form-check mr-2 mt-2 sm:mt-0">
                                                <input id="tidak1" type="radio" checked name="jawaban1" value="0">
                                                <label class="form-check-label" for="tidak1">Tidak</label>
                                            </div>
                                            <div class="form-check mr-2 mt-2 sm:mt-0">
                                                <input class="form-control" id="input1" class="form-check-input  " type="text" name="jawaban1_1">
                                            </div>
                                        </div>
                                        <label for="">Saya bersedia ditempatkan di semua cabang duniatek group</label>
                                        <div class="flex flex-col sm:flex-row mt-2">
                                            <div class="form-check mr-2">
                                                <input id="ya2" type="radio" name="jawaban2" value="1">
                                                <label class="form-check-label" for="ya2">Ya</label>
                                            </div>
                                            <div class="form-check mr-2 mt-2 sm:mt-0">
                                                <input id="tidak2" type="radio" checked name="jawaban2" value="0">
                                                <label class="form-check-label" for="tidak2">Tidak</label>
                                            </div>
                                            <div>
                                                <input class="form-control" type="text" id="input2" name="jawaban2_1">
                                            </div>
                                        </div>
                                        <label for="">Apakah Anda Merokok?</label>
                                        <div class="flex flex-col sm:flex-row mt-2">
                                            <div class="form-check mr-2">
                                                <input id="" type="radio" checked name="jawaban3" value="1">
                                                <label class="form-check-label" for="">Ya</label>
                                            </div>
                                            <div class="form-check mr-2 mt-2 sm:mt-0">
                                                <input id="" type="radio" name="jawaban3" value="0">
                                                <label class="form-check-label" for="">Tidak</label>
                                            </div>
                                        </div>
                                        <label for="">Apakah anda memiliki gangguan penglihatan?</label>
                                        <div class="flex flex-col sm:flex-row mt-2">
                                            <div class="form-check mr-2">
                                                <input id="ya3" type="radio" checked name="jawaban4" value="1">
                                                <label class="form-check-label" for="ya3">Ya</label>
                                            </div>
                                            <div class="form-check mr-2 mt-2 sm:mt-0">
                                                <input id="tidak3" type="radio" name="jawaban4" value="0">
                                                <label class="form-check-label" for="tidak3">Tidak</label>
                                            </div>
                                            <div>
                                                <input class="form-control" type="text" id="input3" name="jawaban4_1" placeholder="minus/plus/silinder">
                                            </div>
                                        </div>
                                        <label for="">Pernahkah anda menderita sakit berat sampai dirawat di rumah sakit/menderita sakit yang lama sembuh?</label>
                                        <div class="flex flex-col sm:flex-row mt-2">
                                            <div class="form-check mr-2">
                                                <input id="ya4" type="radio" checked name="jawaban5" value="1">
                                                <label class="form-check-label" for="ya4">Ya</label>
                                            </div>
                                            <div class="form-check mr-2 mt-2 sm:mt-0">
                                                <input id="tidak4" type="radio" name="jawaban5" value="0">
                                                <label class="form-check-label" for="tidak4">Tidak</label>
                                            </div>
                                            <div>
                                                <input class="form-control" type="text" id="input4" name="jawaban5_1" placeholder="tahun,jenis,berapa lama">
                                            </div>
                                        </div>
                                        <label class="form=control" for="">Pernahkah anda mengalami kecelakaan lalu lintas / yang lain?</label>
                                        <div class="flex flex-col sm:flex-row mt-2">
                                            <div class="form-check mr-2">
                                                <input id="ya5" type="radio" checked name="jawaban6" value="1">
                                                <label class="form-check-label" for="ya5">Ya</label>
                                            </div>
                                            <div class="form-check mr-2 mt-2 sm:mt-0">
                                                <input id="tidak5" type="radio" name="jawaban6" value="0">
                                                <label class="form-check-label" for="tidak5">Tidak</label>
                                            </div>
                                            <div>
                                                <input class="form-control" type="text" id="input5" name="jawaban6_1" placeholder="tahun,kecelakaan apa, akibat kecelakaan">
                                            </div>
                                        </div>
                                        <label for="">pernahkah anda mengalami psikotest?</label>
                                        <div class="flex flex-col sm:flex-row mt-2">
                                            <div class="form-check mr-2">
                                                <input id="ya6" type="radio" checked name="jawaban7" value="1">
                                                <label class="form-check-label" for="ya6">Ya</label>
                                            </div>
                                            <div class="form-check mr-2 mt-2 sm:mt-0">
                                                <input id="tidak6" type="radio" name="jawaban7" value="0">
                                                <label class="form-check-label" for="tidak6">Tidak</label>
                                            </div>
                                            <div>
                                                <input class="form-control" type="text" id="input6" name="jawaban7_1" placeholder="tahun,dimana, keperluan">
                                            </div>
                                        </div>
                                        <label for="">pernahkah anda mendapatkan perawatan psikologi</label>
                                        <div class="flex flex-col sm:flex-row mt-2">
                                            <div class="form-check mr-2">
                                                <input id="" type="radio" checked name="jawaban8" value="1">
                                                <label class="form-check-label" for="">Ya</label>
                                            </div>
                                            <div class="form-check mr-2 mt-2 sm:mt-0">
                                                <input id="" type="radio" name="jawaban8" value="0">
                                                <label class="form-check-label" for="">Tidak</label>
                                            </div>
                                        </div>
                                        <label for="">pernahkah anda mengikuti pelatihan militer?menwa?</label>
                                        <div class="flex flex-col sm:flex-row mt-2">
                                            <div class="form-check mr-2">
                                                <input id="" type="radio" checked name="jawaban9" value="1">
                                                <label class="form-check-label" for="">Ya</label>
                                            </div>
                                            <div class="form-check mr-2 mt-2 sm:mt-0">
                                                <input id="" type="radio" name="jawaban9" value="0">
                                                <label class="form-check-label" for="">Tidak</label>
                                            </div>
                                        </div>
                                        <label for="">pernahkah anda memanipulasi data</label>
                                        <div class="flex flex-col sm:flex-row mt-2">
                                            <div class="form-check mr-2">
                                                <input id="" type="radio" name="jawaban10" value="1">
                                                <label class="form-check-label" for="">Ya</label>
                                            </div>
                                            <div class="form-check mr-2 mt-2 sm:mt-0">
                                                <input id="" type="radio" checked name="jawaban10" value="0">
                                                <label class="form-check-label" for="">Tidak</label>
                                            </div>
                                        </div>
                                        <label for="">pernahkah anda menggunakan uang perusahaan/ pelanggan?</label>
                                        <div class="flex flex-col sm:flex-row mt-2">
                                            <div class="form-check mr-2">
                                                <input id="" type="radio" name="jawaban11" value="1">
                                                <label class="form-check-label" for="">Ya</label>
                                            </div>
                                            <div class="form-check mr-2 mt-2 sm:mt-0">
                                                <input id="" type="radio" checked name="jawaban11" value="0">
                                                <label class="form-check-label" for="">Tidak</label>
                                            </div>
                                        </div>
                                        <label for="">pernahkah anda berurusan dengan polisi</label>
                                        <div class="flex flex-col sm:flex-row mt-2">
                                            <div class="form-check mr-2">
                                                <input id="ya7" type="radio" checked name="jawaban12" value="1">
                                                <label class="form-check-label" for="ya7">Ya</label>
                                            </div>
                                            <div class="form-check mr-2 mt-2 sm:mt-0">
                                                <input id="tidak7" type="radio" name="jawaban12" value="0">
                                                <label class="form-check-label" for="tidak7">Tidak</label>
                                            </div>
                                            <div>
                                                <input class="form-control" type="text" id="input7" name="jawaban12_1" placeholder="Rincian">
                                            </div>
                                        </div>
                                        <label for="">pernahkah anda terlibat dengan obat-obat terlarang?</label>
                                        <div class="flex flex-col sm:flex-row mt-2">
                                            <div class="form-check mr-2">
                                                <input id="ya8" type="radio" checked name="jawaban13" value="1">
                                                <label class="form-check-label" for="ya8">Ya</label>
                                            </div>
                                            <div class="form-check mr-2 mt-2 sm:mt-0">
                                                <input id="tidak8" type="radio" name="jawaban13" value="0">
                                                <label class="form-check-label" for="tidak8">Tidak</label>
                                            </div>
                                            <div>
                                                <input class="form-control" type="text" id="input8" name="jawaban13_1" placeholder="Rincian">
                                            </div>
                                        </div>
                                        <label for="">apakah anda senang membaca?</label>
                                        <div class="flex flex-col sm:flex-row mt-2">
                                            <div class="form-check mr-2">
                                                <input id="ya9" type="radio" checked name="jawaban14" value="1">
                                                <label class="form-check-label" for="ya9">Ya</label>
                                            </div>
                                            <div class="form-check mr-2 mt-2 sm:mt-0">
                                                <input id="tidak9" type="radio" name="jawaban14" value="0">
                                                <label class="form-check-label" for="tidak9">Tidak</label>
                                            </div>
                                            <div>
                                                <input class="form-control" type="text" id="input9" name="jawaban14_1" placeholder="bacaan yang anda senangi">
                                            </div>
                                        </div>
                                        <label for="">urutkan prinsip anda dalam bekerja</label>
                                        <div class="grid grid-cols-8 gap-5">
                                            <div>
                                                <label for="keahlian">keahlian</label>
                                            </div>
                                            <div>
                                                <input type="text" id="keahlian" class="w-16 form-control" name="jawaban15_1">
                                            </div>
                                            <div>
                                                <label for="kejujuran">kejujuran</label>
                                            </div>
                                            <div>
                                                <input type="text" id="kejujuran" class="w-16 form-control" name="jawaban15_2">
                                            </div>
                                            <div>
                                                <label for="religiusitas">religiusitas</label>
                                            </div>
                                            <div>
                                                <input type="text" id="religiusitas" class="w-16 form-control" name="jawaban15_3">
                                            </div>
                                            <div>
                                                <label for="kedisiplinan">kedisiplinan</label>
                                            </div>
                                            <div>
                                                <input type="text" id="kedisiplinan" class="w-16 form-control" name="jawaban15_4">
                                            </div>
                                            <div>
                                                <label for="tanggung-jawab">tanggung-jawab</label>
                                            </div>
                                            <div>
                                                <input type="text" id="tanggung-jawab" class="w-16 form-control" name="jawaban15_5">
                                            </div>
                                            <div>
                                                <label for="sopan-santun">sopan-santun</label>
                                            </div>
                                            <div>
                                                <input type="text" id="sopan-santun" class="w-16 form-control" name="jawaban15_6">
                                            </div>
                                            <div>
                                                <label for="komunikasi">komunikasi</label>
                                            </div>
                                            <div>
                                                <input type="text" id="komunikasi" class="w-16 form-control" name="jawaban15_7">
                                            </div>
                                            <div>
                                                <label for="kerjasama">kerjasama</label>
                                            </div>
                                            <div>
                                                <input type="text" id="kerjasama" class="w-16 form-control" name="jawaban15_8">
                                            </div>
                                        </div>
                                    <?php }    ?>
                                </div>
                                <div class="mt-3">
                                    <a class="btn btn-primary" id="previous6"> Previous</a>
                                    <a class="btn btn-primary" id="next6"> Next</a>
                                </div>
                            </div>
                            <div id="ketujuh" hidden>
                                <div class="overflow-x-scroll h-96">
                                    <!-- <label for="" class="text-xl text-ellipsis mt-3" ></label> -->
                                    <div class="grid grid-cols-2 gap-2 ">
                                        <?php if (is_array($interview)) {
                                            foreach ($interview as $i) :    ?>
                                                <div class="align-middle">
                                                    <label for="1">1. Apa kekurangan yang anda miliki</label>
                                                    <input type="text" id="id_interview" name="id_interview" value="<?= $i['id_interview'];   ?>" hidden>
                                                </div>
                                                <div>
                                                    <textarea name="jawaban1i" id="1" cols="30" rows="3" placeholder="Jawaban"><?= $i['jawaban1i'];   ?></textarea>
                                                </div>
                                                <div>
                                                    <label for="2">2. Apa kelebihan yang anda miliki</label>
                                                </div>
                                                <div>
                                                    <textarea name="jawaban2i" id="2" cols="30" rows="2" placeholder="Jawaban"><?= $i['jawaban2i'];   ?></textarea>
                                                </div>
                                                <div>
                                                    <label for="3">3.Apa target dan rencana anda dalam 5 tahun Kedepan</label>
                                                </div>
                                                <div>
                                                    <textarea name="jawaban3i" id="3" cols="30" rows="2" placeholder="Jawaban"><?= $i['jawaban3i'];   ?></textarea>
                                                </div>
                                                <div>
                                                    <label for="4">4. Pekerjaan yang lebih disukai(Outdoor/indoor)</label>
                                                </div>
                                                <div>
                                                    <textarea name="jawaban4i" id="4" cols="30" rows="2" placeholder="Jawaban"><?= $i['jawaban4i'];   ?></textarea>
                                                </div>
                                                <div>
                                                    <label for="5">5. Ceritakan kesuksesan yang pernah anda capai</label>
                                                </div>
                                                <div>
                                                    <textarea name="jawaban5i" id="5" cols="30" rows="2" placeholder="Jawaban"><?= $i['jawaban5i'];   ?></textarea>
                                                </div>
                                                <div>
                                                    <label for="6">6. Urutkan Prioritas anda dalam hidup</label>
                                                </div>
                                                <div>
                                                    <textarea name="jawaban6i" id="6" cols="30" rows="2" placeholder="Jawaban"><?= $i['jawaban6i'];   ?></textarea>
                                                </div>
                                                <div>
                                                    <label for="7">7. Jika saya bekerja, saya menginginkan hal ini(urutkan sesuai minat anda)</label>
                                                </div>
                                                <div class="flex">
                                                    <label for="gaji">Gaji Tinggi</label>
                                                    <input type="text" id="gaji" name="jawaban7_1i" class="w-12 form-control" value="<?= $i['jawaban7_1i'];   ?>">
                                                    <label for="jenjang">Jenjang Akhir</label>
                                                    <input type="text" id="jenjang" name="jawaban7_2i" class="w-12 form-control" value="<?= $i['jawaban7_2i'];   ?>">
                                                    <label for="aman">Rasa Aman</label>
                                                    <input type="text" id="aman" name="jawaban7_3i" class="w-12 form-control" value="<?= $i['jawaban7_3i'];   ?>">
                                                    <label for="pengalaman">Pengalaman</label>
                                                    <input type="text" id="pengalaman" name="jawaban7_4i" class="w-12 form-control" value="<?= $i['jawaban7_4i'];   ?>">

                                                </div>
                                                <div>
                                                    <label for="8">8. Apa yang membuat kami memilih anda untuk bergabung dangan perusahaan kami dibanding kandidat pelamar yang lain?</label>
                                                </div>
                                                <div>
                                                    <textarea name="jawaban8i" id="6" cols="30" rows="2" placeholder="Jawaban"><?= $i['jawaban8i'];   ?></textarea>
                                                </div>
                                            <?php endforeach;
                                        } else if ($interview == $id) { ?>
                                            <div class="align-middle">
                                                <label for="1">1. Apa kekurangan yang anda miliki</label>
                                            </div>
                                            <div>
                                                <textarea class="form-control" name="jawaban1i" id="1" cols="30" rows="3" placeholder="Jawaban"></textarea>
                                            </div>
                                            <div>
                                                <label for="2">2. Apa kelebihan yang anda miliki</label>
                                            </div>
                                            <div>
                                                <textarea class="form-control" name="jawaban2i" id="2" cols="30" rows="2" placeholder="Jawaban"></textarea>
                                            </div>
                                            <div>
                                                <label for="3">3.Apa target dan rencana anda dalam 5 tahun Kedepan</label>
                                            </div>
                                            <div>
                                                <textarea class="form-control" name="jawaban3i" id="3" cols="30" rows="2" placeholder="Jawaban"></textarea>
                                            </div>
                                            <div>
                                                <label for="4">4. Pekerjaan yang lebih disukai(Outdoor/indoor)</label>
                                            </div>
                                            <div>
                                                <textarea class="form-control" name="jawaban4i" id="4" cols="30" rows="2" placeholder="Jawaban"></textarea>
                                            </div>
                                            <div>
                                                <label for="5">5. Ceritakan kesuksesan yang pernah anda capai</label>
                                            </div>
                                            <div>
                                                <textarea class="form-control" name="jawaban5i" id="5" cols="30" rows="2" placeholder="Jawaban"></textarea>
                                            </div>
                                            <div>
                                                <label for="6">6. Urutkan Prioritas anda dalam hidup</label>
                                            </div>
                                            <div>
                                                <textarea class="form-control" name="jawaban6i" id="6" cols="30" rows="2" placeholder="Jawaban"></textarea>
                                            </div>
                                            <div>
                                                <label for="7">7. Jika saya bekerja, saya menginginkan hal ini(urutkan sesuai minat anda)</label>
                                            </div>
                                            <div class="flex">
                                                <label for="gaji">Gaji Tinggi</label>
                                                <input type="text" id="gaji" name="jawaban7_1i" class="w-12 form-control">
                                                <label for="jenjang">Jenjang Akhir</label>
                                                <input type="text" id="jenjang" name="jawaban7_2i" class="w-12 form-control">
                                                <label for="aman">Rasa Aman</label>
                                                <input type="text" id="aman" name="jawaban7_3i" class="w-12 form-control">
                                                <label for="pengalaman">Pengalaman</label>
                                                <input type="text" id="pengalaman" name="jawaban7_4i" class="w-12 form-control">

                                            </div>
                                            <div>
                                                <label for="8">8. Apa yang membuat kami memilih anda untuk bergabung dangan perusahaan kami dibanding kandidat pelamar yang lain?</label>
                                            </div>
                                            <div>
                                                <textarea class="form-control" name="jawaban8i" id="6" cols="30" rows="2" placeholder="Jawaban"></textarea>
                                            </div>
                                        <?php }    ?>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <a class="btn btn-primary" id="previous7"> Previous</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-52 mx-auto xl:mr-0 xl:ml-6">
                        <div class="border-2 border-dashed shadow-sm border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                            <div class="h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                                <img class="rounded-md img-preview" <?php if (isset($datadiri[0]['foto_d'])) { ?> src="/foto/<?= $datadiri[0]['foto_d'];   ?>" <?php } else if (empty($datadiri[0]['foto_d'])) { ?> src="/foto/default.jpg" <?php   }   ?>>
                                <input type="hidden" id="id" name="fotolama" value="<?= $datadiri[0]['foto_d'];   ?>">
                                <!-- <div title="Remove this profile photo?" class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2"> <i data-lucide="x" class="w-4 h-4"></i> </div> -->
                            </div>

                            <div class="mx-auto cursor-pointer relative mt-5">
                                <button type="button" class="btn btn-primary w-full">Change Photo</button>
                                <input type="file" id="foto" onchange="preview()" name="foto" accept=".jpg,.jpeg" class="w-full h-full top-0 left-0 absolute opacity-0">

                            </div>
                        </div>
                    </div>

                </div>
                <div class="right-12 bottom-12 absolute">
                    <button id="delapan" type="submit" class="btn btn-primary mt-3 hidden" onclick="return confirm('Apakah anda yakin?');">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection();
