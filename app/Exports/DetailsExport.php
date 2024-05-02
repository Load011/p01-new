<?php

namespace App\Exports;

use App\Models\Asset;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DetailsExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    protected $asset;

    public function __construct(Asset $asset)
    {
        $this->asset = $asset;
    }

    public function collection()
    {
        return collect([
            [
                'Nama Aset' => $this->asset->nama_aset,
                'Alamat Aset' => $this->asset->alamat,
                'Pendapatan' => 'Rp ' . number_format($this->asset->tuanRumah ? $this->asset->tuanRumah->harga_sewa : 0, 2),
                'Pengeluaran' => 'Rp ' . number_format($this->asset->pengeluaran, 2),
                'Penghuni Sekarang' => $this->asset->tuanRumah ? $this->asset->tuanRumah->nama_penyewa : '-',
                'No.KTP' => $this->asset->tuanRumah ? $this->asset->tuanRumah->no_ktp : '-',
                'No.Hp' => $this->asset->tuanRumah ? $this->asset->tuanRumah->no_tlp : '-',
            ]
        ]);
    }

    public function headings(): array
    {
        return [
            'Nama Aset',
            'Alamat Aset',
            'Pendapatan',
            'Pengeluaran',
            'Penghuni Sekarang',
            'No.KTP',
            'No.Hp',
        ];
    }
}

