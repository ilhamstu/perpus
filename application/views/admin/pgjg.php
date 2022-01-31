
      <section class="content">
        <button class="btn btn-primary btn-sm" legend="Tambah Item" data-toggle="modal" data-target="#t_pgjg">
            <i class="nav-icon fas fa-plus"></i>
            Tambah Pengunjung
        </button>
        <table class="table">
        <tr align="center">
          <th>No</th>
          <th>Nama</th>
          <th>Telepon</th>
          <th>Email</th>
          <th colspan="2">Aksi</th>
        </tr>
        <?php 
          $no=1;
          foreach ($pgjg as $c_pgjg) {
          ?>
         <tr align="center">
           <td><?php echo $no++ ?></td>
           <input type="hidden" name="id" value="$c_pgjg->kdPengunjung">
           <td><?php echo $c_pgjg->nmPengunjung?></td>
          <td><?php echo $c_pgjg->kontak?></td>
          <td><?php echo $c_pgjg->email?></td>
          <td><?php echo anchor('admin/edit_pgjg/'.$c_pgjg->kdPengunjung,'<div class="btn btn-sm btn-primary" data-target="#e_pgjg"><i class="fas fa-edit"></i></div>') ?></td>
          <td onclick="javascript: return confirm('Aksi ini tidak bisa dikembalikan, yakin ingin menghapus?')"><?php echo anchor('admin/hapus_pgjg/'.$c_pgjg->kdPengunjung,'<div class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></div>') ?></td>
         </tr> 
       <?php } ?>
      </table>

      </section>

        <div class="modal fade" id="t_pgjg" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pengunjung</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form class="form-signin" action="<?php echo base_URL()?>admin/tambah_pgjg" method="post">
                        <legend>Tambah Data</legend>
                        <i class="nav-icon fas fa-user-plus" style="margin-right: 10px;"></i>
                        <input type="text" class="input-block-level" placeholder="Nama Pengunjung" name="nama" autofocus required><br><br>
                        <i class="nav-icon fas fa-address-book" style="margin-right: 10px;"></i>
                        <input type="text" class="input-block-level" placeholder="Telepon" name="kontak" required><br><br>
                        <i class="nav-icon fas fa-at" style="margin-right: 10px;"></i>
                        <input type="email" class="input-block-level" placeholder="Email" name="email" required><br><br>
<br><br><br>
                        <div class="modal-footer">                          
                        <button class="btn btn-large btn-primary" type="submit">Tambah</button>
                        </div>
                      </form>
              </div>
              </div>
            </div>
          </div>
        </div>
    </div>