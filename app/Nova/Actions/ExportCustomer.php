<?php

namespace App\Nova\Actions;

use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\LaravelNovaExcel\Actions\DownloadExcel;

class ExportCustomer extends DownloadExcel implements WithMapping, WithHeadings,WithColumnWidths
{
    /**
     * Get Heading For 
     * @return array
     */
    public function headings(): array
    {
        return [
            'Nama',
            'Sales',
            'S-Phone',
            'Alamat',
            'Virtual Account',
            'NPWP',
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
            $customer->name,
            $customer->sales->name,
            $customer->sales->phone_number,
            $customer->address,
            $customer->virtual_account,
            $customer->npwp,
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
        ];
    }
}
