<section class="content">
    <button class="btn btn-primary btn-sm" legend="Tambah Item" data-toggle="modal" data-target="#t_pgjg">
        <i class="nav-icon fas fa-plus">Tambah Pengunjung</i>
    </button>
    <table class="table">
        <tr align="center">
            <th>No</th>
            <th>Nama</th>
            <th>Telepon</th>
            <th>Email</th>
            <th>Aksi</th>
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
            <td>
                <button type="button" class="btn btn-sm btn-primary" id="editpgjg" data-toggle="modal"
                    data-target="#modaleditpengunjung" data-id="<?=$c_pgjg->kdPengunjung?>"
                    data-nm="<?=$c_pgjg->nmPengunjung?>" data-tlp="<?=$c_pgjg->kontak?>"
                    data-email="<?=$c_pgjg->email?>">
                    <i class="fas fa-edit"></i>
                </button>
                <a href="<?=base_url('admin/hapus_pgjg/'.$c_pgjg->kdPengunjung)?>"
                    onclick="javascript: return confirm('Aksi ini tidak bisa dikembalikan, yakin ingin menghapus?')"
                    class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
            </td>
        </tr>
        <?php } ?>
    </table>
</section>

<!-- Modal -->
<div class="modal fade" id="modaleditpengunjung" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url().'admin/update_pgjg'; ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Pengunjung</label>
                        <input type="hidden" id="id" name="id" class="form-control">
                        <input type="text" id="nama" name="nama" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Telepon</label>
                        <input type="text" id="kontak" name="kontak" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" id="email" name="email" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal tambah pengunjung -->

<div class="modal fade" id="t_pgjg" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pengunjung</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-signin" action="<?php echo base_URL()?>admin/tambah_pgjg" method="post">
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text"><i class="nav-icon fas fa-user-plus"></i></label>
                        </div>
                        <input type="text" placeholder="Nama Pengunjung" name="nama" class="form-control" autofocus
                            required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text"><i class="nav-icon fas fa-address-book"></i></label>
                        </div>
                        <input type="text" placeholder="Telepon" name="kontak" class="form-control" autofocus>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text"><i class="nav-icon fas fa-at"></i></label>
                        </div>
                        <input type="email" placeholder="Email" name="email" class="form-control" autofocus>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-md btn-primary" type="submit">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>