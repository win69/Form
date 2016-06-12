<html>
    <body>
        <form method ="post" action ="index.php">
            <table width="500" border="0" cellspacing="1" cellpadding="2">
                <tr>
                    <td width ="100">id</td>
                    <td><input name ="id" type ="text" id="id"></td>
                </tr>
                
                <tr>
                    <td width ="250">Judul_Buku</td>
                    <td><input name ="Nama_buku" type ="text" id ="Judul Buku"</td>
                </tr>
                
                <tr>
                    <td width ="250">harga</td>
                    <td><input name ="harga" type ="text" id ="harga"</td>
                </tr>
                
                <tr>
                   <td width ="250">pengarang</td>
                   <td><input name ="pengarang" type ="text" id ="pengarang"</td>
                </tr>
                
                <tr>
                    <td width="150"></td>
                    <td><input name = "simpan" type="submit" id="simpan" value ="simpan">
                    </td>
                </tr>
                
            </table>
        </form>
          
  <?php
  if (isset($_POST["simpan"]))
  {
      $host ="localhost";
      $user ="root";
      $password ="";
      $database ="database_penjualan_buku";
      $konek = mysqli_connect ($host, $user, $password, $database);
      //mysql_select_db($database);
      
  if ($konek) {
    
      echo "<b>koneksi berhasil!</b>";
  }else {
      echo "<b>koneksi gagal!</b>";    
  }
  
  if (! get_magic_quotes_gpc())
  {   
      $id =addslashes($_POST['id']);
      $judulbuku =addslashes($_POST['Nama_buku']);
      $harga =addslashes($_POST['harga']);
      $pengarang =addslashes($_POST['pengarang']);
  } else {
      $id =$_POST['id'];
      $judulbuku =$_POST['Nama_buku'];
      $harga =$_POST['harga'];
      $pengarang =$_POST['pengarang'];
 //Memasukkan data kedalam tabel daftar buku
            $sql = "INSERT INTO daftar_buku ".
                   "(id,Judul_Buku, harga,pengarang) ".
                   "VALUES('$id','$judulbuku','$harga','$pengarang')";
            mysqli_select_db('database_penjualan_buku');
            $tambahdata = mysql_query( $sql, $koneksi );
            if(! $tambahdata )
            {
              die('Gagal Tambah Data: ' . mysql_error());
            }
            echo "Berhasil tambah data\n <br>";
         //Mengambil data dari tabel nama buku
            $sql = "SELECT id_buku, judul_buku, pengarang, harga FROM daftar_buku";
            mysql_select_db('nama_buku');
            $hasil = mysql_query($sql);
            
            // Hasil Inputan
            while ( $row = mysql_fetch_assoc($hasil) ) {
                
                echo "id: " . $row["Judul_Buku"]. " harga: " . $row["harga"]. $row["pengarang"];
            }
            mysql_close($koneksi);
            
  }
  }
  ?>
    </body>
</html>