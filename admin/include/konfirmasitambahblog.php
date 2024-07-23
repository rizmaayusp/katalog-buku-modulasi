<?php 
   //  include('../koneksi/koneksi.php');
   if (isset($_SESSION['id_user'])) {
    $id_user = $_SESSION['id_user'];
   }
    $id_kategori_blog = $_POST['kategori_blog'];
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];

   if(empty($id_kategori_blog)){	   
      header("Location:index.php?include=tambah-blog&notif=tambahkosong&
      jenis=kategori_blog");
   }else if(empty($judul)){
	header("Location:index.php?include=tambah-blog&notif=tambahkosong&
      jenis=judul");
   }else{   
	$sql = "INSERT INTO `blog` 
      (`id_kategori_blog`,`id_user`,`judul`,`isi`)
      VALUES ('$id_kategori_blog','$id_user','$judul','$isi')";
      //echo $sql;
	mysqli_query($koneksi,$sql);
	$id_blog = mysqli_insert_id($koneksi);
      header("Location:index.php?include=blog&notif=tambahberhasil");
    }
?>