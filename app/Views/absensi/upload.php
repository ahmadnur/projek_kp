<?= $this->extend('layout/template');   ?>
<?= $this->section('content');   ?>
<div class="container">
    <div class="col">
        <div class="row">
            <?php if (session()->getFlashdata('message')) :  ?>
                <div class="alert alert-primary alert-dismissible show flex items-center mb-2" role="alert">
                    <?= session()->getFlashData('message') ?>
                    <button type="button" class="btn-close" data-tw-dismiss="alert" aria-label="Close"> <i data-lucide="x" class="w-4 h-4"></i> </button>
                </div>
            <?php endif;    ?>
            <form action="/save/upload" method="POST" enctype="multipart/form-data">
                <div class="form-control"> <input type="file" name="filex" accept=".xlsx,.xlx" /></div>
                <button type="submit" class="btn btn-primary h-8 mt-2"> Submit</button>
            </form>
            <div>
                <table class="table table-bordered table-striped mt-10 mb-5">
                    <tr>
                        <td>No</td>
                        <td><label for="nama">nama</label></td>
                        <td><label for="tanggal">tanggal</label></td>
                        <td><label for="status">status</label></td>
                    </tr>
                    <?php $angka = 1 + (10 * ($page - 1));
                    foreach ($upload as $k) :    ?>
                        <tr>
                            <td><?= $angka;   ?></td>
                            <td><?= $k['nama_file'];   ?></td>
                            <td><?= $k['tanggal'];   ?></td>
                            <td><?= $k['status'];   ?></td>
                        </tr>
                    <?php $angka++;
                    endforeach;    ?>
                </table>
                <?= $pager->links('upload_absensi', 'karyawan_pager');   ?>
            </div>

        </div>
    </div>
</div>


<?= $this->endSection();;   ?>