<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\StatsNongsaOverview;
use App\Livewire\NongsaChart;
use App\Livewire\StatsNongsaOverview as LivewireStatsNongsaOverview;
use Filament\Pages\Page;

class DashboardNongsa extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.dashboard-nongsa';

    protected static ?string $navigationLabel = 'Nongsa';

    protected static ?int $navigationSort = 13;

    
    public static function getNavigationGroup(): ?string
    {
        return 'Kecamatan'; // Nama grup navigasi yang sama
    }
    public function getWidgets(): array
    {
        return [
            LivewireStatsNongsaOverview::class,
            NongsaChart::class,
            
        ];
    }
}
