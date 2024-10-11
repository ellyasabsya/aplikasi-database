<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Koordinator;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Pages\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\KoordinatorResource\Pages;
use App\Filament\Resources\KoordinatorResource\RelationManagers;
use App\Filament\Resources\KoordinatorResource\Pages\EditKoordinator;
use App\Filament\Resources\KoordinatorResource\Pages\ListKoordinators;
use App\Filament\Resources\KoordinatorResource\Pages\CreateKoordinator;

class KoordinatorResource extends Resource
{
    protected static ?string $model = Koordinator::class;

    protected static ?string $navigationLabel = 'Koordinator';

    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function getNavigationGroup(): ?string
    {
        return 'Setting'; // Nama grup navigasi yang sama
    }
    protected static ?int $navigationSort = 5;
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
                    ->rules(['digits:16', 'unique:koordinators,nik']) // Harus tepat 16 digit
                    ->helperText('NIK harus terdiri dari 16 digit')
                    ->required(),

                    TextInput::make('nama')
                    ->label('NAMA LENGKAP')
                    ->required(),

                    TextInput::make('t_lahir')
                    ->label('TEMPAT LAHIR')
                    ->required(),

                    DatePicker::make('tgl_lahir')
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

                    Select::make('kec')
                    ->label('KECAMATAN')
                    ->options([
                        "BELAKANG PADANG" => "BELAKANG PADANG",
                        "BATU AMPAR" => "BATU AMPAR",
                        "SEKUPANG" => "SEKUPANG",
                        "NONGSA" => "NONGSA",
                        "BULANG" => "BULANG",
                        "LUBUK BAJA" => "LUBUK BAJA",
                        "SEI BEDUK" => "SEI BEDUK",
                        "GALANG" => "GALANG",
                        "BENGKONG" => "BENGKONG",
                        "BATAM KOTA" => "BATAM KOTA",
                        "SAGULUNG" => "SAGULUNG",
                        "BATU AJI" => "BATU AJI"
                    ])->required(),

                    TextInput::make('nohp')
                    ->label('NOMOR HP')
                    ->required(),

                    TextInput::make('wilayah')
                    ->label('WILAYAH KERJA')
                    ->required()
                    
                   
            ])->columns(3)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            
          
            TextColumn::make('nik')
            ->label('NIK')->searchable()
            ->sortable(),

            TextColumn::make('nama')
            ->label('NAMA')->searchable()
            ->sortable(),

            TextColumn::make('tps')
            ->label('TPS')->searchable()
            ->sortable(),

            TextColumn::make('kel')
            ->label('KELURAHAN')->searchable()
            ->sortable(),

            TextColumn::make('kec')
            ->label('KECAMATAN')->searchable()
            ->sortable(),

            TextColumn::make('nohp')
            ->label('NOMOR HP')->searchable()
            ->sortable(),

            TextColumn::make('wilayah')
            ->label('WILAYAH KERJA')->searchable()
            ->sortable()
            ])
            ->searchable()
            ->filters([
                //
            ])
            ->actions([
               //
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListKoordinators::route('/'),
            'create' => Pages\CreateKoordinator::route('/create'),
            'edit' => Pages\EditKoordinator::route('/{record}/edit'),
        ];
    }
    public static function shouldRegisterNavigation(): bool
{
    return auth()->user()->role === 'ADMIN'; // Hanya admin yang bisa melihat resource ini
}
}
