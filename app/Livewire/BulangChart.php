<?php

namespace App\Livewire;

use App\Models\Hasil_verifikasi;
use Filament\Widgets\ChartWidget;

class BulangChart extends ChartWidget
{
    protected static ?string $heading = 'Kecatamatan Bulang';
    protected static ?int $sort = 11;

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Bulang',
                    'data' => [Hasil_verifikasi::where('kel', 'batu legong')->count(), Hasil_verifikasi::where('kel', 'bulang lintang')->count(), Hasil_verifikasi::where('kel', 'pantai gelam')->count(), Hasil_verifikasi::where('kel', 'pulau buluh')->count(), Hasil_verifikasi::where('kel', 'pulau setokok')->count(), Hasil_verifikasi::where('kel', 'temoyong')->count() ],
                    
                ],
            ],
            'labels' => ['Batu Legong', 'Bulang Lintang', 'Pantai Gelam', 'Pulau Buluh', 'Pulau Setokok', 'Temoyong'],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
