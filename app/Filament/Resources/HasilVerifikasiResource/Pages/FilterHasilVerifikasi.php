<?php

namespace App\Filament\Resources\HasilVerifikasiResource\Pages;

use App\Filament\Resources\HasilVerifikasiResource;
use Filament\Resources\Pages\Page;
use Filament\Forms\Components\Select;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Notifications\Notification;
use App\Models\Hasil_verifikasi; // pastikan model ini diimpor
use App\Exports\HasilVerifikasiExport;
use Maatwebsite\Excel\Facades\Excel;

class FilterHasilVerifikasi extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string $resource = HasilVerifikasiResource::class;
    protected static string $view = 'filament.resources.hasil-verifikasi-resource.pages.filter-hasil-verifikasi';
    
    protected static ?string $title = 'Hasil Verifikasi';

    // Properti untuk menyimpan filter
    public ?string $status = null;
    public ?string $kecamatan = null;
    public ?string $kelurahan = null;
    public ?string $nama_relawan = null;
    public $filteredResults = []; // Inisialisasi di sini

    public function mount(): void
    {
        $this->form->fill();
    }

    protected function getFormSchema(): array
    {
        return [
            \Filament\Forms\Components\Grid::make()
                ->columns(4) // Mengatur jumlah kolom
                ->schema([

                    Select::make('kec')
                        ->label('PILIH KECAMATAN')
                        ->options(Hasil_verifikasi::distinct()->pluck('kec', 'kec'))
                        ->placeholder('Pilih kecamatan...'),

                    Select::make('kel')
                        ->label('PILIH KELURAHAN')
                        ->options(Hasil_verifikasi::distinct()->pluck('kel', 'kel'))
                        ->placeholder('Pilih kelurahan...'),

                    Select::make('status')
                        ->label('PILIH STATUS')
                        ->options(Hasil_verifikasi::distinct()->pluck('status', 'status'))
                        ->placeholder('Pilih status...'),
    
                    Select::make('nama_relawan')
                        ->label('PILIH RELAWAN')
                        ->options(Hasil_verifikasi::distinct()->pluck('nama_relawan', 'nama_relawan'))
                        ->placeholder('Pilih relawan...'),
    
                    
    
                    
                ]),
        ];
    }

    public function applyFilters(): void
{
    // Membangun query dasar
    $query = Hasil_verifikasi::query();

    // Menerapkan filter berdasarkan input yang diberikan
    if ($this->status) {
        $query->where('status', $this->status);
    }

    if ($this->kecamatan) {
        $query->where('kec', $this->kecamatan);
    }

    if ($this->kelurahan) {
        $query->where('kel', $this->kelurahan);
    }

    if ($this->nama_relawan) {
        $query->where('nama_relawan', $this->nama_relawan);
    }

    


    // Mengambil hasil berdasarkan filter yang diterapkan
    $this->filteredResults = $query->get();

    // Notifikasi bahwa filter diterapkan
    Notification::make()
        ->title('Filter diterapkan')
        ->success()
        ->send();
    
    // Reset status setelah menerapkan filter
    $this->reset(['status', 'kecamatan', 'kelurahan', 'nama_relawan']);
}
public function exportFilteredData()
{
    return Excel::download(new HasilVerifikasiExport($this->filteredResults), 'hasil_verifikasi_filtered.xlsx');
}


}
