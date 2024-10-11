<?php

namespace App\Livewire;

use App\Models\Hasil_verifikasi;
use Filament\Widgets\ChartWidget;

class BatuAmparChart extends ChartWidget
{
    protected static ?string $heading = 'Kecatamatan Batu Ampar';
    protected static ?int $sort = 11;

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Batu Ampar',
                    'data' => [Hasil_verifikasi::where('kel', 'batu  merah')->count(), Hasil_verifikasi::where('kel', 'kampung seraya')->count(), Hasil_verifikasi::where('kel', 'sungai jodoh')->count(), Hasil_verifikasi::where('kel', 'tanjung sengkuang')->count() ],
                    
                ],
            ],
            'labels' => ['Batu Merah', 'Kampung Seraya', 'Sungai Jodoh', 'Tanjung Sengkuang'],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
