
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-plus"></i> Tambah Buku</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php?include=buku">Data Buku</a></li>
              <li class="breadcrumb-item active">Tambah Buku</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title"style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Tambah Data Buku</h3>
        <div class="card-tools">
          <a href="index.php?include=buku" class="btn btn-sm btn-warning float-right">
          <i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
        </div>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      </br></br>
      <div class="col-sm-10">
          <?php if((!empty($_GET['notif']))&&(!empty($_GET['jenis']))){?>
            <?php if($_GET['notif']=="tambahkosong"){?>
                <div class="alert alert-danger" role="alert">Maaf data 
                <?php echo $_GET['jenis'];?> wajib di isi</div>
            <?php }?>
          <?php }?>
      </div>
      <form class="form-horizontal" action="index.php?include=konfirmasi-tambah-buku" 
        method="post" enctype="multipart/form-data">
        <div class="card-body">          
        <div class="form-group row">
          <label for="foto" class="col-sm-3 col-form-label">Cover Buku </label>
          <div class="col-sm-7">
            <div class="custom-file">
            <input type="file" class="custom-file-input" name="cover" 
              id="customFile">
            <label class="custom-file-label" for="customFile">Choose 
              file</label>
            </div>  
          </div>
      </div>
      <div class="form-group row">
        <label for="kategori" class="col-sm-3 col-form-label">Kategori Buku</label>
        <div class="col-sm-7">
          <select class="form-control" id="kategori" name="kategori_buku">
          <option value="">- Pilih Kategori -</option>
          <?php 
          $sql_k = "SELECT `id_kategori_buku`,`kategori_buku` FROM `kategori_buku` ORDER BY `kategori_buku`";
          $query_k = mysqli_query($koneksi, $sql_k);
          while($data_k = mysqli_fetch_row($query_k)){
                $id_kat = $data_k[0];
                $kat = $data_k[1];
          ?>
          <option value="<?php echo $id_kat;?>"><?php echo $kat;?></option>
          <?php }?>
          </select>
        </div>
      </div>
      <div class="form-group row">
          <label for="judul" class="col-sm-3 col-form-label">Judul</label>
          <div class="col-sm-7">
          <input type="text" class="form-control" name="judul" id="judul" 
          value="">
          </div>
      </div>
      <div class="form-group row">
          <label for="pengarang" class="col-sm-3 col-form-label"> 
          Pengarang</label>
          <div class="col-sm-7">
          <input type="text" class="form-control" name="pengarang" 
          id="pengarang" value="">
          </div>
      </div>
      <div class="form-group row">
        <label for="penerbit" class="col-sm-3 col-form-label">Penerbit</label>
        <div class="col-sm-7">
          <select class="form-control" id="penerbit" name="penerbit">
          <option value="">- Pilih penerbit -</option>
          <?php 
          $sql_t = "SELECT `id_penerbit`,`penerbit` FROM `penerbit` ORDER BY `penerbit`";
          $query_t = mysqli_query($koneksi, $sql_t);
          while($data_t = mysqli_fetch_row($query_t)){
            $id_terbit = $data_t[0];
            $terbit = $data_t[1];
          ?>
          <option value="<?php echo $id_terbit;?>"><?php echo $terbit;?></option>
          <?php }?>
          </select>
        </div>
      </div>
      <div class="form-group row">
        <label for="tahun_terbit" class="col-sm-3 col-form-label">
        Tahun Terbit</label>
        <div class="col-sm-7">
        <input type="number" class="form-control" name="tahun_terbit" 
        id="tahun_terbit" value="">
        </div>
      </div>
      <div class="form-group row">
        <label for="sinopsis" class="col-sm-3 col-form-label">Sinopsis</label>
        <div class="col-sm-7">
        <textarea class="form-control" name="sinopsis" id="editor1" 
        rows="12"></textarea>
        </div>
      </div>          
          <div class="form-group row">
            <label for="tag" class="col-sm-3 col-form-label">Tag</label>
            <div class="col-sm-7">
              <?php 
              $sql_g = "SELECT `id_tag`,`tag` FROM `tag`
                        ORDER BY `tag`";
              $query_g = mysqli_query($koneksi, $sql_g);
                    while($data_g = mysqli_fetch_row($query_g)){
                      $id_tg = $data_g[0];
                      $tg = $data_g[1];
                    ?>
              <input type="checkbox"  name="tag[]" value="<?php echo $id_tg;?>">  
              <?php echo $tg;?> </br>
              <?php }?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.card-body -->
      <div class="card-footer">
        <div class="col-sm-12">
          <button type="submit" class="btn btn-info float-right">
          <i class="fas fa-plus"></i> Tambah</button>
        </div>  
      </div>
    <!-- /.card-footer -->
    </form>
    </div>
    <!-- /.card -->

    </section>
    <!-- /.content -->

