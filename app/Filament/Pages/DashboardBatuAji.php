<?php

namespace App\Filament\Pages;

use App\Livewire\BatuAjiChart;
use App\Livewire\StatsBatuAjiOverview;
use App\Livewire\StatsBatuAmparOverview;
use Filament\Pages\Page;

class DashboardBatuAji extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.dashboard-batu-aji';

    protected static ?string $navigationLabel = 'Batu Aji';

    protected static ?int $navigationSort = 20;

    
    public static function getNavigationGroup(): ?string
    {
        return 'Kecamatan'; // Nama grup navigasi yang sama
    }

    public function getWidgets(): array
    {
        return [
            StatsBatuAjiOverview::class,
            BatuAjiChart::class,
            
        ];
    }
    
}
