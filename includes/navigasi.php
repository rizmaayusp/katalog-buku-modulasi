<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
<div class="container">
    <a class="navbar-brand" href="#">Katalog Buku</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" idatenavbarExample07>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a href="index.php" class="nav-link">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?include=about-us">About Us</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown07" data-toggle="dropdown" aria-haspopup="true" aria-  expanded="false">Kategori</a>
                <div class="dropdown-menu" aria-labelledby="dropdown07">
                    <?php 
                        $sql_k = "SELECT `id_kategori_buku`,`kategori_buku` FROM `kategori_buku` ORDER BY `kategori_buku`";
                        $query_k = mysqli_query($koneksi, $sql_k);
                        while($data_k = mysqli_fetch_row($query_k)){
                                $id_kat = $data_k[0];
                                $kat = $data_k[1];
                    ?>
                    <a class="dropdown-item" href="index.php?include=daftar-buku-kategori&data=<?php echo $id_kat;?>"><?php echo $kat;?></a>
                    <?php }?>
                    <!-- <a class="dropdown-item" href="index.php?include=daftar-buku">PHP</a>
                    <a class="dropdown-item" href="index.php?include=daftar-buku">HTML</a> -->
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?include=blog">Blog</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?include=contact-us">Contact Us</a>
            </li>
        </ul>
        <form class="form-inline mt-2 mt-md-0">
            <input type="text" class="form-control mr-sm-2" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
        </form>    
        </div>
    </div>
</nav> 
    