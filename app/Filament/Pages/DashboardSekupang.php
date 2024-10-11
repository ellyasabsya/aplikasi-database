<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\StatsSekupangOverview;
use App\Livewire\SekupangChart;
use App\Livewire\StatsSekupangOverview as LivewireStatsSekupangOverview;
use Filament\Pages\Page;

class DashboardSekupang extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.dashboard-sekupang';

    protected static ?string $navigationLabel = 'Sekupang';

    protected static ?int $navigationSort = 12;

    
    public static function getNavigationGroup(): ?string
    {
        return 'Kecamatan'; // Nama grup navigasi yang sama
    }

    public function getWidgets(): array
    {
        return [
            LivewireStatsSekupangOverview::class,
            SekupangChart::class,
            
        ];
    }
    
}
