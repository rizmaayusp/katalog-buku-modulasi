<?php 
    if(isset($_SESSION['id_user'])){
        $id_user = $_SESSION['id_user'];
        $pass_lama = $_POST['pass_lama'];
        $password_lama = mysqli_real_escape_string($koneksi, MD5($pass_lama));
        $pass_baru = $_POST['pass_baru'];
        $password_baru = mysqli_real_escape_string($koneksi, MD5($pass_baru));
        $konfirm_pass = $_POST['konfirm_pass'];

        //cek password lama 
        $sql = "SELECT * FROM user WHERE `id_user` = '$id_user' AND `password` = '$password_lama' ";
        $query = mysqli_query($koneksi, $sql);
        $count = mysqli_num_rows($query);
        
        if(empty($password_lama)){	   
            header("Location:index.php?include=ubah-password&notif=passlamakosong");
        }else if(empty($password_baru)){
            header("Location:index.php?include=ubah-password&notif=passbarukosong");
        }else if(empty($konfirm_pass)){
            header("Location:index.php?include=ubah-password&notif=passkonfirmkosong");
        }else{
            if($count==1){
                $sql = "update `user` set `password`='$password_baru' where `id_user`='$id_user'";
                mysqli_query($koneksi,$sql);
                header("Location:index.php?include=ubah-password&notif=editberhasil");
            }else {
                header("Location:index.php?include=ubah-password&notif=passsalah");
            }
        }
    }
?>