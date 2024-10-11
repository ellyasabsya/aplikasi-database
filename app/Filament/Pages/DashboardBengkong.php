<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\StatsBengkongOverview;
use App\Livewire\BengkongChart;
use App\Livewire\StatsBengkongOverview as LivewireStatsBengkongOverview;
use Filament\Pages\Page;

class DashboardBengkong extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.dashboard-bengkong';

    protected static ?string $navigationLabel = 'Bengkong';

    protected static ?int $navigationSort = 17;

    
    public static function getNavigationGroup(): ?string
    {
        return 'Kecamatan'; // Nama grup navigasi yang sama
    }
    public function getWidgets(): array
    {
        return [
            LivewireStatsBengkongOverview::class,
            BengkongChart::class,
            
        ];
    }
    
}
