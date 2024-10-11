<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;

class HasilVerifikasiExport implements FromCollection
{
    protected Collection $filteredRecords;

    public function __construct(Collection $filteredRecords)
    {
        $this->filteredRecords = $filteredRecords;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection(): Collection
    {
        return $this->filteredRecords; // Mengembalikan koleksi yang diterima
    }
}
