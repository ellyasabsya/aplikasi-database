<x-filament::page>
    <x-filament::card>
        <form wire:submit.prevent="applyFilters">
            {{ $this->form }}
            <br>
            <x-filament::button type="submit" class="mt-4">
                Terapkan Filter
            </x-filament::button>
        </form>
    </x-filament::card>

    @if(!empty($filteredResults) && $filteredResults->isNotEmpty())
        <x-filament::card class="mt-4">
            <h2 class="font-semibold text-lg">Hasil Filter</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th>NIK</th>
                            <th>NAMA</th>
                            <th>TPS</th>
                            <th>KELURAHAN</th>
                            <th>KECAMATAN</th>
                            <th>NO HP</th>
                            <th>STATUS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($filteredResults as $result)
                            <tr>
                                <td>{{ $result['nik'] }}</td>
                                <td>{{ $result['nama'] }}</td>
                                <td>{{ $result['tps'] }}</td>
                                <td>{{ $result['kel'] }}</td>
                                <td>{{ $result['kec'] }}</td>
                                <td>{{ $result['nohp'] }}</td>
                                <td>{{ $result['status'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <br>
            <!-- Tombol untuk mengekspor data yang terfilter -->
            <div class="mt-4">
                <x-filament::button type="button" wire:click="exportFilteredData">
                    Ekspor Hasil Filter
                </x-filament::button>
            </div>
        </x-filament::card>
    @else
        <x-filament::card class="mt-4">
            <p>Tidak ada data yang ditemukan.</p>
        </x-filament::card>
    @endif
</x-filament::page>
