<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>
    <h1 class="mt-4">Ubah Petugas</h1>
    <form action="<?= base_url('Admin/petugas/update'); ?>" method="POST" >
        <?= csrf_field();?>
       <input type="hidden" name="kode" value="<?= $cari['id']; ?>">
        <div class="mb-3">
            <label> Nama </label>
            <input type="text" class="form-control" name="nama_lengkap" value="<?= $cari['nama_lengkap']; ?>"> 
           
        </div>
        <div class="mb-3">
            <label> Username</label>
            <input type="text" class="form-control" name="username"  value="<?= $cari['username'];?>">
           
        <div class="mb-3">
            <label> Email</label>
            <input type="text" class="form-control" name="email"  value="<?= $cari['email']; ?>">
           
        <div class="mb-3">
            <label> Password</label>
            <input type="password" class="form-control" name="password" >
           
        </div>
        <div class="d-grid">
        <button type="submit" class="btn btn-sm btn-primary">Save</button>
        <a href="<?= base_url('admin/petugas')?>" class="btn btn-info btn-sm mt-2">Kembali</a>
        
        </div>
        
    </form>
    

<?= $this->endSection(); ?>