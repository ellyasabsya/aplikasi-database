<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\StatsGalangOverview;
use App\Livewire\GalangChart;
use App\Livewire\StatsGalangOverview as LivewireStatsGalangOverview;
use Filament\Pages\Page;

class DashboardGalang extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.dashboard-galang';

    protected static ?string $navigationLabel = 'Galang';

    protected static ?int $navigationSort = 16;

    
    public static function getNavigationGroup(): ?string
    {
        return 'Kecamatan'; // Nama grup navigasi yang sama
    }
    public function getWidgets(): array
    {
        return [
            LivewireStatsGalangOverview::class,
            GalangChart::class,
            
        ];
    }
}
