<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>
<a href="<?= base_url('admin/wisata/add'); ?>" class="btn btn-sm btn-primary float-end">Add Wisata</a>
    <h1 class="mt-4">Kelola Wisata</h1>
    <table class="table mt-6" id="datatablesSimple">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Wisata</th>
      <th scope="col">Desc</th>
      <th scope="col">Harga</th>
      <th>Foto</th>
      <th scope="col">Proses</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $no=1;
    foreach($wisata as $data) :
    ?>
    <tr>
      <th scope="row"><?= $no?></th>
      <td><?= $data->nama_wisata?></td>
      <td><?= $data->deskripsi?></td>
      <td><?= $data->harga?></td>
      <td><img src="<?= base_url('foto/'.$data->foto);?>" style="width: 100px; height 100px;" alt=""></td>
      <td>
        <a href="<?= base_url('admin/wisata/edit/'.$data->id_wisata); ?>" class="btn btn-sm btn-info">Edit</a>
        <a href="<?= base_url('admin/wisata/delete/'.$data->id_wisata); ?>" class="btn btn-sm btn-danger">Delete</a>
      </td>
    </tr>
    <?php
    $no++;
    endforeach;
    ?>
   
  </tbody>
</table>


<?= $this->endSection() ?>