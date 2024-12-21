<?php
// memanggil library FPDF
require('fpdf186/fpdf.php');

// instance object dan pengaturan halaman PDF
$pdf = new FPDF('L', 'mm', 'A5'); // 'L' untuk landscape
$pdf->AddPage();

// setting font
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(190, 7, 'SEKOLAH MENENGAH KEJURUSAN NEGERI 2 SURABAYA', 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(190, 7, 'DAFTAR SISWA KELAS IX JURUSAN REKAYASA PERANGKAT LUNAK', 0, 1, 'C');

// Memberikan space ke bawah
$pdf->Ln(5); // gunakan Ln() untuk jarak antar baris

// Header tabel
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30, 8, 'NIM', 1, 0, 'C'); // Lebar 30 mm
$pdf->Cell(80, 8, 'NAMA MAHASISWA', 1, 0, 'C'); // Lebar 80 mm
$pdf->Cell(40, 8, 'JENIS KELAMIN', 1, 0, 'C'); // Lebar 40 mm
$pdf->Cell(40, 8, 'NO HP', 1, 1, 'C'); // Lebar 40 mm

// Isi tabel
$pdf->SetFont('Arial', '', 10);
include 'koneksi.php';

$mahasiswa = mysqli_query($connect, "SELECT * FROM mahasiswa");
while ($row = mysqli_fetch_array($mahasiswa)) {
    $pdf->Cell(30, 8, $row['nim'], 1, 0, 'C');
    $pdf->Cell(80, 8, $row['nama'], 1, 0); // Tidak rata tengah
    $pdf->Cell(40, 8, $row['jenis_kelamin'], 1, 0, 'C');
    $pdf->Cell(40, 8, $row['no_telp'], 1, 1, 'C');
}

// Output PDF
$pdf->Output();
?>
