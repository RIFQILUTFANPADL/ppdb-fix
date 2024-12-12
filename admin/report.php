<?php
include('../dbconnect.php');
$u = $_GET['u'];
$cekdulu = mysqli_query($conn, "select * from userdata where nisn='$u'");
$ambil = mysqli_fetch_array($cekdulu);

// Get alamat
$prov = mysqli_fetch_array(mysqli_query($conn, "select name from provinces where id='{$ambil['provinsi']}'"))['name'];
$kab = mysqli_fetch_array(mysqli_query($conn, "select name from regencies where id='{$ambil['kabupaten']}'"))['name'];
$kec = mysqli_fetch_array(mysqli_query($conn, "select name from districts where id='{$ambil['kecamatan']}'"))['name'];
$kel = mysqli_fetch_array(mysqli_query($conn, "select name from villages where id='{$ambil['kelurahan']}'"))['name'];

require_once("../dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();

$html = '
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body { font-family: Arial, sans-serif; }
        h2 { text-align: center; }
        h3 { text-align: center; }
        h5 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { text-align: left; padding: 8px; border: 1px solid #ddd; }
        .section-title { font-size: 8px; font-weight: bold; margin-top: 20px; }
        img { max-width: 200px; height: auto; margin-top: 10px; }
        .signature { 
            text-align: right;
            font-weight: bold;
        }
        .signature img { 
            max-width: 150px; 
            height: auto;
            margin-top: 10px; 
        }
        .signature p { 
            margin: 5px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <h2>YAYASAN    NAUFAL    LABIB</h2>
    <br/>
    <h3>Sk.Kemenhumham : Ahu-001697.Ah.04</h3>
    <br/>
    <h3>PENDIDIKAN ANAK USIA DINI (PAUD) KELOMPOK BERMAIN</h3>
    <br/>
    <h3>SILIH ASUH</h3>
    <br/>
    <h5>NPSN: 69927128  Ijin Operasional No.421.1/3531-Disdik 2019</h5>
    <br/>
    <h5>Sekretariat: Kp. Beulahnangka RT.002 RW.007 Desa Padaasih Kec. PasirwangiGarut</h5>
    <br/>
<br/>
<hr/>
    <table>
        <tr><th>NISN</th><td>' . $u . '</td></tr>
        <tr><th>NIK</th><td>' . $ambil['nik'] . '</td></tr>
        <tr><th>Nama Lengkap</th><td>' . $ambil['namalengkap'] . '</td></tr>
        <tr><th>Jenis Kelamin</th><td>' . $ambil['jeniskelamin'] . '</td></tr>
        <tr><th>Tempat, Tanggal Lahir</th><td>' . $ambil['tempatlahir'] . ', ' . $ambil['tanggallahir'] . '</td></tr>
        <tr><th>Alamat Lengkap</th><td>' . $ambil['alamat'] . '</td></tr>
        <tr><th>Provinsi</th><td>' . $prov . '</td></tr>
        <tr><th>Kabupaten</th><td>' . $kab . '</td></tr>
        <tr><th>Kecamatan</th><td>' . $kec . '</td></tr>
        <tr><th>Kelurahan</th><td>' . $kel . '</td></tr>
        <tr><th>Agama</th><td>' . $ambil['agama'] . '</td></tr>
        <tr><th>No Telepon</th><td>' . $ambil['telepon'] . '</td></tr>
    </table>

    <table>
        <tr><th>NPSN Sekolah Asal</th><td>' . $ambil['sekolahnpsn'] . '</td></tr>
        <tr><th>Nama Sekolah Asal</th><td>' . $ambil['sekolahnama'] . '</td></tr>
        <tr><th>Scan Ijazah Depan</th><td><img src="../user/' . $ambil['scanaktekelahiran'] . '"></td></tr>
        <tr><th>Scan Ijazah Belakang</th><td><img src="../user/' . $ambil['scankartukeluarga'] . '"></td></tr>
    </table>

    <div class="signature">
        <p>Tanda Tangan:</p>
        <br/><br/><br/><br/>
        <p> . Kepala Sekolah . </p>
    </div>
</body>
</html>';

$dompdf->loadHtml($html);
$dompdf->setPaper('F4', 'portrait');
$dompdf->render();
$dompdf->stream($u . '.pdf');
?>
