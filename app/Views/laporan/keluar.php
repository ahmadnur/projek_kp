<?= $this->extend('layout/template');   ?>
<?= $this->section('content');   ?>
<div class="container">
    <div class="col">
        <div class="row">
            <div class="flex">
                <form action="/save/lapkeluar" method="POST">
                    <select name="bulan" id="bulan">
                        <option value="1">Januari</option>
                        <option value="2">Februari</option>
                        <option value="3">Maret</option>
                        <option value="4">April</option>
                        <option value="5">Mei</option>
                        <option value="6">Juni</option>
                        <option value="7">Juli</option>
                        <option value="8">Agustus</option>
                        <option value="9">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                    </select>
                    <input type="text" id="tahun" name="tahun" placeholder="tahun" class="ml-6 w-28">
                    <button class="static ml-4 btn btn-green" type="submit">Submit</button>
                </form>
            </div>
            <div class="mt-6">
                <table class="table table-bordered">
                    <tr>
                        <td><label for="id">id</label></td>
                        <td><label for="nama">nama</label></td>
                        <td><label for="jabatan">Jabatan</label></td>
                        <td><label for="masuk">tanggal keluar</label></td>
                        <td><label for="alasan">Alasan</label></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection();;   ?>