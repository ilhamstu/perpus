<section class="content">
    <button class="btn btn-primary btn-sm" legend="Tambah Item" data-toggle="modal" data-target="#modaltambahpjm">
        <i class="nav-icon fas fa-plus">Tambah Peminjaman</i>
    </button>
    <table class="table">
        <tr>
            <th>No</th>
            <th>Judul Buku</th>
            <th>Peminjam</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Aksi</th>
        </tr>
        <?php 
          $no=1;
          foreach ($pinjam as $c_pinjam) {
          ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <input type="hidden" name="pjm" value="<?php echo $c_pinjam->kdPeminjaman ?>">
            <td><?php echo $c_pinjam->jdlBuku ?></td>
            <td><?php echo $c_pinjam->nmPengunjung ?></td>
            <td><?php echo $c_pinjam->tgl_pinjam ?></td>
            <td><?php echo $c_pinjam->tgl_kembali ?></td>
            <td
                onclick="javascript: return confirm('Apakah anda yakin buku <?php echo $c_pinjam->jdlBuku?> sudah dikembalikan oleh <?php echo $c_pinjam->nmPengunjung?>? Pilih OK untuk menghapus data peminjaman!')">
                <?php echo anchor('admin/hapus_pinjam/'.$c_pinjam->kdPeminjaman,'<div class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></div>') ?>
            </td>
        </tr>
        <?php } ?>
    </table>


    <!-- Modal Tambah  Peminjaman-->
    <div class="modal fade" id="modaltambahpjm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Input Data Peminjaman</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="form-signin" action="<?php echo base_URL()?>admin/tambah_pinjam" method="post">
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01"><i
                                        class="nav-icon fas fa-user"></i></label>
                            </div>
                            <select class="custom-select" id="inputGroupSelect01" name="nama">
                                <option selected>Pilih Nama</option>
                                <?php 
                              foreach ($pgjg as $c_pgjg) {
                              ?>
                                <option value="<?php echo $c_pgjg->kdPengunjung ?>">
                                    <?= $c_pgjg->nmPengunjung ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01"><i
                                        class="nav-icon fas fa-book"></i></label>
                            </div>
                            <select class="custom-select" id="inputGroupSelect01" name="buku">
                                <option selected>Pilih Judul</option>
                                <?php 
                              foreach ($buku as $c_buku) {
                              ?>
                                <option value="<?php echo $c_buku->kdBuku ?>"><?= $c_buku->jdlBuku ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text"><i class="nav-icon fas fa-date">Tanggal
                                        Pinjam</i></label>
                            </div>
                            <input type="date" class="form-control" name="T_pinj" required>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text"><i class="nav-icon fas fa-date">Tanggal
                                        Pengembalian</i></label>
                            </div>
                            <input type="date" class="form-control" name="T_kem" required>
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
</section>
</div>
</div>