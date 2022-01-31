
      <section class="content">
        <button class="btn btn-primary btn-sm" legend="Tambah Item" data-toggle="modal" data-target="#exampleModal">
            <i class="nav-icon fas fa-plus"></i>
            Tambah Peminjaman
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
           <td onclick="javascript: return confirm('Apakah anda yakin buku <?php echo $c_pinjam->jdlBuku?> sudah dikembalikan oleh <?php echo $c_pinjam->nmPengunjung?>? Pilih OK untuk menghapus data peminjaman!')"><?php echo anchor('admin/hapus_pinjam/'.$c_pinjam->kdPeminjaman,'<div class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></div>') ?> </td>
         </tr> 
       <?php } ?>
      </table>

      </section>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Isi Data Peminjaman</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form class="form-signin" action="<?php echo base_URL()?>admin/tambah_pinjam" method="post">
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Pengunjung</label>
                          </div>
                          <select class="custom-select" id="inputGroupSelect01" name="nama">
                            <option selected>Pilih Nama</option>
                            <?php 
                              $no=1;
                              foreach ($pgjg as $c_pgjg) {
                              ?>
                            <option value="<?php echo $c_pgjg->kdPengunjung ?>"><?php echo $no++.". ".$c_pgjg->nmPengunjung ?></option>
                            <?php } ?>
                          </select><br><br>
                        </div><br>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Buku</label>
                          </div>
                          <select class="custom-select" id="inputGroupSelect01" name="buku">
                            <option selected>Pilih Judul</option>
                            <?php 
                              $no=1;
                              foreach ($buku as $c_buku) {
                              ?>
                            <option value="<?php echo $c_buku->kdBuku ?>"><?php echo $no++.". ".$c_buku->jdlBuku ?></option>
                            <?php } ?>
                          </select>
                        </div><br>
                        
                        <i class="nav-icon fas fa-date" style="margin-right: 10px;"></i><label>Tanggal Pinjam</label>
                        <input type="date" class="input-block-level" name="T_pinj" required><br><br>
                        <i class="nav-icon fas fa-date" style="margin-right: 10px;"></i><label>Tanggal Kembali</label>
                        <input type="date" class="input-block-level" name="T_kem" required><br><br>
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