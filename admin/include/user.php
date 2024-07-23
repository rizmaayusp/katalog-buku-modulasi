<?php 
if((isset($_GET['aksi']))&&(isset($_GET['data']))){
	if($_GET['aksi']=='hapus'){
		$id_user = $_GET['data'];
		//hapus user
		$sql_dh = "delete from `user` where `id_user` = '$id_user'";
		mysqli_query($koneksi,$sql_dh);
	}
}
if (isset($_GET['aksi']) && isset($_POST['katakunci_user'])) {
  if ($_GET['aksi']=='cari') {
    $_SESSION['katakunci_user'] = $_POST['katakunci_user'];
    $katakunci_user = $_SESSION['katakunci_user'];
  }
}
if (isset($_SESSION['katakunci_user'])) {
  $katakunci_user = $_SESSION['katakunci_user'];
}
?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-user-tie"></i> Data User</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"> Data User</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title" style="margin-top:5px;"><i class="fas fa-list-ul"></i> Daftar  User</h3>
                <div class="card-tools">
                  <a href="index.php?include=tambah-user" class="btn btn-sm btn-info float-right">
                  <i class="fas fa-plus"></i> Tambah  User</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div class="col-md-12">
                  <form method="POST" action="index.php?include=user&aksi=cari">
                    <div class="row">
                        <div class="col-md-4 bottom-10">
                          <input type="text" class="form-control" id="kata_kunci" name="katakunci_user">
                        </div>
                        <div class="col-md-5 bottom-10">
                          <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i>&nbsp; Search</button>
                        </div>
                    </div><!-- .row -->
                  </form>
                </div><br>
              <div class="col-sm-12">
                <?php if(!empty($_GET['notif'])){?>
                  <?php if($_GET['notif']=="tambahuserberhasil"){?>
                        <div class="alert alert-success" role="alert">
                        Data Berhasil Ditambahkan</div>
                  <?php } else if($_GET['notif']=="editberhasil"){?>
                        <div class="alert alert-success" role="alert">
                        Data Berhasil Diubah</div>
                  <?php } else if($_GET['notif']=="hapusberhasil"){?>
                        <div class="alert alert-success" role="alert">
                        Data Berhasil Dihapus</div>
                  <?php }?>
                <?php }?>
              </div>
              <table class="table table-bordered">
                    <thead>                  
                      <tr>
                        <th width="5%">No</th>
                        <th width="30%">Nama</th>
                        <th width="30%">Email</th>
                        <th width="20%">Level</th>
                        <th width="15%"><center>Aksi</center></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                      $batas = 3;
                      if(!isset($_GET['halaman'])){
                          $posisi = 0;
                          $halaman = 1;
                      }else{
                          $halaman = $_GET['halaman'];
                          $posisi = ($halaman-1) * $batas;
                      } 
                      //menampilkan data user
                      $sql_b = "SELECT `id_user`, `nama`, `email`, `level` FROM `user`";
                      if (isset($katakunci_user) && !empty($katakunci_user)) {
                        $sql_b .= " WHERE `nama` LIKE '%$katakunci_user%' OR `email` LIKE '%$katakunci_user%' OR `level` LIKE '%$katakunci_user%'";
                      }
                      $sql_b.=" ORDER BY `nama` limit $posisi, $batas";
                      $query_b = mysqli_query($koneksi,$sql_b);
                      $no = $posisi+1;
                      while($data_b = mysqli_fetch_row($query_b)){
                          $id_user = $data_b[0];
                          $nama = $data_b[1];
                          $email = $data_b[2];
                          $level = $data_b[3];
                      ?>
                    <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $nama;?></td>
                        <td><?php echo $email;?></td>
                        <td><?php echo $level;?></td>
                        <td align="center">
                          <a href="index.php?include=edit-user&data=<?php echo $nama;?>" class="btn btn-xs btn-info" title="Edit"><i class="fas fa-edit"></i></a>
                          <a href="index.php?include=detail-user&data=<?php echo $id_user;?>" class="btn btn-xs btn-info" title="Detail"><i class="fas fa-eye"></i></a>
                          <a href="javascript:if(confirm('Anda yakin ingin menghapus data <?php echo $nama; ?>?')) window.location.href = 'index.php?include=user&aksi=hapus&data=<?php echo $id_user;?>&notif=hapusberhasil'" class="btn btn-xs btn-warning"><i class="fas fa-trash" title="Hapus"></i></a>                         
                        </td>                                              
                      </tr>  
                      <?php $no++; } ?>                                          
                    </tbody>
                  </table>  
              </div>
              <!-- /.card-body -->
              <?php
                //hitung jumlah semua data 
                $sql_jum = "SELECT `id_user`, `nama` FROM `user` ORDER BY `nama`";                                  
                $query_jum = mysqli_query($koneksi,$sql_jum);
                $jum_data = mysqli_num_rows($query_jum);
                $jum_halaman = ceil($jum_data/$batas);
              ?>

              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                <?php 
                if($jum_halaman==0){
                  //tidak ada halaman
                }else if($jum_halaman==1){
                  echo "<li class='page-item'><a class='page-link'>1</a></li>";
                }else{
                  $sebelum = $halaman-1;
                  $setelah = $halaman+1;
                  if($halaman!=1){
                    echo "<li class='page-item'><a class='page-link' href='index.php?include=user&halaman=1'>First</a></li>";
                    echo "<li class='page-item'><a class='page-link' href='index.php?include=user&halaman=$sebelum'>«</a></li>";
                  }
                  for($i=1; $i<=$jum_halaman; $i++){
                      if ($i > $halaman - 5 and $i < $halaman + 5 ) {
                        if($i!=$halaman){
                            echo "<li class='page-item'><a class='page-link' href='index.php?include=user&halaman=$i'>$i</a></li>";
                        }else{
                            echo "<li class='page-item'><a class='page-link'>$i</a></li>";
                        }
                      }
                  }
                  if($halaman!=$jum_halaman){
                        echo "<li class='page-item'><a class='page-link' href='index.php?include=user&halaman=$setelah'>»</a></li>";
                        echo "<li class='page-item'><a class='page-link' href='index.php?include=user&halaman=$jum_halaman'>Last</a></li>";
                  }      
                }?>
                </ul>
              </div>
            </div>
            <!-- /.card -->

    </section>
    <!-- /.content -->