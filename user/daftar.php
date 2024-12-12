<!doctype html>
<html class="no-js" lang="en">

<?php 
// ini_set('display_errors', 1);
// error_reporting(E_ALL);

    include '../dbconnect.php';
    include '../cek.php';
    if($role!=='User'){
        header("location:../login.php");
        exit();
    };
    $userid = $_SESSION['userid'];

    include 'submit.php';

    // Cek dulu sudah pernah submit belum
    $cekdulu = mysqli_query($conn, "SELECT * FROM userdata WHERE userid='$userid'");
    $lihathasil = mysqli_num_rows($cekdulu);
    
    // Kalau sudah pernah submit
    if($lihathasil > 0){
        header("location:mydata.php");
        exit();
    }
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Paud Silih Asuh: Pendaftaran</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="../assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/themify-icons.css">
    <link rel="stylesheet" href="../assets/css/metisMenu.css">
    <link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/css/slicknav.min.css">
    <link rel="stylesheet" href="../assets/select2-4.0.6-rc.1/dist/css/select2.min.css">
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-144808195-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-144808195-1');
    </script>
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="../assets/css/typography.css">
    <link rel="stylesheet" href="../assets/css/default-css.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="../assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please 
            <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                    <a href="index.php"><img src="../assets/img/logo.png" alt="logo" width="100%"></a>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li><a href="index.php"><span>Dashboard</span></a></li>
                            <li class="active">
                                <a href="daftar.php"><i class="ti-layout"></i><span>Pendaftaran</span></a>
                            </li>
                            <li>
                                <a href="../logout.php"><span>Logout</span></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                            <li>
                                <h3>
                                    <div class="date">
                                        <script type='text/javascript'>
                                            var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                                            var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                                            var date = new Date();
                                            var day = date.getDate();
                                            var month = date.getMonth();
                                            var thisDay = date.getDay(),
                                                thisDay = myDays[thisDay];
                                            var yy = date.getYear();
                                            var year = (yy < 1000) ? yy + 1900 : yy;
                                            document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);        
                                        </script>
                                    </div>
                                </h3>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- header area end -->
            
            <!-- page title area end -->
            <div class="main-content-inner">

                <!-- panduan -->
                <div class="row mt-5 mb-5">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-center">
                                    <h2>Pendaftaran</h2>
                                </div>
                                <div class="market-status-table mt-4">
                                    <div class="table-responsive">
                                        Selamat datang di sistem informasi Penerimaan Peserta Didik Baru (PPDB) Online.
                                        <br>Sistem ini disusun oleh Paud Silih Asuh
                                        <br><br>
                                        Panduan Pendaftaran:
                                        <br>1. Isi seluruh formulir yang ditampilkan kemudian periksa kembali, pastikan tidak ada data yang salah.
                                        <br>2. Klik submit dan cek ulang lagi data form yang telah di submit jika sudah sesuai kemudian klik Confirm. 
                                            Setelah di-confirm, data tidak dapat diubah kembali.
                                        <br>3. Jika sudah, bukti pendaftaran akan ditampilkan dan dapat diunduh menjadi PDF
                                        <br>
                                        <br>*Note: Pihak sekolah baru akan menerima data Anda setelah Anda klik 'Confirm'
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


<!------------------ Pisahin ------------------->


