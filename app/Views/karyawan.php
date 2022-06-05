<?= $this->extend('layout/template');   ?>
<?= $this->section('content');   ?>
<div class="container">
    <div class="col">
        <div class="row">
            <div class="flex ">
                <div class="mb-5 w-1/2">
                    <form action="/home/cari_masuk" method="POST">
                        <select aria-placeholder="Cari Data Karyawan" id="searchkaryawan" name="id_karyawan" data-search="true" class="tom-select w-full" onchange="this.form.submit()">
                            <option value="">Nama Karyawan</option>
                            <?php foreach ($data as $k) :    ?>
                                <option value="<?= $k['id_k'];   ?>"><?= $k['nama'];   ?><?php $kar = 1;    ?></option>
                            <?php endforeach;    ?>
                        </select>
                    </form>
                </div>
                <div class="w-1/2">
                    <form action="\home\save" method="POST" enctype="multipart/form-data">
                        <div class="input-group ">
                            <button class=" absolute right-5 btn btn-success rounded-full " type="submit">Ekport</button>
                        </div>
                    </form>
                </div>
            </div>
            <table class="table table-bordered table-striped mb-5">
                <tr>
                    <td><label for="id">ID</label></td>
                    <td><label for="nama">Nama</label></td>
                    <td><label for="jabatan">jabatan</label></td>
                    <td><label for="email">Email</label></td>
                    <td></td>
                </tr>
                <?php foreach ($karyawan as $k) :
                    if ($k['status_karyawan'] == 0) { ?>
                        <tr>
                            <td><?= $k['id_karyawan'];   ?></td>
                            <?php foreach ($samping as $s) :
                                if ($s['id_jabatan'] == $k['id_jabatan'] && $s['id_daftar'] == $k['id_daftar']) {  ?>
                                    <td><?= $s['nama'];   ?></td>
                                    <td><?= $s['jabatan'];   ?></td>
                            <?php }
                            endforeach;    ?>
                            <td><?= $k['email'];   ?></td>
                            <td style="border: none;"><a href="\home\profil\<?= $k['id_k'];   ?>" type="submit" class="btn btn-primary w-24 inline-block mr-1 mb-2">Profil</a></td>
                        </tr>
                <?php }
                endforeach;    ?>
            </table>
            <?= $pager->links('karyawan', 'karyawan_pager');   ?>

        </div>
    </div>
</div>

<?= $this->endSection();;   ?>