<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>
    <h1 class="mt-4">Tambah Petugas</h1>
    <form action="<?= base_url('Admin/petugas/save'); ?>" method="POST" >
        <?= csrf_field();?>
        <?php $validation=\Config\Services::validation();?>
        <div class="mb-3">
            <label> Nama </label>
            <input type="text" class="form-control" name="nama_lengkap" value="<?= set_value('nama_lengkap');?>"> 
            <small class="text-danger"><?= $validation->getError('nama_lengkap');?></small>
        </div>
        <div class="mb-3">
            <label> Username</label>
            <input type="text" class="form-control" name="username"  value="<?= set_value('username');?>">
            <small class="text-center"><?= $validation->getError('username');?></small>
        </div>
        <div class="mb-3">
            <label> Email</label>
            <input type="text" class="form-control" name="email"  value="<?= set_value('email');?>">
            <small class="text-center"><?= $validation->getError('email');?></small>
        </div>
        <div class="mb-3">
            <label> Password</label>
            <input type="password" class="form-control" name="password" >
            <small class="text-center"><?= $validation->getError('password');?></small>
        </div>
        <div class="mb-3">
            <label> Ulang Password</label>
            <input type="password" class="form-control" name="upass" value="<?= set_value('upass');?>">
            <small class="text-center"><?= $validation->getError('upass');?></small>
        </div>
        <div class="d-grid">
        <button type="submit" class="btn btn-sm btn-primary">Save</button>
        <a href="<?= base_url('admin/petugas')?>" class="btn btn-info btn-sm mt-2">Kembali</a>
        </div>
        
    </form>
    

<?= $this->endSection(); ?>