<form method="post" enctype="multipart/form-data">
    <!-- Formulir -->
    <div class="row mt-5 mb-5">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!-- Data Pribadi -->
                    <div class="d-sm-flex justify-content-between align-items-center">
                        <h2>Data Pribadi</h2>
                        <p>* Data yang telah diconfrim tidak dapat diubah kembali, harap isi dengan teliti dan benar</p>
                    </div>
                    <div class="market-status-table mt-4">
                        <div class="table-responsive" style="overflow-x:hidden;">
                            <!-- NISN dan NIK -->
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>NISN* (sesuaikan dengan data dari web <a href="http://nisn.data.kemdikbud.go.id/kartu" target="_blank">NISN</a>)</label>
                                        <input name="nisn" id="nisn" type="text" class="form-control" placeholder="NISN" maxlength="10" 
                                            required oninput="validateNumber(this)" pattern="\d{10}" title="NISN harus terdiri dari 10 angka">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>NIK* (sesuaikan dengan akte kelahiran/ijazah)</label>
                                        <input name="nik" type="text" class="form-control" placeholder="NIK" maxlength="16" required oninput="validateNumber(this)" pattern="\d{16}" title="NIK harus terdiri dari 16 angka">
                                    </div>
                                </div>
                            </div>

                            <!-- Nama Lengkap dan Jenis Kelamin -->
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Nama Lengkap* (sesuaikan dengan akte kelahiran/ijazah)</label>
                                        <input name="namalengkap" type="text" class="form-control" placeholder="Nama Lengkap" maxlength="50" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Jenis Kelamin*</label>
                                        <select class="form-control" name="jeniskelamin" required>
                                            <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                            <option value="L">Laki-laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Tempat Lahir dan Tanggal Lahir -->
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Tempat Lahir*</label>
                                        <input name="tempatlahir" type="text" class="form-control" placeholder="Tempat Lahir" maxlength="20" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Tanggal Lahir*</label>
                                        <input name="tgllahir" type="date" class="form-control" required>
                                    </div>
                                </div>
                            </div>

                            <!-- Jenis Tempat Tinggal dan Status Keluarga -->
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Jenis Tempat Tinggal*</label>
                                        <select class="form-control" name="tempattinggal" required>
                                            <option value="" disabled selected>Pilih Jenis Tempat Tinggal</option>
                                            <option value="Asrama Madrasah">Asrama Madrasah</option>
                                            <option value="Kontrak_Kost">Kontrak/Kost</option>
                                            <option value="Asrama_Pesantren">Asrama/Pesantren</option>
                                            <option value="Panti_Asuhan">Panti Asuhan</option>
                                            <option value="Rumah_Singgah">Rumah Singgah</option>
                                            <option value="Rumah_Pribadi">Rumah Pribadi</option>
                                            <option value="Lainnya">Lainnya</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Status Keluarga*</label>
                                        <select class="form-control" name="statuskeluarga" required>
                                            <option value="" disabled selected>Pilih Status Keluarga</option>
                                            <option value="Anak_Kandung">Anak Kandung</option>
                                            <option value="Anak_Angkat">Anak Angkat</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Anak Ke dan Jumlah Saudara -->
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Anak Ke*</label>
                                        <select name="anakke" class="form-control" required>
                                            <option value="" disabled selected>Pilih</option>
                                            <?php for ($i = 1; $i <= 12; $i++): ?>
                                                <option value="<?= $i ?>"><?= $i ?></option>
                                            <?php endfor; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Jumlah Saudara*</label>
                                        <select name="jumlahsaudara" class="form-control" required>
                                            <option value="" disabled selected>Pilih</option>
                                            <?php for ($i = 1; $i <= 12; $i++): ?>
                                                <option value="<?= $i ?>"><?= $i ?></option>
                                            <?php endfor; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Hobi dan Cita-Cita -->
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Hobi*</label>
                                        <select class="form-control" name="hobi" required>
                                            <option value="" disabled selected>Pilih Hobi</option>
                                            <option value="Membaca">Membaca</option>
                                            <option value="Menulis">Menulis</option>
                                            <option value="Olah_Raga">Olah Raga</option>
                                            <option value="Kesenian">Kesenian</option>
                                            <option value="Traveling">Traveling</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Cita-Cita*</label>
                                        <select class="form-control" name="citacita" required>
                                            <option value="" disabled selected>Pilih Cita-Cita</option>
                                            <option value="PNS">PNS</option>
                                            <option value="Guru_Dosen">Guru/Dosen</option>
                                            <option value="TNI">TNI</option>
                                            <option value="Polri">Polri</option>
                                            <option value="Politikus">Politikus</option>
                                            <option value="Dokter">Dokter</option>
                                            <option value="Pilot">Pilot</option>
                                            <option value="Wiraswasta">Wiraswasta</option>
                                            <option value="Pekerja_Seni">Pekerja Seni/Lukis/Artis/Sejenis</option>
                                            <option value="Lainnya">Lainnya</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- PAUD dan TK -->
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>PAUD*</label>
                                        <select class="form-control" name="paud" required>
                                            <option value="" disabled selected>Pilih PAUD</option>
                                            <option value="Pernah">Pernah</option>
                                            <option value="Tidak_Pernah">Tidak Pernah</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>TK*</label>
                                        <select class="form-control" name="tk" required>
                                            <option value="" disabled selected>Pilih TK</option>
                                            <option value="Pernah">Pernah</option>
                                            <option value="Tidak_Pernah">Tidak Pernah</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Agama dan No Telepon -->
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Agama*</label>
                                        <select class="form-control" name="agama" required>
                                            <option value="" disabled selected>Pilih Agama</option>
                                            <option value="Islam">Islam</option>
                                            <option value="Kristen">Kristen</option>
                                            <option value="Katolik">Katolik</option>
                                            <option value="Buddha">Buddha</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Konghucu">Konghucu</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>No Telepon*</label>
                                        <input name="telepon" type="text" class="form-control" maxlength="15" pattern="\d{10,15}" title="Nomor telepon harus terdiri dari 10-15 angka" required oninput="validateNumber(this)">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!------------------ Pisahin ------------------->

    <!-- Data Alamat -->
    <div class="row mt-5 mb-5">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-sm-flex justify-content-between align-items-center">
                        <h2>Data Alamat</h2>
                    </div>
                    <div class="market-status-table mt-4">
                        <div class="table-responsive" style="overflow-x:hidden;">
                            <!-- Jarak Ke Sekolah dan Transportasi -->
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Jarak Ke Sekolah ?*</label>
                                        <select class="form-control" name="jaraksekolah" required>
                                            <option value="" disabled selected>Pilih Jarak Siswa Ke Sekolah</option>
                                            <option value="Kurang_Dari_5KM">Kurang Dari 5KM</option>
                                            <option value="Lebih_Dari_5KM">Lebih Dari 5KM</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Transportasi Yang Digunakan ?*</label>
                                        <select class="form-control" name="transportasi" required>
                                            <option value="" disabled selected>Pilih Transportasi Yang Digunakan Ke Sekolah</option>
                                            <option value="Jalan_Kaki">Jalan Kaki</option>
                                            <option value="Kendaraan_Pribadi">Kendaraan Pribadi</option>
                                            <option value="Kendaraan_Umum">Kendaraan Umum</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Alamat Lengkap -->
                            <div class="form-group">
                                <label>Alamat Lengkap*</label>
                                <input name="alamat" type="text" class="form-control" placeholder="Alamat Lengkap" maxlength="255" required>
                            </div>

                            <!-- Provinsi dan Kota/Kabupaten -->
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Provinsi*:</label>
                                        <div class="col-sm-9">
                                            <?php                    
                                                $sql_provinsi = mysqli_query($conn, "SELECT * FROM provinces ORDER BY name ASC");
                                            ?>
                                            <select class="form-control" name="provinsi" id="provinsi" required>
                                                <option value="" disabled selected>Pilih Provinsi</option>
                                                <?php                       
                                                    while($rs_provinsi = mysqli_fetch_assoc($sql_provinsi)){ 
                                                        echo '<option value="'.$rs_provinsi['id'].'">'.$rs_provinsi['name'].'</option>';
                                                    }                        
                                                ?>
                                            </select>
                                            <img src="../assets/img/loading.gif" width="35" id="load1" style="display:none;" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Kota/Kabupaten*:</label>
                                        <div class="col-sm-9">          
                                            <select class="form-control" name="kota" id="kota" required>
                                                <option value="" disabled selected>Pilih Kota/Kabupaten</option>
                                            </select>
                                            <img src="../assets/img/loading.gif" width="35" id="load2" style="display:none;" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Kecamatan dan Kelurahan -->
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Kecamatan*:</label>
                                        <div class="col-sm-9">          
                                            <select class="form-control" name="kecamatan" id="kecamatan" required>
                                                <option value="" disabled selected>Pilih Kecamatan</option>
                                            </select>
                                            <img src="../assets/img/loading.gif" width="35" id="load3" style="display:none;" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Kelurahan*:</label>
                                        <div class="col-sm-9">          
                                            <select class="form-control" name="kelurahan" id="kelurahan" required>
                                                <option value="" disabled selected>Pilih Kelurahan</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>                       
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!------------------ Pisahin ------------------->

    <!-- Data Orang Tua -->
    <div class="row mt-5 mb-5">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-sm-flex justify-content-between align-items-center">
                        <h2>Data Orang Tua</h2>
                    </div>
                    <div class="market-status-table mt-4">
                        <div class="table-responsive" style="overflow-x:hidden;">
                            <!-- Data Ayah -->
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>NIK Ayah*</label>
                                        <input name="ayahnik" type="text" class="form-control" placeholder="NIK Ayah" maxlength="16" required oninput="validateNumber(this)" pattern="\d{16}" title="NIK Ayah harus terdiri dari 16 angka">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Nama Ayah*</label>
                                        <input name="ayahnama" type="text" class="form-control" placeholder="Nama Ayah" maxlength="40" required>
                                    </div>
                                </div>
                            </div>

                            <!-- Pendidikan dan Pekerjaan Ayah -->
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Pendidikan Ayah</label>
                                        <select class="form-control" name="ayahpendidikan" required>
                                            <option value="" disabled selected>Pilih Pendidikan Ayah</option>
                                            <option value="SD">SD</option>
                                            <option value="SMP">SMP</option>
                                            <option value="SMA">SMA/SMK/Sederajat</option>
                                            <option value="S1">S1/Sederajat</option>
                                            <option value="S2">S2</option>
                                            <option value="S3">S3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Pekerjaan Ayah</label>
                                        <select class="form-control" name="ayahpekerjaan" required>
                                            <option value="" disabled selected>Pilih Pekerjaan Ayah</option>
                                            <option value="Tidak_Bekerja">Tidak Bekerja</option>
                                            <option value="PNS">PNS</option>
                                            <option value="Wiraswasta">Wiraswasta</option>
                                            <option value="Pegawai_Swasta">Pegawai Swasta</option>
                                            <option value="PHL">Pekerja Harian Lepas</option>
                                            <option value="TNI_Polri">TNI/Polri</option>
                                            <option value="Buruh">Buruh</option>
                                            <option value="Pensiun">Pensiun</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Penghasilan dan No Telepon Ayah -->
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Penghasilan Ayah per bulan</label>
                                        <select class="form-control" name="ayahpenghasilan" required>
                                            <option value="" disabled selected>Pilih Penghasilan Ayah</option>
                                            <option value="<500000">&lt; Rp500.000</option>
                                            <option value="500000-1500000">Rp500.000 - Rp1.500.000</option>
                                            <option value="1500000-3500000">Rp1.500.000 - Rp3.500.000</option>
                                            <option value="3500000-5000000">Rp3.500.000 - Rp5.000.000</option>
                                            <option value="5000000-10000000">Rp5.000.000 - Rp10.000.000</option>
                                            <option value="10000000-20000000">Rp10.000.000 - Rp20.000.000</option>
                                            <option value=">20000000">&gt; Rp20.000.000</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>No Telepon Ayah</label>
                                        <input name="ayahtelepon" type="text" class="form-control" maxlength="15" oninput="validateNumber(this)" pattern="\d{10,15}" title="Nomor telepon harus terdiri dari 10-15 angka">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <hr>
                            <br>

                            <!-- Data Ibu -->
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>NIK Ibu*</label>
                                        <input name="ibunik" type="text" class="form-control" placeholder="NIK Ibu" maxlength="16" required oninput="validateNumber(this)" pattern="\d{16}" title="NIK Ibu harus terdiri dari 16 angka">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Nama Ibu*</label>
                                        <input name="ibunama" type="text" class="form-control" placeholder="Nama Ibu" maxlength="40" required>
                                    </div>
                                </div>
                            </div>

                            <!-- Pendidikan dan Pekerjaan Ibu -->
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Pendidikan Ibu</label>
                                        <select class="form-control" name="ibupendidikan" required>
                                            <option value="" disabled selected>Pilih Pendidikan Ibu</option>
                                            <option value="SD">SD</option>
                                            <option value="SMP">SMP</option>
                                            <option value="SMA">SMA/SMK/Sederajat</option>
                                            <option value="S1">S1/Sederajat</option>
                                            <option value="S2">S2</option>
                                            <option value="S3">S3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Pekerjaan Ibu</label>
                                        <select class="form-control" name="ibupekerjaan" required>
                                            <option value="" disabled selected>Pilih Pekerjaan Ibu</option>
                                            <option value="Tidak_Bekerja">Ibu Rumah Tangga</option>
                                            <option value="PNS">PNS</option>
                                            <option value="Wiraswasta">Wiraswasta</option>
                                            <option value="Pegawai_Swasta">Pegawai Swasta</option>
                                            <option value="PHL">Pekerja Harian Lepas</option>
                                            <option value="TNI_Polri">TNI/Polri</option>
                                            <option value="Buruh">Buruh</option>
                                            <option value="Pensiun">Pensiun</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Penghasilan dan No Telepon Ibu -->
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Penghasilan Ibu per bulan</label>
                                        <select class="form-control" name="ibupenghasilan" required>
                                            <option value="" disabled selected>Pilih Penghasilan Ibu</option>
                                            <option value="<500000">&lt; Rp500.000</option>
                                            <option value="500000-1500000">Rp500.000 - Rp1.500.000</option>
                                            <option value="1500000-3500000">Rp1.500.000 - Rp3.500.000</option>
                                            <option value="3500000-5000000">Rp3.500.000 - Rp5.000.000</option>
                                            <option value="5000000-10000000">Rp5.000.000 - Rp10.000.000</option>
                                            <option value="10000000-20000000">Rp10.000.000 - Rp20.000.000</option>
                                            <option value=">20000000">&gt; Rp20.000.000</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>No Telepon Ibu</label>
                                        <input name="ibutelepon" type="text" class="form-control" maxlength="15" oninput="validateNumber(this)" pattern="\d{10,15}" title="Nomor telepon harus terdiri dari 10-15 angka">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <hr>
                            <br>

                            <!-- Data Wali -->
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>NIK Wali</label>
                                        <input name="walinik" type="text" class="form-control" placeholder="NIK Wali" maxlength="16" oninput="validateNumber(this)" pattern="\d{16}" title="NIK Wali harus terdiri dari 16 angka">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Nama Wali</label>
                                        <input name="walinama" type="text" class="form-control" placeholder="Nama Wali" maxlength="40">
                                    </div>
                                </div>
                            </div>

                            <!-- Pekerjaan dan No Telepon Wali -->
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Pekerjaan Wali</label>
                                        <select class="form-control" name="walipekerjaan" required>
                                            <option value="" disabled selected>Pilih Pekerjaan Wali</option>
                                            <option value="Tidak_Bekerja">Tidak Bekerja</option>
                                            <option value="PNS">PNS</option>
                                            <option value="Wiraswasta">Wiraswasta</option>
                                            <option value="Pegawai_Swasta">Pegawai Swasta</option>
                                            <option value="PHL">Pekerja Harian Lepas</option>
                                            <option value="TNI_Polri">TNI/Polri</option>
                                            <option value="Buruh">Buruh</option>
                                            <option value="Pensiun">Pensiun</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>No Telepon Wali</label>
                                        <input name="walitelepon" type="text" class="form-control" maxlength="15" oninput="validateNumber(this)" pattern="\d{10,15}" title="Nomor telepon harus terdiri dari 10-15 angka">
                                        <input type="hidden" value="<?=$userid;?>" name="id">
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>


