<?php

namespace App\Livewire;

use App\Models\Hasil_verifikasi;
use Filament\Widgets\ChartWidget;

class GalangChart extends ChartWidget
{
    protected static ?string $heading = 'Kecatamatan Galang';
    protected static ?int $sort = 11;

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Galang',
                    'data' => [Hasil_verifikasi::where('kel', 'air raja')->count(), Hasil_verifikasi::where('kel', 'galang baru')->count(), Hasil_verifikasi::where('kel', 'karas')->count(), Hasil_verifikasi::where('kel', 'pulau abang')->count(), Hasil_verifikasi::where('kel', 'rempang cate')->count(), Hasil_verifikasi::where('kel', 'sembulang')->count(), Hasil_verifikasi::where('kel', 'sijantung')->count(), Hasil_verifikasi::where('kel', 'subang mas')->count() ],
                    
                ],
            ],
            'labels' => ['Air Raja', 'Galang Baru', 'Karas', 'Pulau Abang', 'Rempang Cate', 'Sembulang', 'Sijantung', 'Subang Mas'],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
