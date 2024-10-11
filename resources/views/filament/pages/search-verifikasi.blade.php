<x-filament::page>
    <x-filament::card>
        <form wire:submit.prevent="search">
            {{ $this->form }}
            <br>
            <x-filament::button type="submit" class="mt-4">
                Cari Data
            </x-filament::button>
        </form>
    </x-filament::card>

    @if($verifikasi)
        <x-filament::card class="mt-4">
            <div class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <h3 class="font-medium text-gray-500">NIK</h3>
                        <p>{{ $verifikasi->nik }}</p>
                    </div>
                    <div>
                        <h3 class="font-medium text-gray-500">Nama</h3>
                        <p>{{ $verifikasi->nama }}</p>
                    </div>
                    <div>
                        <h3 class="font-medium text-gray-500">Tempat, Tanggal Lahir</h3>
                        <p>{{ $verifikasi->t_lahir }}, {{ $verifikasi->tgl_lahir }}</p>
                    </div>
                    <div>
                        <h3 class="font-medium text-gray-500">Alamat</h3>
                        <p>{{ $verifikasi->alamat }}</p>
                    </div>
                    <div>
                        <h3 class="font-medium text-gray-500">RT/RW</h3>
                        <p>{{ $verifikasi->rt }}/{{ $verifikasi->rw }}</p>
                    </div>
                    <div>
                        <h3 class="font-medium text-gray-500">TPS</h3>
                        <p>{{ $verifikasi->tps }}</p>
                    </div>
                    <div>
                        <h3 class="font-medium text-gray-500">Status</h3>
                        <p>{{ $verifikasi->status }}</p>
                    </div>
                </div>

                <!-- Tombol Edit -->
                <x-filament::button 
                    tag="a" 
                    href="{{ route('filament.admin.resources.verifikasis.edit', $verifikasi->id) }}" 
                    class="mt-4">
                    Edit Data
                </x-filament::button>
            </div>
        </x-filament::card>
    @endif
</x-filament::page>
