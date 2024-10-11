<?php

namespace App\Filament\Pages;

use App\Filament\Livewire\StatsBelakangPadangOverview;
use App\Livewire\BelakangPadangChart;
use App\Livewire\StatsBelakangPadangOverview as LivewireStatsBelakangPadangOverview;
use Filament\Pages\Page;

class DashboardBelakangPadang extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text'; // Ikon navigasi
    protected static string $view = 'filament.pages.dashboard-belakang-padang'; // Path view
    protected static ?string $navigationLabel = 'Belakang Padang';

    protected static ?int $navigationSort = 10;

    
    public static function getNavigationGroup(): ?string
    {
        return 'Kecamatan'; // Nama grup navigasi yang sama
    }

    public function getWidgets(): array
    {
        return [
            LivewireStatsBelakangPadangOverview::class,
            BelakangPadangChart::class,
            
        ];
    }
}
