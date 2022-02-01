<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between">
    <h1 class="h3 mb-0 text-gray-800"><?= $title?></h1>
</div>

    <div class="card" style="width: 60%; margin-bottom: 100px;">
        <div class="card-body">
            <form action="<?= base_url('admin/DataJabatan/tambahDataAksi') ?>" method="POST">
                <div class="form-group">
                    <label for="">Nama Jabatan</label>
                    <input type="text" name="nama_jabatan" class="form-control" id="">
                    <?= form_error('nama_jabatan','<div class="text-small text-danger"></div>')?>

                    <label for="">Gaji Pokok</label>
                    <input type="text" name="gaji_pokok" class="form-control" id="">
                    <?= form_error('gaji_pokok','<div class="text-small text-danger"></div>')?>
                    
                    <label for="">Tunjangan transport</label>
                    <input type="text" name="tj_transport" class="form-control" id="">
                    <?= form_error('tj_transport','<div class="text-small text-danger"></div>')?>

                    <label for="">Uang Makan</label>
                    <input type="text" name="uang_makan" class="form-control" id="">
                    <?= form_error('uang_makan','<div class="text-small text-danger"></div>')?>
                </div>
                <button type="submit" class="btn btn-success "">Submit</button>
            </form>

        </div>
    </div>

</div>



