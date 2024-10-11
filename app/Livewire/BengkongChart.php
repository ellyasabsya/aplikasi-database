<?php

namespace App\Livewire;

use App\Models\Hasil_verifikasi;
use Filament\Widgets\ChartWidget;

class BengkongChart extends ChartWidget
{
    protected static ?string $heading = 'Kecatamatan Bengkong';
    protected static ?int $sort = 11;

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Bengkong',
                    'data' => [Hasil_verifikasi::where('kel', 'bengkong laut')->count(), Hasil_verifikasi::where('kel', 'bengkong indah')->count(), Hasil_verifikasi::where('kel', 'sadai')->count(), Hasil_verifikasi::where('kel', 'tanjung buntung')->count() ],
                    
                ],
            ],
            'labels' => ['Bengkong Laut', 'Bengkong Indah', 'Sadai', 'Tanjung Buntung'],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
