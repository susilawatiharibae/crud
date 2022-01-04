<?php
//Koneksi Database
    $server = "db4free.net";
    $user = "susilawati";
    $pass = "susilawati11-";
    $database = "double_s";
    
    $koneksi = mysqli_connect($server, $user, $pass, $database) or die (mysqli_error($koneksi));

//Jika tombol Simpan di Klik. 
//Untuk nama textnya jangan dispasi. Hubungkan dengan tanda '_' cth (tbhs_indo)
    if(isset($_POST['bsimpan']))
    {
        $simpan =mysqli_query($koneksi, "INSERT INTO nilai_siswa (nama, fisika, kimia, biologi, bhs.indo, bhs.inggris, bhs.arab, pkn, sejarah, matematika, kesenian, penjas)
                                         VALUES ('$_POST[tnama]', 
                                                 '$_POST[tfisika]', 
                                                 '$_POST[tkimia]',
                                                 '$_POST[tbiologi]',
                                                 '$_POST[tbhs_indo]',
                                                 '$_POST[tbhs_inggris]',
                                                 '$_POST[tbhs_arab]',
                                                 '$_POST[tpkn]',
                                                 '$_POST[tsejarah]',
                                                 '$_POST[tmatematika]',
                                                 '$_POST[tkesenian]',
                                                 '$_POST[tpenjas]')
                                ");
        if($simpan) //Jika Simpan Sukses!
        {
            echo "<script>
                    alert('Simpan Data Sukses!');
                    document.location= 'index.php';
                </script>";

        }
        else
        {
            echo "<script>
                    alert('Simpan Data GAGAL!');
                    document.location= 'index.php';
                </script>";
        }
    }    
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tugas Web Programming</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1 class="text-center">UAS WEB PROGRAMMING CRUD (Framework Bootstrap + Db4free.net)</h1>
    <h2 class="text-center">Susilawati Haribae (1905042)</h2>

    <!-- Awal Card Form -->
    <div class="card mt-3">
        <div class="card-header bg-primary text-white">
    Form Input Data Nilai Siswa Prodi IPA
    </div>
    <div class="card-body">
        <form method="post" action="">
            <div class="form-group">
                <label>Nama Siswa</label>
                <input type="text" name="tnama" class="form-control" placeholder="Input Nama Siswa Disini!" required>
            </div>
            <div class="form-group">
                <label>Fisika</label>
                <input type="text" name="tfisika" class="form-control" placeholder="Input Nilai Fisika Disini!" required>
             </div>
            <div class="form-group">
                <label>Kimia</label>
                <input type="text" name="tkimia" class="form-control" placeholder="Input Nilai Kimia Disini!" required>
            </div>
            <div class="form-group">
                <label>Biologi</label>
                <input type="text" name="tbiologi" class="form-control" placeholder="Input Nilai Biologi Disini!" required>
             </div>
             <div class="form-group">
                <label>Bhs Indo</label>
                <input type="text" name="tbhs_indo" class="form-control" placeholder="Input Nilai Bhs Indonesia Disini!" required>
             </div>
             <div class="form-group">
                <label>Bhs Inggris</label>
                <input type="text" name="tbhs_inggris" class="form-control" placeholder="Input Nilai Bhs Inggris Disini!" required>
             </div>
             <div class="form-group">
                <label>Bhs Arab</label>
                <input type="text" name="tbhs_arab" class="form-control" placeholder="Input Nilai Bhs Arab Disini!" required>
             </div>
             <div class="form-group">
                <label>PKN</label>
                <input type="text" name="tpkn" class="form-control" placeholder="Input Nilai PKN Disini!" required>
             </div>
             <div class="form-group">
                <label>Sejarah</label>
                <input type="text" name="tsejarah" class="form-control" placeholder="Input Nilai Sejarah Disini!" required>
             </div>
             <div class="form-group">
                <label>Matematika</label>
                <input type="text" name="tmatematika" class="form-control" placeholder="Input Nilai Matematika Disini!" required>
             </div>
             <div class="form-group">
                <label>Kesenian</label>
                <input type="text" name="tkesenian" class="form-control" placeholder="Input Nilai Kesenian Disini!" required>
             </div>
             <div class="form-group">
                <label>Penjas</label>
                <input type="text" name="tpenjas" class="form-control" placeholder="Input Nilai Penjas Disini!" required>
             </div>

            <button type="submit" class="btn btn-success" name="bsimpan">Simpan</button>
            <button type="reset" class="btn btn-danger" name="breset">Batalkan</button>
        </form>
    </div>
    </div>
    <!-- Akhir Card Form -->

    <!-- Awal Card Tabel -->
    <div class="card mt-3">
        <div class="card-header bg-success text-white">
        Daftar Nilai Siswa
        </div>
        <div class="card-body">
           
        <table class="table table-bordered table-striped">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Fisika</th>
                <th>Kimia</th>
                <th>Biologi</th>
                <th>Bhs Indo</th>
                <th>Bhs Inggris</th>
                <th>Bhs Arab</th>
                <th>PKN</th>
                <th>Sejarah</th>
                <th>Matematika</th>
                <th>Kesenian</th>
                <th>Penjas</th>
                <th>Aksi</th>
            </tr>
            <?php
                $no = 1;
                $tampil = mysqli_query($koneksi, "SELECT * from nilai_siswa order by id_siswa desc");
                while($data = mysqli_fetch_array($tampil)) :
            ?>
            <tr> 
                 <td><?=$no++;?></td>
                 <td><?=$data ['nama']?></td>
                 <td><?=$data ['fisika']?></td>
                 <td><?=$data ['kimia']?></td>
                 <td><?=$data ['biologi']?></td>
                 <td><?=$data ['bhs.indo']?></td>
                 <td><?=$data ['bhs.inggris']?></td>
                 <td><?=$data ['bhs.arab']?></td>
                 <td><?=$data ['pkn']?></td>
                 <td><?=$data ['sejarah']?></td>
                 <td><?=$data ['matematika']?></td>
                 <td><?=$data ['kesenian']?></td>
                 <td><?=$data ['penjas']?></td>
                 <td>
                    <a href= "" class="btn btn-warning" > Edit </a>
                    <a href= "" class= "btn btn-danger"> Hapus </a>
                 </td>      
            </tr>
            <?php endwhile; //Penutup perulangan while ?>
        </table>

        </div>
        </div>
    <!-- Akhir Card Tabel -->

</div>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>