<?php
require_once __DIR__ . '/libs/fpdf.php';
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/includes/db.php';

use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Writer\PngWriter;

$id = $_GET['id'] ?? null;
if (!$id || !is_numeric($id)) {
    die("ID inválido.");
}

// Obtener datos de la reparación
$stmt = $pdo->prepare("SELECT r.*, c.nombre AS cliente, c.email, t.nombre AS tecnico 
    FROM reparaciones r
    LEFT JOIN clientes c ON r.cliente_id = c.id
    LEFT JOIN tecnicos t ON r.tecnico_id = t.id
    WHERE r.id = ?");
$stmt->execute([$id]);
$rep = $stmt->fetch();

if (!$rep) {
    die("Reparación no encontrada.");
}

// Crear QR con URL de seguimiento
$url = "http://192.168.0.17/prueba/public/estado_resultado.php?id=$id";
$qr = Builder::create()
    ->writer(new PngWriter())
    ->data($url)
    ->size(300)
    ->margin(10)
    ->build();

$tempQrPath = tempnam(sys_get_temp_dir(), 'qr_') . '.png';
file_put_contents($tempQrPath, $qr->getString());

// Crear PDF
$pdf = new FPDF();
$pdf->AddPage();
$pdf->Image('assets/images/logo.png', 10, 10, 30); // Logo superior

$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,10,utf8_decode("Taller de Reparaciones - Recibo Nro: $id"),0,1,'C');
$pdf->Ln(15);

// Datos del cliente y reparación
$pdf->SetFont('Arial','',12);
$pdf->SetFillColor(235, 242, 255); // Azul muy claro

$fields = [
    "Cliente:" => $rep['cliente'],
    "Email:" => $rep['email'],
    "Dispositivo:" => $rep['dispositivo'],
    "Estado:" => ucfirst($rep['estado']),
    "Técnico:" => $rep['tecnico'] ?: 'Sin asignar',
    "Ingreso:" => $rep['fecha_ingreso'],
    "Entrega:" => $rep['fecha_entrega'] ?: '-'
];

foreach ($fields as $label => $value) {
    $pdf->Cell(50,10,utf8_decode($label),1,0,'L',true);
    $pdf->Cell(0,10,utf8_decode($value),1,1);
}

// Observaciones
$pdf->Ln(8);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,10,utf8_decode("Observaciones:"),0,1);
$pdf->SetFont('Arial','',11);
$pdf->MultiCell(0, 8, utf8_decode($rep['observaciones'] ?: '-'), 0, 'L');

// Código QR
$pdf->Ln(12);
$pdf->SetFont('Arial','I',10);
$pdf->Cell(0,10,utf8_decode("Escanee este código QR para consultar el estado online:"),0,1,'C');
$pdf->Image($tempQrPath, 80, $pdf->GetY(), 50);
$pdf->Ln(60);

// Pie
$pdf->SetFont('Arial','I',9);
$pdf->Cell(0, 10, utf8_decode("Documento generado automáticamente - no requiere firma ni sello"), 0, 1, 'C');

// Mostrar PDF
$pdf->Output("I", "recibo_$id.pdf");
unlink($tempQrPath);

