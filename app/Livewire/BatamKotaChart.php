<?php

namespace App\Livewire;

use App\Models\Hasil_verifikasi;
use Filament\Widgets\ChartWidget;

class BatamKotaChart extends ChartWidget
{
    protected static ?string $heading = 'Kecatamatan Batam Kota';
    protected static ?int $sort = 11;

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Batam Kota',
                    'data' => [Hasil_verifikasi::where('kel', 'baloi permai')->count(), Hasil_verifikasi::where('kel', 'belian')->count(), Hasil_verifikasi::where('kel', 'sukajadi')->count(), Hasil_verifikasi::where('kel', 'sungai panas')->count(), Hasil_verifikasi::where('kel', 'taman baloi')->count(), Hasil_verifikasi::where('kel', 'teluk tering')->count() ],
                    
                ],
            ],
            'labels' => ['Baloi Permai', 'Belian', 'Sukajadi', 'Sungai Panas', 'Taman Baloi', 'Teluk Tering'],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
