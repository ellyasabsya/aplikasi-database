<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function getRedirectUrl(): string
    {
        // Mengarahkan pengguna kembali ke halaman List Resource setelah berhasil menyimpan data
        return $this->getResource()::getUrl('index');
    }
}
