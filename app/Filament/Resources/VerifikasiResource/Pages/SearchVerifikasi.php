<?php

namespace App\Filament\Resources\VerifikasiResource\Pages;

use App\Filament\Resources\VerifikasiResource;
use Filament\Resources\Pages\Page;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use App\Models\Verifikasi;
use Filament\Notifications\Notification;

class SearchVerifikasi extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string $resource = VerifikasiResource::class;
    protected static string $view = 'filament.pages.search-verifikasi';
    
    protected static ?string $title = 'Verifikasi Data';
    
    public ?string $nik = '';
    public ?Verifikasi $verifikasi = null;

    public function mount(): void
    {
        $this->form->fill();
    }

    protected function getFormSchema(): array
    {
        return [
            TextInput::make('nik')
                ->label('MASUKKAN NIK')
                ->required()
                ->maxLength(16),
        ];
    }

    public function search(): void
    {
        $this->validate();
        
        $this->verifikasi = Verifikasi::where('nik', $this->nik)->first();
        
        if (!$this->verifikasi) {
            Notification::make()
                ->title('Data tidak ditemukan')
                ->warning()
                ->send();
        }
        $this->reset('nik');
    }
    public function updateVerifikasi()
    {
    $this->verifikasi->save();

    Notification::make()
        ->title('Data berhasil diperbarui')
        ->success()
        ->send();
    }

}