<?php

namespace App\Filament\Resources\HasilVerifikasiResource\Pages;

use App\Filament\Resources\HasilVerifikasiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHasilVerifikasis extends ListRecords
{
    protected static string $resource = HasilVerifikasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
