<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\StatsSagulungOverview;
use App\Livewire\SagulungChart;
use App\Livewire\StatsSagulungOverview as LivewireStatsSagulungOverview;
use Filament\Pages\Page;

class DashboardSagulung extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.dashboard-sagulung';

    protected static ?string $navigationLabel = 'Sagulung';

    protected static ?int $navigationSort = 19;

    
    public static function getNavigationGroup(): ?string
    {
        return 'Kecamatan'; // Nama grup navigasi yang sama
    }
    public function getWidgets(): array
    {
        return [
            StatsSagulungOverview::class,
            SagulungChart::class,
            
        ];
    }
}
