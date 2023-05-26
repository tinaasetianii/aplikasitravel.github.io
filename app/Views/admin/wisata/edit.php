<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>
<?php
      helper('form')
?>
    <h1 class="mt-4">Ubah Wisata</h1>
 
    <form action="<?= base_url('Admin/Wisata/update'); ?>" method="POST" enctype="multipart/form-data">
        <?= csrf_field();?>
        <input type="hidden" name="kode" value="<?= $cari->id_wisata; ?>">
        <div class="mb-3">
            <label> Nama Wisata</label>
            <input type="text" class="form-control" name="nama" value= "<?= $cari->nama_wisata;?>">
        </div>
        <div class="mb-3">
            <label> Deskipsi Wisata</label>
            <input type="text" class="form-control" name="deskripsi" value= "<?= $cari->deskripsi;?>">
        </div>
        <div class="mb-3">
            <label> Harga Tiket Wisata</label>
            <input type="text" class="form-control" name="harga" value= "<?= $cari->harga;?>">
        </div>
        <div class="mb-3">
            <label>Foto Wisata</label>
            <input type="file" class="form-control" name="foto" id="foto" value= ""  accept =".jpg, .jpeg, .png, .jfif">
        </div>

        
        <div class="d-grid">
            <button type="submit" class="btn btn-sm btn-primary">Save</button>
            <a href="<?= base_url('admin/wisata')?>" class="btn btn-info btn-sm mt-2">Kembali</a>
        </div>   
    </form>  

<?= $this->endSection(); ?>


