    <section id="blog-header">
      <div class="container">
        <h1 class="text-white">DAFTAR KATEGORI BUKU</h1>
      </div>
    </section><br><br>
    
    <section id="katalog-item">
      <main role="main" class="container">
        <!-- <h2 class="text-primary">CATEGORIES: Website</h2><br><br> -->
        <div class="row">
          <div class="col-md-9 katalog-main">
            <div class="row">
            <?php 
            // if (isset($_GET['data'])) {
            //   $id_kategori_buku = $_GET['data'];
              $sql_b = "SELECT `b`.`id_buku`, `b`.`judul`, `b`.`cover`,`p`.`penerbit` FROM `buku` `b` INNER JOIN `penerbit` `p` ON `b`.`id_penerbit` = `p`.`id_penerbit` ORDER BY `b`.`id_buku` DESC LIMIT 6";
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
              <h4 class="font-italic">Kategori</h4>
              <ol class="list-unstyled mb-0">
                <li><a href="#">Umum</a></li>
                <li><a href="#">PHP</a></li>
                <li><a href="#">Java</a></li>
                <li><a href="#">Database</a></li>
                <li><a href="#">Techno</a></li>
            </div>
      
            <div class="p-4">
              <h4 class="font-italic">Tag</h4>
              <ol class="list-unstyled">
                <li><a href="#">PHP</a></li>
                <li><a href="#">MySQL</a></li>
                <li><a href="#">Javascript</a></li>
              </ol>
            </div>
          </aside> <!-- /.katalog-sidebar -->
      
        </div><!-- /.row -->
      </main><!-- /.container -->
    </section><br><br>
    <footer class="bg-primary text-dark">
        <div class="container">
          <p class="float-right">
            <a href="#" class="text-white">Back to top</a>
          </p>
          <p>&copy; <b>2021 Vokasi UB.</b> All rights reserved.</p>
        </div>
    </footer>

    <!-- Optional JavaScript; choose one of the two! -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>