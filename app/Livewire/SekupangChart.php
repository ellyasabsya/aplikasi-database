<?php

namespace App\Livewire;

use App\Models\Hasil_verifikasi;
use Filament\Widgets\ChartWidget;

class SekupangChart extends ChartWidget
{
    protected static ?string $heading = 'Kecatamatan Sekupang';
    protected static ?int $sort = 11;

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Sekupang',
                    'data' => [Hasil_verifikasi::where('kel', 'patam lestari')->count(), Hasil_verifikasi::where('kel', 'sungai harapan')->count(), Hasil_verifikasi::where('kel', 'tanjung pinggir')->count(), Hasil_verifikasi::where('kel', 'tanjung riau')->count(), Hasil_verifikasi::where('kel', 'tiban baru')->count(), Hasil_verifikasi::where('kel', 'tiban indah')->count(), Hasil_verifikasi::where('kel', 'tiban lama')->count() ],
                    
                ],
            ],
            'labels' => ['Patam Lestari', 'Sungai Harapan', 'Tanjung Pinggir', 'Tanjung Riau', 'Tiban Baru', 'Tiban Indah', 'Tiban Lama'],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
