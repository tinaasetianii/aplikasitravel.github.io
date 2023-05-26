<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>
    <div class="card mb-4 my-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
                    
        </div>
      <div class="card-body">
          <h1 class="mt-4">Daftar Member Wisata</h1>
          <table class="table mt-6" id="datatablesSimple">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Id</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Email</th>
                  <th scope="col">No.Ponsel</th>
                  <th scope="col">Kelamin</th>
                  <th scope="col">Tanggal Membuat</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no=1;
                foreach($users as $data) :
                ?>
                  <tr>
                    <th scope="row"><?= $no?></th>
                    <td><?= $data->id?></td>
                    <td><?= $data->nama_users?></td>
                    <td><?= $data->email?></td>
                    <td><?= $data->ponsel?></td>
                    <td><?= $data->kelamin?></td>
                    <td><?= $data->created_at?></td>
                  </tr>
                    <?php
                    $no++;
                    endforeach;
                    ?>
                </tbody>
            </table>
     </div>
   </div>

<?= $this->endSection(); ?>