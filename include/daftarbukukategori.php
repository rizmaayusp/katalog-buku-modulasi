<?php 
if (isset($_GET['data'])) {
  $id_kategori_buku = $_GET['data'];
  $sql_d = "SELECT `kategori_buku` FROM `kategori_buku` WHERE `id_kategori_buku`='$id_kategori_buku'";
  $query_d = mysqli_query($koneksi,$sql_d);
  while($data_d = mysqli_fetch_row($query_d)){
    $kategori_buku = $data_d[0];
  }}
?>

    <section id="blog-header">
      <div class="container">
        <h1 class="text-white">DAFTAR BUKU</h1>
      </div>
    </section><br><br>
    
    <section id="katalog-item">
      <main role="main" class="container">
        <h2 class="text-primary">CATEGORIES: <?php echo $kategori_buku?></h2><br><br>
        <div class="row">
          <div class="col-md-9 katalog-main">
            <div class="row">
            <?php 
            // if (isset($_GET['data'])) {
            //   $id_kategori_buku = $_GET['data'];
              $sql_b = "SELECT `b`.`id_buku`, `b`.`judul`, `b`.`cover`,`p`.`penerbit` FROM `buku` `b` INNER JOIN `penerbit` `p` ON `b`.`id_penerbit` = `p`.`id_penerbit` WHERE `b`.`id_kategori_buku` = '$id_kategori_buku' ORDER BY `b`.`id_buku` DESC LIMIT 6";
              //echo $sql_b;
              $query_b = mysqli_query($koneksi,$sql_b);
              while($data_b = mysqli_fetch_row($query_b)){
                $id_buku = $data_b[0];
                $judul_buku = $data_b[1];
                $cover = $data_b[2];
                $penerbit = $data_b[3];
            ?>  
              <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                  <img src="admin/cover/<?php echo $cover;?>" class="img-fluid" alt="<?php echo $judul_buku;?>" title="<?php echo $judul_buku;?>">
                  <div class="card-body bg-warning">
                    <p class="card-text"><?php echo $judul_buku;?></p>
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group">
                        <a href="index.php?include=detail-buku&data=<?php echo $id_buku;?>" class="btn btn-primary stretched-link">Detail</a>
                      </div>
                      <small class="text-muted"><?php echo $penerbit;?></small>
                    </div>
                  </div>
                </div>
              </div>
            <?php }?>
            <div class="col-sm-12">
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                      <li class="page-item"><a class="page-link" href="" ><strong>first</strong></a></li>
                      <li class="page-item"><a class="page-link"  href="">1</a></li> 
                      <li class="page-item active"><a class="page-link"  href="">2</a></li> 
                      <li class="page-item"><a class="page-link"  href="">3</a></li> 
                      <li class="page-item"><a class="page-link" href=""><strong>last</strong></a></li>
                  </ul>
                </nav>
            </div>  

            </div><!-- .row-->
          </div><!-- /.katalog-main -->
      
          <aside class="col-md-3 katalog-sidebar">
            <div class="pl-4 pb-4">
              <h4 class="font-italic">Categories</h4>
              <ol class="list-unstyled mb-0">
                <?php 
                  $sql_k = "SELECT `id_kategori_buku`,`kategori_buku` FROM `kategori_buku` ORDER BY `kategori_buku`";
                  $query_k = mysqli_query($koneksi,$sql_k);
                  while($data_k = mysqli_fetch_row($query_k)){
                    $id_kat = $data_k[0];
                    $nama_kat = $data_k[1];
                ?>
                <li><a href="index.php?include=daftar-buku-kategori&data=<?php echo $id_kat;?>">
                <?php echo $nama_kat;?></a></li>
                <?php }?>
              </ol>
            </div>
      
            <div class="p-4">
              <h4 class="font-italic">Tag</h4>
              <ol class="list-unstyled">
              <?php 
                $sql_t = "SELECT `id_tag`,`tag` FROM `tag` ORDER BY `tag`";
                $query_t = mysqli_query($koneksi,$sql_t);
                while($data_t = mysqli_fetch_row($query_t)){
                  $id_tag = $data_t[0];
                  $nama_tag = $data_t[1];
                ?>
                <li><a href="index.php?include=daftar-buku-tag&data=<?php echo $id_tag;?>">
                <?php echo $nama_tag;?></a></li>
                <?php }?>
              </ol>
            </div>
          </aside> <!-- /.katalog-sidebar -->
        </div><!-- /.row -->
      </main><!-- /.container -->
    </section><br><br>