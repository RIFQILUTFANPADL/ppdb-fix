<?php
// ini_set('display_errors', 1);
// error_reporting(E_ALL);


if (isset($_POST['submit'])) {
    $nisn = $_POST['nisn'];
    $nik = $_POST['nik'];
    $namalengkap = $_POST['namalengkap'];
    $kelamin = $_POST['jeniskelamin'];
    $userid = $_POST['id'];

    $tempattinggal = $_POST['tempattinggal'];
    $statuskeluarga = $_POST['statuskeluarga'];
    $anakke = $_POST['anakke'];
    $jumlahsaudara = $_POST['jumlahsaudara'];
    $hobi = $_POST['hobi'];
    $citacita = $_POST['citacita'];
    $paud = $_POST['paud'];
    $tk = $_POST['tk'];
    $jaraksekolah = $_POST['jaraksekolah'];
    $transportasi = $_POST['transportasi'];

    $tempatlahir = $_POST['tempatlahir'];
    $tgllahir = $_POST['tgllahir'];
    $alamat = $_POST['alamat'];
    $provinsi = $_POST['provinsi'];
    $kota = $_POST['kota'];
    $kecamatan = $_POST['kecamatan'];
    $kelurahan = $_POST['kelurahan'];

    $agama = $_POST['agama'];
    $telepon = $_POST['telepon'];

    $ayahnik = $_POST['ayahnik'];
    $ayahnama = $_POST['ayahnama'];
    $ayahpendidikan = $_POST['ayahpendidikan'];
    $ayahpekerjaan = $_POST['ayahpekerjaan'];
    $ayahpenghasilan = $_POST['ayahpenghasilan'];
    $ayahtelepon = $_POST['ayahtelepon'];

    $ibunik = $_POST['ibunik'];
    $ibunama = $_POST['ibunama'];
    $ibupendidikan = $_POST['ibupendidikan'];
    $ibupekerjaan = $_POST['ibupekerjaan'];
    $ibupenghasilan = $_POST['ibupenghasilan'];
    $ibutelepon = $_POST['ibutelepon'];

    $walinik = $_POST['walinik'];
    $walinama = $_POST['walinama'];
    $walipekerjaan = $_POST['walipekerjaan'];
    $walitelepon = $_POST['walitelepon'];

    $sekolahnpsn = $_POST['sekolahnpsn'];
    $sekolahnama = $_POST['sekolahnama'];
    $foto = 'foto_' . $nisn;
    $ijazahdepan = 'ijazahdpn_' . $nisn;
    $ijazahbelakang = 'ijazahblkg_' . $nisn;

    // Perihal gambar
    $nama_file_foto = $_FILES['foto']['name'];
    $nama_file_idpn = $_FILES['scanaktekelahiran']['name'];
    $nama_file_iblkg = $_FILES['scankartukeluarga']['name'];
    $ext1 = pathinfo($nama_file_foto, PATHINFO_EXTENSION);
    $ext2 = pathinfo($nama_file_idpn, PATHINFO_EXTENSION);
    $ext3 = pathinfo($nama_file_iblkg, PATHINFO_EXTENSION);
    $ukuran_file_foto = $_FILES['foto']['size'];
    $ukuran_file_idpn = $_FILES['scanaktekelahiran']['size'];
    $ukuran_file_iblkg = $_FILES['scankartukeluarga']['size'];
    $ukurantotal = $ukuran_file_foto + $ukuran_file_idpn + $ukuran_file_iblkg;
    $tipe_file = $_FILES['foto']['type'];
    $tmp_file = $_FILES['foto']['tmp_name'];
    $tmp_file2 = $_FILES['scanaktekelahiran']['tmp_name'];
    $tmp_file3 = $_FILES['scankartukeluarga']['tmp_name'];
    $path_foto = "images/foto/" . $foto . '.' . $ext1;
    $path_idpn = "images/ijazahdepan/" . $ijazahdepan . '.' . $ext2;
    $path_iblkg = "images/ijazahbelakang/" . $ijazahbelakang . '.' . $ext3;

    if ($_FILES['foto']['error'] == UPLOAD_ERR_OK) {
        // Proses upload file foto
        echo "Tipe file: " . $tipe_file . "<br>";
        echo "Ukuran file: " . $ukuran_file_foto . " bytes<br>";
        echo "Ukuran total file: " . $ukurantotal . " bytes<br>";
        echo "Extensi file: " . $ext1 . "<br>";

        if ($tipe_file == "image/jpeg" || $tipe_file == "image/png") {
            if ($ukurantotal <= 3600000) {
                $upload = move_uploaded_file($tmp_file, $path_foto);
                $upload2 = move_uploaded_file($tmp_file2, $path_idpn);
                $upload3 = move_uploaded_file($tmp_file3, $path_iblkg);

                if ($upload && $upload2 && $upload3) {
                    $submitdata = mysqli_query($conn, "INSERT INTO userdata (userid, nisn, nik, namalengkap, jeniskelamin, tempattinggal, statuskeluarga, anakke, jumlahsaudara, hobi, citacita, paud, tk, jaraksekolah, transportasi, tempatlahir, tanggallahir, alamat, provinsi, kabupaten, kecamatan, kelurahan, agama, telepon, ayahnik, ayahnama, ayahpendidikan, ayahpekerjaan, ayahpenghasilan, ayahtelepon, ibunik, ibunama, ibupendidikan, ibupekerjaan, ibupenghasilan, ibutelepon, walinik, walinama, walipekerjaan, walitelepon, sekolahnpsn, sekolahnama, foto, scanaktekelahiran, scankartukeluarga)
                        VALUES ('$userid', '$nisn', '$nik', '$namalengkap', '$kelamin', '$tempattinggal', '$statuskeluarga', '$anakke', '$jumlahsaudara', '$hobi', '$citacita', '$paud', '$tk', '$jaraksekolah', '$transportasi', '$tempatlahir', '$tgllahir', '$alamat', '$provinsi', '$kota', '$kecamatan', '$kelurahan', '$agama', '$telepon', '$ayahnik', '$ayahnama', '$ayahpendidikan', '$ayahpekerjaan', '$ayahpenghasilan', '$ayahtelepon', '$ibunik', '$ibunama', '$ibupendidikan', '$ibupekerjaan', '$ibupenghasilan', '$ibutelepon', '$walinik', '$walinama', '$walipekerjaan', '$walitelepon', '$sekolahnpsn', '$sekolahnama', '$path_foto', '$path_idpn', '$path_iblkg')");

                    if ($submitdata) {
                        echo "<div class='alert alert-success'>Berhasil submit data.</div>";
                        echo "<meta http-equiv='refresh' content='2; url=daftar.php' />";
                    } else {
                        echo "<div class='alert alert-danger'>Gagal submit data. Silakan coba lagi nanti.</div>";
                        echo "<meta http-equiv='refresh' content='3; url=daftar.php' />";
                    }
                } else {
                    echo "<div class='alert alert-danger'>Gagal mengupload file. Pastikan ukuran file dan format sudah sesuai.</div>";
                }
            } else {
                echo "<div class='alert alert-danger'>Ukuran file total melebihi batas 1.5MB.</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>Format file gambar yang diizinkan hanya JPG atau PNG.</div>";
        }
    } 
  }



    //kalau update
    if(isset($_POST['update'])){
      $id = $_POST['id'];
      $alamat = $_POST['alamat'];
      $telepon = $_POST['telepon'];
      $ayahpendidikan = $_POST['ayahpendidikan'];
        $ayahpekerjaan = $_POST['ayahpekerjaan'];
        $ayahpenghasilan = $_POST['ayahpenghasilan'];
        $ayahtelepon = $_POST['ayahtelepon'];
      $ibupendidikan = $_POST['ibupendidikan'];
        $ibupekerjaan = $_POST['ibupekerjaan'];
        $ibupenghasilan = $_POST['ibupenghasilan'];
        $ibutelepon = $_POST['ibutelepon'];

      $walinik = $_POST['walinik'];
        $walinama = $_POST['walinama'];
        $walipekerjaan = $_POST['walipekerjaan'];
        $walitelepon = $_POST['walitelepon'];

    $update = mysqli_query($conn,"update userdata
    set alamat='$alamat', telepon='$telepon', ayahpendidikan='$ayahpendidikan', ayahpenghasilan='$ayahpenghasilan', ayahpekerjaan='$ayahpekerjaan',
    ayahtelepon='$ayahtelepon', ibupendidikan='$ibupendidikan', ibupekerjaan='$ibupekerjaan', ibupenghasilan='$ibupenghasilan', ibutelepon='$ibutelepon',
    walinik='$walinik', walinama='$walinama', walipekerjaan='$walipekerjaan', walitelepon='$walitelepon' where userid='$id'");

    if($update){ 

      //berhasil bikin
      echo " <div class='alert alert-success'>
              Berhasil submit data.
          </div>
          <meta http-equiv='refresh' content='1; url= mydata.php'/>  ";  

    }else{

      echo "<div class='alert alert-warning'>
              Gagal submit data. Silakan coba lagi nanti.
          </div>
          <meta http-equiv='refresh' content='3; url= mydata.php'/> ";
      }

    };



    
//get timezone jkt
date_default_timezone_set("Asia/Bangkok");
$today = date("Y-m-d"); //now

    //kalau konfirmasi
    if(isset($_POST['ok'])){
      $id = $_POST['id'];
      $updateaja = mysqli_query($conn,"update userdata set status='Verified', tglkonfirmasi='$today' where userid='$id'");

      if($updateaja){
        //berhasil bikin
          echo " <div class='alert alert-success'>
          Berhasil submit data.
      </div>
      <meta http-equiv='refresh' content='1; url= mydata.php'/>  ";  
      } else {
        echo "<div class='alert alert-warning'>
              Gagal submit data. Silakan coba lagi nanti.
          </div>
          <meta http-equiv='refresh' content='3; url= mydata.php'/> ";
      }
    };

?>