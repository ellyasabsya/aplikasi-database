<?php

namespace App\Filament\Widgets;

use App\Models\Hasil_verifikasi;
use Filament\Widgets\ChartWidget;

class HasilVerifikasiChart extends ChartWidget
{
    protected static ?string $heading = 'Jumlah Pendukung Kota Batam';
    protected int | string | array $columnSpan = 'full';
    protected static ?int $sort = 2;
    protected static string $color = 'success';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Pendukung Kota Batam',
                    'data' => [Hasil_verifikasi::where('kec', 'BELAKANG PADANG')->count(), Hasil_verifikasi::where('kec', 'BATU AMPAR')->count(), Hasil_verifikasi::where('kec', 'SEKUPANG')->count(), Hasil_verifikasi::where('kec', 'NONGSA')->count(), Hasil_verifikasi::where('kec', 'BULANG')->count(), Hasil_verifikasi::where('kec', 'LUBUK BAJA')->count(), Hasil_verifikasi::where('kec', 'SEI BEDUK')->count(), Hasil_verifikasi::where('kec', 'GALANG')->count(), Hasil_verifikasi::where('kec', 'BENGKONG')->count(), Hasil_verifikasi::where('kec', 'BATAM KOTA')->count(), Hasil_verifikasi::where('kec', 'SAGULUNG')->count(), Hasil_verifikasi::where('kec', 'BATU AJI')->count() ],
                    
                ],
            ],
            'labels' => ['BELAKANG PADANG', 'BATUAMPAR', 'SEKUPANG', 'NONGSA', 'BULANG', 'LUBUK BAJA', 'SEI BEDUK', 'GALANG', 'BENGKONG', 'BATAM KOTA', 'SAGULUNG', 'BATU AJI'],
        ];
    }


    protected function getType(): string
    {
        return 'bar';
    }
}
