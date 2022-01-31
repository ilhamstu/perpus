
      <section class="content">
        <table class="table">
        <tr align="center">
          <th>No</th>
          <th>Judul Buku</th>
          <th>Kategori</th>
          <th>Stok</th>
          <th>Rak</th>
        </tr>
        <?php 
          $no=1;
          foreach ($buku as $c_buku) {
          ?>
         <tr align="center">
           <td><?php cetak($no++) ?></td>
           <td><?php cetak($c_buku->jdlBuku) ?></td>
           <td><?php cetak($c_buku->nmKategori) ?></td>
           <td><?php cetak($c_buku->stok) ?></td>
           <td><?php cetak($c_buku->rak) ?></td>
         </tr> 
       <?php } ?>
      </table>

      </section>