<!------------------ Pisahin ------------------->

    <!-- Syarat Wajib & Berkas -->
    <div class="row mt-5 mb-5">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-sm-flex justify-content-between align-items-center">
                        <h2>Syarat Wajib & Berkas</h2>
                        <p>Data yang telah diconfrim tidak dapat diubah kembali</p>
                    </div>
                    <div class="market-status-table mt-4">
                        <div class="table-responsive" style="overflow-x:hidden;">
                            <!-- NISN dan NIK Syarat -->
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Nomor Akte</label>
                                        <input name="sekolahnpsn" type="text" class="form-control" placeholder="Nomor Akte" maxlength="16" required oninput="validateNumber(this)" pattern="\d{16}" title="Nomor Akte harus terdiri dari 16 angka">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Nomor KK</label>
                                        <input name="sekolahnama" type="text" class="form-control" placeholder="No KK" maxlength="16" required oninput="validateNumber(this)" pattern="\d{16}" title="No KK harus terdiri dari 16 angka">
                                    </div>
                                </div>
                            </div>

                            <!-- Pas Foto -->
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="foto" class="form-control-label">Pas Foto 4x6 (JPG/PNG), maks 500kb</label>
                                        <input type="file" id="foto" name="foto" class="form-control-file" accept=".jpg, .jpeg, .png" >
                                    </div>
                                </div>
                            </div>

                            <!-- Scan Akte Kelahiran dan Kartu Keluarga -->
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="scanaktekelahiran" class="form-control-label">Scan Akte Kelahiran (JPG/PNG), maks 500kb</label>
                                        <input type="file" id="scanaktekelahiran" name="scanaktekelahiran" class="form-control-file" accept=".jpg, .jpeg, .png" >
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="scankartukeluarga" class="form-control-label">Scan Kartu Keluarga (JPG/PNG), maks 500kb</label>
                                        <input type="file" id="scankartukeluarga" name="scankartukeluarga" class="form-control-file" accept=".jpg, .jpeg, .png" >
                                    </div>
                                </div>
                            </div>

                            <!-- Submit dan Konfirmasi -->
                            <div class="modal-footer">
                                <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

                
                    
                <!-- row area start-->
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <footer>
            <div class="footer-area">
                <p>PPDB Online by Paud Silih Asuh</p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->

    <!-- jquery latest version -->
    <script src="../assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/owl.carousel.min.js"></script>
    <script src="../assets/js/metisMenu.min.js"></script>
    <script src="../assets/js/jquery.slimscroll.min.js"></script>
    <script src="../assets/js/jquery.slicknav.min.js"></script>

    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- start zingchart js -->
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
    zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>
    <!-- all line chart activation -->
    <script src="../assets/js/line-chart.js"></script>
    <!-- all pie chart -->
    <script src="../assets/js/pie-chart.js"></script>
    <!-- others plugins -->
    <script src="../assets/js/plugins.js"></script>
    <script src="../assets/js/scripts.js"></script>
    <script src="../assets/select2-4.0.6-rc.1/dist/js/select2.min.js"></script>   
    <script src="../assets/select2-4.0.6-rc.1/dist/js/i18n/id.js"></script>   
    <script src="../assets/js/app.js"></script>

    <!-- Script untuk Validasi Angka -->
    <script>
        function validateNumber(input) {
            // Hanya izinkan angka
            input.value = input.value.replace(/\D/g, '');
        }
    </script>
</body>

</html>
