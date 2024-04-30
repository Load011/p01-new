<?php
namespace App\Exports;

use App\Models\Asset;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class AssetsExport implements FromCollection, WithHeadings ,ShouldAutoSize
{
    public function collection()
    {
        $assets = Asset::all();

        return $assets->map(function ($asset) {
            return [
                'Nama Aset' => $asset->nama_aset,
                'Alamat Aset' => $asset->alamat,
                'Pendapatan' => 'Rp ' . number_format($asset->tuanRumah ? $asset->tuanRumah->harga_sewa : 0, 2),
                'Pengeluaran' => 'Rp ' . number_format($asset->pengeluaran, 2),
            ];
        });
    }


    public function headings(): array
    {
        return [
            'Nama Aset',
            'Alamat Aset',
            'Pendapatan',
            'Pengeluaran',
        ];
    }
}
