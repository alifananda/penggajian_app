<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title?></h1>
</div>

    <a class="btn btn-sm btn-success mb-3" href="<?= base_url('admin/DataPegawai/tambahData/') ?>"> 
        <i class="fas fa-plus"></i> Tambah Data</a>
    <?= $this->session->flashdata('pesan') ?>

    <table class="table table-bordered table-striped mt-2">
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">NIK</th>
            <th class="text-center">Nama Pegawai</th>
            <th class="text-center">Jenis Kelamin</th>
            <th class="text-center">Jabatan</th>
            <th class="text-center">Tanggal Masuk</th>
            <th class="text-center">Status</th>
            <th class="text-center">Photo</th>
            <th class="text-center">Action</th>
        </tr>
        <?php $no=1; foreach($pegawai as $p) : ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $p->nik ?></td>
            <td><?= $p->nama_pegawai ?></td>
            <td><?= $p->jenis_kelamin ?></td>
            <td><?= $p->jabatan ?></td>
            <td><?= $p->tanggal_masuk ?></td>
            <td><?= $p->status ?></td>
            <td><img style="width: 65px;" src="<?= base_url().'assets/photo/'.$p->foto ?>"></td>
        </tr>
        <?php endforeach; ?>
    </table> 

</div>


