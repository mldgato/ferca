<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Dompdf\Dompdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ProducController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.stocktaking.products.index');
    }

    public function inventorypdf()
    {
        $pdf = new Dompdf();
        $products = Product::all();
        $html = view('admin.stocktaking.products.pdfinventory', compact('products'))->render();

        $pdf->loadHtml($html);
        $pdf->setPaper('letter', 'portrait');
        $pdf->render();

        return $pdf->stream('inventory ' . date('d-m-Y') . '.pdf');
    }

    public function excelinventory()
    {
        // Crea una instancia de la hoja de cálculo
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Agrega datos a la hoja de cálculo (puedes personalizar según tus necesidades)
        $sheet->setCellValue('A1', 'Código');
        $sheet->setCellValue('B1', 'Producto');
        $sheet->setCellValue('C1', 'Marca');
        $sheet->setCellValue('D1', 'Proveedor');
        $sheet->setCellValue('E1', 'Cantidad');
        $sheet->setCellValue('F1', 'Precio');
        $sheet->setCellValue('G1', 'Costo');
        $sheet->setCellValue('H1', 'Bodega');
        $sheet->setCellValue('I1', 'Estantería');

        // Aquí deberías obtener tus productos desde la base de datos
        $products = Product::all(); // Asegúrate de tener el modelo Product importado

        $row = 2;
        foreach ($products as $product) {
            $sheet->setCellValue('A' . $row, $product->cod);
            $sheet->setCellValue('B' . $row, $product->name);
            $sheet->setCellValue('C' . $row, $product->brand);
            $sheet->setCellValue('D' . $row, $product->supplier->company);
            $sheet->setCellValue('E' . $row, $product->quantity);
            $sheet->setCellValue('F' . $row, $product->price);
            $sheet->setCellValue('G' . $row, $product->cost);
            $sheet->setCellValue('H' . $row, $product->warehouse->name);
            $sheet->setCellValue('I' . $row, $product->rack->name);

            $row++;
        }

        $sheet->getStyle('A1:I1')->getFont()->setBold(true);
        // Establecer color de fondo para los encabezados
        $sheet->getStyle('A1:I1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFA0A0A0');

        // Ajuste automático del ancho de las columnas
        foreach (range('A', 'I') as $column) {
            $sheet->getColumnDimension($column)->setAutoSize(true);
        }

        // Estilo de borde para la tabla
        $styleArray = [
            'borders' => [
                'outline' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ];

        $sheet->getStyle('A1:I' . ($row - 1))->applyFromArray($styleArray);

        // Formato de moneda para Precio y Costo en quetzales guatemaltecos
        foreach (['F', 'G'] as $column) {
            $sheet->getStyle($column . '2:' . $column . $row)->getNumberFormat()->setFormatCode('#,##0.00 Q');
        }

        // Agregar autofiltros a la tabla
        $sheet->setAutoFilter('A1:I' . ($row - 1));

        // Guarda la hoja de cálculo en un archivo
        $filename = 'productos.xlsx';
        $writer = new Xlsx($spreadsheet);
        $writer->save($filename);

        // Descarga el archivo
        return response()->download($filename)->deleteFileAfterSend(true);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
