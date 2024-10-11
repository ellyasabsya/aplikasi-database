<?php

namespace App\Livewire;

use App\Models\Verifikasi;
use App\Models\Hasil_verifikasi;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsSagulungOverview extends BaseWidget
{
    protected static ?int $sort = 1;
    protected function getStats(): array
    {
        $totalPendukung = Hasil_verifikasi::query()->where('kec', 'sagulung')->count();
        $totalDPT = Verifikasi::query()->where('kec', 'sagulung')->count();

        // Menghitung persentase pendukung dari total DPT
        $persentase = $totalDPT > 0 ? ($totalPendukung / $totalDPT) * 100 : 0;
        $persen = (' ' . round($persentase, 2) . '%');

        return [
        Stat::make('Total DPT', Verifikasi::query()->where('kec', 'sagulung')->count())
            ->description('Total DPT Sagulung')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->color('success'),
        Stat::make('Total Pendukung', Hasil_verifikasi::query()->where('kec', 'sagulung')->count())
            ->description('Pendukung Terverifikasi')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->color('success'),
        Stat::make('Persentase', $persen)
            ->description('Persentase') 
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->color('success'),    
        ];
    }
}
