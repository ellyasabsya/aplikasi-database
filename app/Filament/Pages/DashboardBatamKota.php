<?php

namespace App\Filament\Pages;

use App\Filament\Livewire\StatsBatamKotaOverview;
use App\Livewire\BatamKotaChart;
use App\Livewire\StatsBatamKotaOverview as LivewireStatsBatamKotaOverview;
use Filament\Pages\Page;

class DashboardBatamKota extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.dashboard-batam-kota';

    protected static ?string $navigationLabel = 'Batam Kota';

    protected static ?int $navigationSort = 18;

    
    public static function getNavigationGroup(): ?string
    {
        return 'Kecamatan'; // Nama grup navigasi yang sama
    }
    public function getWidgets(): array
    {
        return [
            LivewireStatsBatamKotaOverview::class,
            BatamKotaChart::class,
            
        ];
    }
}
