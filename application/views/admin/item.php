<section class="content">
    <button class="btn btn-primary btn-sm" legend="Tambah Item" data-toggle="modal" data-target="#t_buku">
        <i class="nav-icon fas fa-plus">Tambah Item</i>
    </button>
    <button class="btn btn-success btn-sm" legend="Tambah Item" data-toggle="modal" data-target="#t_ktgr">
        <i class="nav-icon fas fa-plus">Tambah Kategori</i>
    </button>
    <table class="table">
        <thead align="center">
            <th>No</th>
            <th>Judul Buku</th>
            <th>Kategori</th>
            <th>Stok</th>
            <th>Rak</th>
            <th>Aksi</th>
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
                <td>
                    <!-- <?php echo anchor('admin/edit_buku/'.$c_buku->kdBuku,'<div class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></div>') ?> -->
                    <!-- <?php echo anchor('admin/hapus_buku/'.$c_buku->kdBuku,'<div class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></div>') ?> -->
                    <button type="button" class="btn btn-sm btn-primary" id="editbuku" data-jdl="<?=$c_buku->jdlBuku?>"
                        data-id="<?=$c_buku->kdBuku?>" data-kdktgr="<?php echo $c_buku->kdKategori ?>"
                        data-ktgr="<?=$c_buku->nmKategori?>" data-stok="<?=$c_buku->stok?>" data-rak="<?=$c_buku->rak?>"
                        data-toggle="modal" data-target="#modaleditbuku"><i class="fas fa-edit"></i>
                    </button>
                    <a href="<?=base_url('admin/hapus_buku/'.$c_buku->kdBuku)?>"
                        onclick="javascript: return confirm('Aksi ini tidak bisa dikembalikan, yakin ingin menghapus?')"
                        class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <hr>
    <?=$links;?>
</section>

<!-- Modal Edit-->
<div class="modal fade" id="modaleditbuku tabindex=" -1" role="dialog" aria-labelledby="modaleditbuku"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Edit Buku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url().'admin/update_buku'; ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Judul Buku</label>
                        <input type="hidden" id="id" name="id" class="form-control">
                        <input type="text" id="jdl" name="jdl" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Stok</label>
                        <input type="text" id="stok" name="stok" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Rak</label>
                        <input type="text" id="rak" name="rak" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Kategori</label>
                        <select class="custom-select" name="kategori">
                            <option id="skat"></option>
                            <?php 
                              foreach ($ktgr as $c_ktgr) {
                                  ?>
                            <option value="<?php echo $c_ktgr->kdKategori ?>">
                                <?= $c_ktgr->nmKategori ?>
                            </option>
                            <?php } ?>
                        </select>
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

<!-- tambahbukuform -->
<div class="modal fade" id="t_buku" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Buku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-signin" action="<?php echo base_URL()?>admin/tambah" method="post">
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text"><i class="nav-icon fas fa-book"></i></label>
                        </div>
                        <input type="text" placeholder="Judul Buku" name="jdl" class="form-control" autofocus required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text"><i class="nav-icon fas fa-layer-group"></i></label>
                        </div>
                        <input type="text" class="form-control" placeholder="Stok" name="stok" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text"><i class="nav-icon fas fa-warehouse"></i></label>
                        </div>
                        <input type="text" placeholder="Rak" name="rak" class="form-control" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01"><i
                                    class="nav-icon fas fa-tag"></i></label>
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
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-large btn-primary" type="submit">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
<!-- tambahkategori -->
<div class="modal fade" id="t_ktgr" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-signin" action="<?php echo base_URL()?>admin/tambah_ktgr" method="post">
                <div class="modal-body">
                    <div class="input-group input-group-lg mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text"><i class="nav-icon fas fa-tag"></i></label>
                        </div>
                        <input type="text" placeholder="Nama Kategori" name="ktgr" class="form-control" autofocus
                            required>
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