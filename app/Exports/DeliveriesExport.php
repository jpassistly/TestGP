<?php
// app/Exports/DeliveriesExport.php
namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Collection;

class DeliveriesExport implements FromCollection, WithHeadings
{
    protected $delivery_list;

    public function __construct($delivery_list)
    {
        $this->delivery_list = $delivery_list;
    }

    public function collection(): Collection
    {
        // Map the data to match the order of headings
        return $this->delivery_list->map(function ($item, $index) {
            return [
                'S.No' => $index + 1,
                'Date' => $item->date,
                'Customer Name' => $item->customer_name, 
                'Customer Mobile' => $item->customer_mobile,
                'Product Name' => $item->product_name, 
                'Quantity' => $item->subscription_total_qty,
                'Measurement' => $item->unit_name . ' ' . $item->measurement_name,
                'Delivery Person' => $item->deliveryperson_name, 
                'Status' => $item->delivery_status,
                'Pincode' => $item->pincode_value,
                'Area' => $item->area_name,
                'Delivery Line' => $item->delivery_line_name, 
            ];
        });
    }

    public function headings(): array
    {
        return [
            'S.No', 
            'Date',
            'Customer Name',
            'Customer Mobile',
            'Product Name',
            'Quantity',
            'Measurement',
            'Delivery Person',
            'Status',
            'Pincode',
            'Area',
            'Delivery Line'
        ];
    }
}
