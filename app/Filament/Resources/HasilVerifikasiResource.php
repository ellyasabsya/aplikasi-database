<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Koordinator;
use App\Models\Hasil_verifikasi;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\HasilVerifikasiResource\Pages;
use App\Filament\Resources\HasilVerifikasiResource\RelationManagers;
use App\Filament\Resources\HasilVerifikasiResource\Pages\EditHasilVerifikasi;
use App\Filament\Resources\HasilVerifikasiResource\Pages\CreateHasilVerifikasi;
use App\Filament\Resources\HasilVerifikasiResource\Pages\FilterHasilVerifikasi;

class HasilVerifikasiResource extends Resource
{
    protected static ?string $model = Hasil_verifikasi::class;

    protected static ?string $navigationLabel = 'Hasil Verifikasi';

    protected static ?string $navigationIcon = 'heroicon-o-chart-bar-square';
    public static function getNavigationGroup(): ?string
    {
        return 'Action'; // Nama grup navigasi yang sama
    }

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Card::make()
                ->schema([
                    TextInput::make('nkk')
                    ->label('NOMOR KARTU KELUARGA')
                    ->numeric() // Validasi bahwa hanya angka yang diperbolehkan
                    ->minLength(16) // Minimal 16 karakter
                    ->maxLength(16) // Maksimal 16 karakter
                    ->rules(['digits:16']) // Harus tepat 16 digit
                    ->helperText('NKK harus terdiri dari 16 digit')
                    ->required(),

                    TextInput::make('nik')
                    ->label('NIK')
                    ->numeric() // Validasi bahwa hanya angka yang diperbolehkan
                    ->minLength(16) // Minimal 16 karakter
                    ->maxLength(16) // Maksimal 16 karakter
                    ->rules(['digits:16', 'unique:hasil_verifikasis,nik']) // Harus tepat 16 digit
                    ->helperText('NIK harus terdiri dari 16 digit')
                    ->required(),

                    TextInput::make('nama')
                        ->label('NAMA LENGKAP')
                        ->required(),
                    TextInput::make('t_lahir')
                        ->label('TEMPAT LAHIR')
                        ->required(),
                    TextInput::make('tgl_lahir')
                        ->label('TANGGAL LAHIR')
                        ->required(),
                    Select::make('kelamin')
                        ->label('JENIS KELAMIN')
                        ->options([
                            "L" => "L",
                            "P" => "P"
                        ])->required(),
                    TextInput::make('alamat')
                        ->label('ALAMAT')
                        ->required(),
                    TextInput::make('rt')
                        ->label('RT')
                        ->required(),
                    TextInput::make('rw')
                        ->label('RW')
                        ->required(),
                    TextInput::make('tps')
                        ->label('TPS')
                        ->required(),
                    TextInput::make('kel')
                        ->label('KELURAHAN')
                        ->required(),
                    TextInput::make('kec')
                        ->label('KECAMATAN')
                        ->required(),
                    TextInput::make('nohp')
                        ->label('NOMOR HP')
                        ->required(),
                    Select::make('nama_relawan')
                        ->label('NAMA KOORDINATOR')
                        ->options(Koordinator::all()
                        ->pluck('nama','nama')
                        ->toArray())
                        ->reactive()
                        ->required(),
                    Select::make('status')
                        ->label('STATUS')
                        ->options([
                            "VERIFIED BELAKANG PADANG" => "VERIFIED BELAKANG PADANG",
                            "VERIFIED BATU AMPAR" => "VERIFIED BATU AMPAR",
                            "VERIFIED SEKUPANG" => "VERIFIED SEKUPANG",
                            "VERIFIED NONGSA" => "VERIFIED NONGSA",
                            "VERIFIED BULANG" => "VERIFIED BULANG",
                            "VERIFIED LUBUK BAJA" => "VERIFIED LUBUK BAJA",
                            "VERIFIED SEI BEDUK" => "VERIFIED SEI BEDUK",
                            "VERIFIED GALANG" => "VERIFIED GALANG",
                            "VERIFIED BENGKONG" => "VERIFIED BENGKONG",
                            "VERIFIED BATAM KOTA" => "VERIFIED BATAM KOTA",
                            "VERIFIED SAGULUNG" => "VERIFIED SAGULUNG",
                            "VERIFIED BATU AJI" => "VERIFIED BATU AJI"
                        ])->required()
                ])->columns(3)
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                //
            ])
            ->bulkActions([
               //
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\FilterHasilVerifikasi::route('/'),
            'create' => Pages\CreateHasilVerifikasi::route('/create'),
            'edit' => Pages\EditHasilVerifikasi::route('/{record}/edit'),
        ];
    }
}
