<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\StatsBatuAmparOverview;
use App\Livewire\BatuAmparChart;
use App\Livewire\StatsBatuAmparOverview as LivewireStatsBatuAmparOverview;
use Filament\Pages\Page;

class DashboardBatuAmpar extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.dashboard-batu-ampar';

    protected static ?string $navigationLabel = 'Batu Ampar';

    protected static ?int $navigationSort = 11;

    
    public static function getNavigationGroup(): ?string
    {
        return 'Kecamatan'; // Nama grup navigasi yang sama
    }

    public function getWidgets(): array
    {
        return [
            LivewireStatsBatuAmparOverview::class,
            BatuAmparChart::class,
            
        ];
    }
   
}
