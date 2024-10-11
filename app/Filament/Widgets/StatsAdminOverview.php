<?php

namespace App\Filament\Widgets;

use App\Models\Hasil_verifikasi;
use App\Models\Koordinator;
use App\Models\Verifikasi;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsAdminOverview extends BaseWidget
{
    protected static ?int $sort = 1;
    protected function getStats(): array
    {
        $totalPendukung = Hasil_verifikasi::query()->count();
        $totalDPT = Verifikasi::query()->count();

        // Menghitung persentase pendukung dari total DPT
        $persentase = $totalDPT > 0 ? ($totalPendukung / $totalDPT) * 100 : 0;
        $persen = (' ' . round($persentase, 2) . '%');

        return [
        Stat::make('Total DPT', Verifikasi::query()->count())
            ->description('Total DPT Kota Batam')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->color('success'),
        Stat::make('Total Pendukung', Hasil_verifikasi::query()->count())
            ->description('Pendukung Terverifikasi')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->color('success'),
        Stat::make('Total Koordinator', Koordinator::query()->count())
            ->description('Total Koordinator')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->color('success'),
        Stat::make('Persentase', $persen)
            ->description('Persentase') 
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->color('success'),    
        ];
    }
}
