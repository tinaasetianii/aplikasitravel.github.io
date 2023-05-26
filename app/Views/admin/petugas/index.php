<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>
<a href="<?= base_url('admin/petugas/add'); ?>" class="btn btn-sm btn-primary float-end">Add Admin</a>
    <h1 class="mt-4">Kelola Admin</h1>
    <table class="table mt-6" id="datatablesSimple">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">Email</th>
      <th scope="col">Username</th>
      <th scope="col">Proses</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $no=1;
    foreach($petugas as $data) :
    ?>
    <tr>
      <th scope="row"><?= $no?></th>
      <td><?= $data['nama_lengkap']?></td>
      <td><?= $data['email']?></td>
      <td><?= $data['username']?></td>
      <td>
        <a href="<?= base_url('admin/petugas/edit/'.$data['id']); ?>" class="btn btn-sm btn-info">Edit</a>
        <a href="<?= base_url('admin/petugas/delete/'.$data['id']); ?>" class="btn btn-sm btn-danger">Delete</a>
      </td>
    </tr>
    <?php
    $no++;
    endforeach;
    ?>
   
  </tbody>
</table>

<?= $this->endSection(); ?>