<?
    class controlPago
    {
        public function insertarPagos($monto, $meses, $documentoIdentidad)
        {       
                include_once("../modelos/pagos.php");
                $objHorario = new pagos();
                $response = $objHorario -> insertarPago($monto, $meses, $documentoIdentidad);
                return $response;
        }
        public function generarPdfPago($montoPagado, $nombreCompleto, $documentoIdentidad, $cantidadMeses) {
            include_once("../fpdf186/fpdf.php");

            $pdf = new FPDF();
            $pdf->AddPage();

            $pdf->SetFont('Arial', '', 12);

            $pdf->Cell(0, 10, 'Academia de Bailes Rits', 0, 1, 'C');
            $pdf->Cell(0, 10, 'Comprobante de Pago', 0, 1, 'C');
            $pdf->Ln(5);  

            $pdf->Cell(0, 10, 'Fecha: ' . date('Y-m-d'), 0, 1);
            $pdf->Cell(0, 10, 'Nombre: ' . $nombreCompleto, 0, 1);
            $pdf->Cell(0, 10, 'Documento de Identidad: ' . $documentoIdentidad, 0, 1);
            $pdf->Cell(0, 10, 'Concepto: Pago de ' . $cantidadMeses . ' meses', 0, 1);
            $pdf->Ln(10);  

            $pdf->Cell(50, 10, 'Descripcion', 1, 0, 'C');
            $pdf->Cell(50, 10, 'Cantidad de Meses', 1, 0, 'C');
            $pdf->Cell(50, 10, 'Subtotal', 1, 1, 'C');

            $precioPorMes = $montoPagado / $cantidadMeses; 
            $subtotal = $cantidadMeses * $precioPorMes;

            $pdf->Cell(50, 10, 'Pago de ' . $cantidadMeses . ' meses', 1);
            $pdf->Cell(50, 10, $cantidadMeses, 1, 0, 'C');
            $pdf->Cell(50, 10, '$' . number_format($subtotal, 2), 1, 1, 'C');

            $pdf->Ln(10); 

            $pdf->Cell(0, 10, 'Total Pagado: $' . number_format($cantidadMeses * $subtotal, 2), 0, 1);

            $pdf->Cell(0, 0, '', 'T');
            $pdf->Ln(10);  

            $pdf->Cell(0, 10, 'Gracias por su pago!', 0, 1, 'C');

            $pdf->Output('comprobante_pago.pdf', 'I');
        }


    }
?>