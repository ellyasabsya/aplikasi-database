<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\StatsLubukBajaOverview;
use App\Livewire\LubukBajaChart;
use App\Livewire\StatsLubukBajaOverview as LivewireStatsLubukBajaOverview;
use Filament\Pages\Page;

class DashboardLubukBaja extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.dashboard-lubuk-baja';

    protected static ?string $navigationLabel = 'Lubuk Baja';

    protected static ?int $navigationSort = 15;

    
    public static function getNavigationGroup(): ?string
    {
        return 'Kecamatan'; // Nama grup navigasi yang sama
    }
    public function getWidgets(): array
    {
        return [
            LivewireStatsLubukBajaOverview::class,
            LubukBajaChart::class,
            
        ];
    }
}
