<?php 
if (isset($_GET['data'])) {
  $id_blog = $_GET['data'];
  $sql_l = "SELECT `b`.`id_blog`, `b`.`judul`, `b`.`isi`, DATE_FORMAT(`b`.`tanggal`, '%d-%m-%Y'), `k`.`kategori_blog`, `u`.`nama` FROM `blog` `b` INNER JOIN `kategori_blog` `k` ON `b`.`id_kategori_blog` = `k`.`id_kategori_blog` INNER JOIN `user` `u` ON `b`.`id_user` = `u`.`id_user` WHERE `b`.`id_blog`='$id_blog'";
  $query_l = mysqli_query($koneksi,$sql_l);
  while($data_l = mysqli_fetch_row($query_l)){
    $id_blog = $data_l[0];
    $judul_blog = $data_l[1];
    $isi_blog = $data_l[2];
    $tanggal = $data_l[3];
    $kategori_blog = $data_l[4];
    $nama = $data_l[5];
  }}
?>

    <section id="blog-header">
      <div class="container">
        <h1 class="text-white">BLOG</h1>
      </div>
    </section><br><br>
    <section id="blog-list">
      <main role="main" class="container">
        <div class="row">
          <div class="col-md-9 blog-main">
            <div class="blog-post">
              <h2 class="blog-post-title"><?php echo $judul_blog;?></h2>
              <p class="blog-post-meta"><?php echo $tanggal;?> by <a href="#"><?php echo $nama;?></a></p>

              <p><?php echo $isi_blog;?></p>
            </div><br><br><!-- /.blog-post -->
          </div><!-- /.blog-main -->
      
          <aside class="col-md-3 blog-sidebar">
      
           <div class="pl-4 pb-4">
              <h4 class="font-italic">Categories</h4>
              <ol class="list-unstyled mb-0">
                <?php 
                  $sql_k = "SELECT `id_kategori_blog`,`kategori_blog` FROM `kategori_blog` ORDER BY `kategori_blog`";
                  $query_k = mysqli_query($koneksi,$sql_k);
                  while($data_k = mysqli_fetch_row($query_k)){
                    $id_kat = $data_k[0];
                    $nama_kat = $data_k[1];
                ?>
                <li><a href="index.php?include=daftar-blog-kategori&data=<?php echo $id_kat;?>">
                <?php echo $nama_kat;?></a></li>
                <?php }?>
              </ol>
            </div>
      
            <div class="p-4">
              <h4 class="font-italic">Archives</h4>
              <ol class="list-unstyled mb-0">
                <li><a href="#">March 2014</a></li>
                <li><a href="#">February 2014</a></li>
                <li><a href="#">January 2014</a></li>
                <li><a href="#">December 2013</a></li>
                <li><a href="#">November 2013</a></li>
                <li><a href="#">October 2013</a></li>
                <li><a href="#">September 2013</a></li>
                <li><a href="#">August 2013</a></li>
                <li><a href="#">July 2013</a></li>
                <li><a href="#">June 2013</a></li>
                <li><a href="#">May 2013</a></li>
                <li><a href="#">April 2013</a></li>
              </ol>
            </div>
      
            
          </aside><!-- /.blog-sidebar -->
      
        </div><!-- /.row -->
      
      </main><!-- /.container -->
    </section><br><br>