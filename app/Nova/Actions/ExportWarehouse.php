<?php

namespace App\Nova\Actions;

use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\LaravelNovaExcel\Actions\DownloadExcel;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ExportWareHouse extends DownloadExcel implements WithMapping, WithHeadings,WithColumnWidths , WithStyles
{

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1')->getFont()->setBold(true);
        $sheet->getStyle('B1')->getFont()->setBold(true);
        $sheet->getStyle('C1')->getFont()->setBold(true);
        $sheet->getStyle('D1')->getFont()->setBold(true);
        $sheet->getStyle('E1')->getFont()->setBold(true);
        $sheet->getStyle('F1')->getFont()->setBold(true);
        $sheet->getStyle('G1')->getFont()->setBold(true);
        $sheet->getStyle('H1')->getFont()->setBold(true);
        $sheet->getStyle('I1')->getFont()->setBold(true);
    }

    /**
     * Get Heading For 
     * @return array
     */
    public function headings(): array
    {
        return [
            'Warehouse Men',
            'Customer',
            'Sales',
            'SO',
            'OD',
            'Customer Receive',
            'Status',
            'Date',
            'Date Recevie',
        ];
    }

    /**
     * Mapping All Customer and Pas to Excel 
     * With Relation 
     * @return array
     */
    public function map($customer): array
    {
        return [
            $customer->warehouse->name,
            $customer->customer->name,
            $customer->customer->sales->name,
            $customer->so,
            $customer->od,
            $customer->cust_recv,
            $customer->status,
            $customer->date_gi,
            $customer->date_recv,
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 15,
            'B' => 20,
            'C' => 20,
            'D' => 20,
            'E' => 20,
            'F' => 20,
            'H' => 20,
            'I' => 20,
        ];
    }
}
