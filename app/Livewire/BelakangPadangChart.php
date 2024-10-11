<?php

namespace App\Livewire;

use App\Models\Hasil_verifikasi;
use Filament\Widgets\ChartWidget;

class BelakangPadangChart extends ChartWidget
{
    protected static ?string $heading = 'Kecatamatan Belakang Padang';
    protected static ?int $sort = 11;

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Belakang Padang',
                    'data' => [Hasil_verifikasi::where('kel', 'kasu')->count(), Hasil_verifikasi::where('kel', 'pecong')->count(), Hasil_verifikasi::where('kel', 'pemping')->count(), Hasil_verifikasi::where('kel', 'pulau terung')->count(), Hasil_verifikasi::where('kel', 'sekanak raya')->count(), Hasil_verifikasi::where('kel', 'tanjung sari')->count() ],
                    
                ],
            ],
            'labels' => ['Kasu', 'Pecong', 'Pemping', 'Pulau Terung', 'Sekanak Raya', 'Tanjung Sari'],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
