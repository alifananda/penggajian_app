<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title?></h1>
</div>

    <div class="card" style="width: 60%; margin-bottom: 100px;">
        <div class="card-body">
            
            <form  method="POST" action="<?= base_url('admin/DataPegawai/tambahDataAksi') ?>" enctype="multipart/form-data">
                <div class="form-group">
                    <label>NIK</label>
                    <input type="number" name="nik" class="form-control">
                </div>
                <div class="form-group">
                    <label>Nama Pegawai</label>
                    <input type="number" name="nama_pegawai" class="form-control">
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control"> 
                        <option>--Pilih Jenis Kelamin--</option>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Jabatan</label>
                    <select name="jabatan" class="form-control"> 
                        <option>--Pilih Jabatan--</option>
                        <?php foreach($jabatan as $j):?>
                        <option value="<?= $j->nama_jabatan ?>"><?= $j->nama_jabatan ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control"> 
                        <option>--Pilih Status--</option>
                        <option value="Pegawai Tetap">Pegawai Tetap</option>
                        <option value="Pegawai Tidak Tetap">Pegawai Tidak Tetap</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Foto</label>
                    <input type="file" name="foto" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>

</div>


