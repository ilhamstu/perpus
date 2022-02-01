<section>
    <div class="jumbotron jumbotron-fluid">
        <center>
            <h1>SELAMAT DATANG</h1><br>
            <p>Silahkan isi data pengunjung dulu</p>
            <button class="btn btn-primary btn-sm" legend="Tambah Item" data-toggle="modal" data-target="#t_pgjg">
                <i class="nav-icon fas fa-plus"></i>
                Isi Data anda disini!!!
            </button><br><br><br>
        </center>
        <div class="container">
            <center>
                <h5 class="display-8">Kolom Pencarian Buku</h5>
            </center>
            <table class="table">
                <form action="<?php echo base_url() ?>c_apps/kolom_search" method="post">
                    <label>Filters : &nbsp;&nbsp;</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                            value="1">
                        <label class="form-check-label" for="inlineRadio1">by Judul</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                            value="2">
                        <label class="form-check-label" for="inlineRadio2">by Kategori</label>
                    </div>
                    <!-- Search form -->
                    <div class="active-cyan-4 mb-4">
                        <input class="form-control" type="text"
                            placeholder="Tulis judul/kategori buku yang ingin anda cari disini" name="cari"
                            aria-label="Search">
                    </div>
                </form>
            </table>
        </div>
    </div>

    </div>
    </div>
    <!-- <div class="modal fade" id="t_pgjg" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Isi Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-signin" action="<?php echo base_URL()?>c_apps/tambah_pgjg" method="post">
                        <legend>Tambah Data</legend>
                        <i class="nav-icon fas fa-user-plus" style="margin-right: 10px;"></i>
                        <input type="text" class="input-block-level" placeholder="Nama Pengunjung" name="nama" autofocus
                            required><br><br>
                        <i class="nav-icon fas fa-address-book" style="margin-right: 10px;"></i>
                        <input type="text" class="input-block-level" placeholder="Telepon" name="kontak"
                            required><br><br>
                        <i class="nav-icon fas fa-at" style="margin-right: 10px;"></i>
                        <input type="email" class="input-block-level" placeholder="Email" name="email" required><br><br>
                        <br><br><br>
                        <div class="modal-footer">
                            <button class="btn btn-large btn-primary" type="submit">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> -->


    <div class="modal fade" id="t_pgjg" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Input Identitas Pengunjung</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="form-signin" action="<?php echo base_URL()?>c_apps/tambah_pgjg" method="post">
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text"><i class="nav-icon fas fa-user-plus"></i></label>
                            </div>
                            <input type="text" class="form-control" placeholder="Nama Pengunjung" name="nama" autofocus
                                required>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text"><i class="nav-icon fas fa-address-book"></i></label>
                            </div>
                            <input type="text" class="form-control" placeholder="Telepon" name="kontak" required>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text"><i class="nav-icon fas fa-at"></i></label>
                            </div>
                            <input type="email" class="form-control" placeholder="Email" name="email" required>
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