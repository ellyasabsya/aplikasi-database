<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\StatsSeiBedukOverview;
use App\Livewire\SeiBedukChart;
use App\Livewire\StatsSeiBedukOverview as LivewireStatsSeiBedukOverview;
use Filament\Pages\Page;

class DashboardSeiBeduk extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.dashboard-sei-beduk';

    protected static ?string $navigationLabel = 'Sei Beduk';

    protected static ?int $navigationSort = 16;

    
    public static function getNavigationGroup(): ?string
    {
        return 'Kecamatan'; // Nama grup navigasi yang sama
    }
    public function getWidgets(): array
    {
        return [
            LivewireStatsSeiBedukOverview::class,
            SeiBedukChart::class,
            
        ];
    }
}
