<section class="content">
    <button class="btn btn-primary btn-sm" legend="Tambah Item" data-toggle="modal" data-target="#t_buku">
        <i class="nav-icon fas fa-plus"></i>
        Tambah Item
    </button>
    <button class="btn btn-success btn-sm" legend="Tambah Item" data-toggle="modal" data-target="#t_ktgr">
        <i class="nav-icon fas fa-plus"></i>
        Tambah Kategori
    </button>
    <table class="table">
        <thead align="center">
            <th>No</th>
            <th>Judul Buku</th>
            <th>Kategori</th>
            <th>Stok</th>
            <th>Rak</th>
            <th colspan="2">Aksi</th>
        </thead>
        <tbody>
            <?php
            if (empty($this->uri->segment(3))) {
              $no=1;
            }elseif ($this->uri->segment(3)) {
              $no=$this->uri->segment(3)*6;
            }
          foreach ($buku as $c_buku) {
          ?>
            <tr align="center">
                <td><?php echo $no++ ?></td>
                <td><?php echo $c_buku->jdlBuku ?></td>
                <input type="hidden" name="ktg" value="<?php echo $c_buku->kdKategori ?>">
                <td><?php echo $c_buku->nmKategori ?></td>
                <td><?php echo $c_buku->stok ?></td>
                <td><?php echo $c_buku->rak ?></td>
                <td><?php echo anchor('admin/edit_buku/'.$c_buku->kdBuku,'<div class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></div>') ?>
                </td>
                <td onclick="javascript: return confirm('Aksi ini tidak bisa dikembalikan, yakin ingin menghapus?')">
                    <?php echo anchor('admin/hapus_buku/'.$c_buku->kdBuku,'<div class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></div>') ?>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <hr>
    <?=$links;?>

</section>

<!-- tambahbukuform -->
<div class="modal fade" id="t_buku" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Buku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-signin" action="<?php echo base_URL()?>admin/tambah" method="post">
                    <legend>Tambah Data</legend>
                    <i class="nav-icon fas fa-book" style="margin-right: 10px;"></i>
                    <input type="text" class="input-block-level" placeholder="Judul Buku" name="jdl" autofocus
                        required><br><br>
                    <i class="nav-icon fas fa-layer-group" style="margin-right: 10px;"></i>
                    <input type="text" class="input-block-level" placeholder="Stok" name="stok" required><br><br>
                    <i class="nav-icon fas fa-warehouse" style="margin-right: 10px;"></i>
                    <input type="text" class="input-block-level" placeholder="Rak" name="rak" required><br><br>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Kategori</label>
                        </div>
                        <select class="custom-select" id="inputGroupSelect01" name="kategori">
                            <option selected>Pilih Kategori</option>
                            <?php 
                              $no=1;
                              foreach ($ktgr as $c_ktgr) {
                              ?>
                            <option value="<?php echo $c_ktgr->kdKategori ?>">
                                <?php echo $no++.". ".$c_ktgr->nmKategori ?></option>
                            <?php } ?>
                        </select>
                    </div><br><br>
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
<!-- tambahkategori -->
<div class="modal fade" id="t_ktgr" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-signin" action="<?php echo base_URL()?>admin/tambah_ktgr" method="post">
                    <legend>Tambah Data</legend>
                    <i class="nav-icon fas fa-tag" style="margin-right: 10px;"></i>
                    <input type="text" class="input-block-level" placeholder="Nama Kategori" name="ktgr" autofocus
                        required><br><br>
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