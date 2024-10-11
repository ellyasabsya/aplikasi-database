<?php

namespace App\Livewire;

use App\Models\Hasil_verifikasi;
use Filament\Widgets\ChartWidget;

class LubukBajaChart extends ChartWidget
{
    protected static ?string $heading = 'Kecatamatan Lubuk Baja';
    protected static ?int $sort = 11;

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Lubuk Baja',
                    'data' => [Hasil_verifikasi::where('kel', 'baloi indah')->count(), Hasil_verifikasi::where('kel', 'batu selicin')->count(), Hasil_verifikasi::where('kel', 'kampung pelita')->count(), Hasil_verifikasi::where('kel', 'lubuk baja kota')->count(), Hasil_verifikasi::where('kel', 'tanjung uma')->count() ],
                    
                ],
            ],
            'labels' => ['Baloi Indah', 'Batu Selicin', 'Kampung Pelita', 'Lubuk Baja Kota', 'Tanjung Uma'],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
