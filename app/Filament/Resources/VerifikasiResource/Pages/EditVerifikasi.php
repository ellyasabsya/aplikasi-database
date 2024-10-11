<?php

namespace App\Filament\Resources\VerifikasiResource\Pages;

use App\Filament\Resources\VerifikasiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;
use App\Filament\Resources\HasilVerifikasiResource;
use App\Models\Hasil_verifikasi;
use Filament\Notifications\Notification;

class EditVerifikasi extends EditRecord
{
    protected static string $resource = VerifikasiResource::class;

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        // Cek apakah NIK sudah ada di database
        $existingRecord = Hasil_verifikasi::where('nik', $data['nik'])->first();

        if ($existingRecord) {
            // Jika NIK sudah ada, tampilkan notifikasi
            Notification::make()
                ->title('Gagal Menyimpan')
                ->body('NIK sudah terdaftar, silakan masukkan NIK yang berbeda.')
                ->danger() // Tampilkan notifikasi dengan warna merah
                ->send();

            // Jika Anda ingin menghentikan proses penyimpanan, Anda bisa melemparkan pengecualian
            // throw new \Exception('NIK sudah terdaftar');
        } else {
            // Jika NIK belum ada, buat record baru
            Hasil_verifikasi::create($data);
        }

        return $record;
    }

    // Redirect ke halaman create dari resource lain setelah menyimpan
    protected function getRedirectUrl(): string
    {
        // Arahkan ke halaman create resource lain setelah update
        return HasilVerifikasiResource::getUrl('index');
    }
}
