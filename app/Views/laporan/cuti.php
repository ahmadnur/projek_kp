<?= $this->extend('layout/template');   ?>
<?= $this->section('content');   ?>
<div class="container">
    <div class="col">
        <div class="row">
            <!-- <div class="flex">
                <form action="/save/cuti" method="POST">
                    <input type="text" id="tahun" name="tahun" placeholder="tahun" class="w-20">
                    <button class="static ml-4 btn btn-green" type="submit">Submit</button>
                </form>
            </div> -->
            <div class="mt-6">
                <table class="table table-bordered">
                    <tr>
                        <td><label for="id">No</label></td>
                        <td><label for="nama">nama</label></td>
                        <td><label for="ijin">total ijin</label></td>
                        <!-- <td><label for="ijin2">Jenis Ijin</label></td> -->
                    </tr>
                    <?php $s = 1;
                    foreach ($karyawan as $k) :    ?>
                        <tr>
                            <td><?= $s;   ?></td>
                            <td><?= $k['nama'];   ?></td>
                            <td><?= $total[$s - 1];   ?></td>
                        </tr>
                    <?php $s++;
                    endforeach;    ?>
                </table>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection();;   ?>