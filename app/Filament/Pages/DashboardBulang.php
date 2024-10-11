<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\StatsBulangOverview;
use App\Livewire\BulangChart;
use App\Livewire\StatsBulangOverview as LivewireStatsBulangOverview;
use Filament\Pages\Page;

class DashboardBulang extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.dashboard-bulang';
    protected static ?string $navigationLabel = 'Bulang';

    protected static ?int $navigationSort = 14;

    
    public static function getNavigationGroup(): ?string
    {
        return 'Kecamatan'; // Nama grup navigasi yang sama
    }
    public function getWidgets(): array
    {
        return [
            LivewireStatsBulangOverview::class,
            BulangChart::class,
            
        ];
    }
}
