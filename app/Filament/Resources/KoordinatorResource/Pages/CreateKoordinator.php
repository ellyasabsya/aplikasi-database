<?php

namespace App\Filament\Resources\KoordinatorResource\Pages;

use App\Filament\Resources\KoordinatorResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateKoordinator extends CreateRecord
{
    protected static string $resource = KoordinatorResource::class;

    protected function getRedirectUrl(): string
    {
        // Mengarahkan pengguna kembali ke halaman List Resource setelah berhasil menyimpan data
        return $this->getResource()::getUrl('index');
    }
}
