<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>
    <h1 class="mt-4">Tambah Wisata</h1>
    <form action="<?= base_url('Admin/Wisata/save'); ?>" method="POST" enctype="multipart/form-data">
        <?= csrf_field();?>
        <?php $validation=\Config\Services::validation();?>
        <div class="mb-3">
            <label> Nama Wisata</label>
            <input type="text" class="form-control" name="nama">
            <small class="text-danger"><?= $validation->getError('nama');?></small>
        </div>
        <div class="mb-3">
            <label> Deskipsi Wisata</label>
            <input type="text" class="form-control" name="deskripsi">
            <small class="text-center"><?= $validation->getError('deskripsi');?></small>
        </div>
        <div class="mb-3">
            <label> Foto Wisata</label>
            <input type="file" class="form-control" name="foto" accept=".jpg, .jpeg, .png, .jfif" >
            <small class="text-center"><?= $validation->getError('foto');?></small>
        </div>
        <div class="mb-3">
            <label> Harga Tiket Wisata</label>
            <input type="text" class="form-control" name="harga">
            <small class="text-center"><?= $validation->getError('harga');?></small>
        </div>
        <div class="d-grid">
        <button type="submit" class="btn btn-sm btn-primary">Save</button>
        <a href="<?= base_url('admin/wisata')?>" class="btn btn-info btn-sm mt-2">Kembali</a>
        </div>
        
    </form>
    

<?= $this->endSection(); ?>