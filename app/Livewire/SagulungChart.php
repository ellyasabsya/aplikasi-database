<?php

namespace App\Livewire;

use App\Models\Hasil_verifikasi;
use Filament\Widgets\ChartWidget;

class SagulungChart extends ChartWidget
{
    protected static ?string $heading = 'Kecatamatan Sagulung';
    protected static ?int $sort = 11;

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Sagulung',
                    'data' => [Hasil_verifikasi::where('kel', 'tembesi')->count(), Hasil_verifikasi::where('kel', 'binti')->count(), Hasil_verifikasi::where('kel', 'sagulung kota')->count(), Hasil_verifikasi::where('kel', 'sungai langkai')->count(), Hasil_verifikasi::where('kel', 'sungai lekop')->count(), Hasil_verifikasi::where('kel', 'sungai pelunggut')->count() ],
                    
                ],
            ],
            'labels' => ['Tembesi', 'Binti', 'Sagulung Kota', 'Sungai Langkai', 'Sungai Lekop', 'Sungai Pelunggut'],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
