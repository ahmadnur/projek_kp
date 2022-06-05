<?= $this->extend('layout/template');   ?>
<?= $this->section('content');   ?>
<div class="container">
    <div class="col">
        <div class="row">
            <div class="justify-start">
                <form action="/save/lapkaryawan" method="POST">
                    <input type="text" data-daterange="true" class="datepicker form-control w-56 block mx-auto">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection();;   ?>