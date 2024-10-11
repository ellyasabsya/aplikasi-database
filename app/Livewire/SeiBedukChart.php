<?php

namespace App\Livewire;

use App\Models\Hasil_verifikasi;
use Filament\Widgets\ChartWidget;

class SeiBedukChart extends ChartWidget
{
    protected static ?string $heading = 'Kecatamatan Sei Beduk';
    protected static ?int $sort = 11;

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Sei Beduk',
                    'data' => [Hasil_verifikasi::where('kel', 'duriangkang')->count(), Hasil_verifikasi::where('kel', 'mangsang')->count(), Hasil_verifikasi::where('kel', 'muka kuning')->count(), Hasil_verifikasi::where('kel', 'tanjung piayu')->count() ],
                    
                ],
            ],
            'labels' => ['Duriangkang', 'Mangsang', 'Muka Kuning', 'Tanjung Piayu'],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
