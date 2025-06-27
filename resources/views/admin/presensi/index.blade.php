<x-app-layout>
    {{-- CSS Khusus Halaman Rekap Presensi --}}
    @push('styles')
    <style>
        .panel {
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1), 0 4px 6px -2px rgba(0,0,0,0.05);
            padding: 24px;
        }
        .filter-form {
            display: flex;
            align-items: flex-end;
            gap: 16px;
            margin-bottom: 24px;
            padding-bottom: 24px;
            border-bottom: 1px solid #e5e7eb;
        }
        .data-table {
            width: 100%;
            border-collapse: collapse;
        }
        .data-table thead {
            background-color: #f9fafb;
        }
        .data-table th, .data-table td {
            padding: 12px 16px;
            text-align: left;
            border-bottom: 1px solid #e5e7eb;
        }
        .data-table th {
            font-size: 12px;
            font-weight: 700;
            color: #4b5563;
            text-transform: uppercase;
        }
        .data-table tbody tr:hover {
            background-color: #f0f5ff; /* Warna hover biru muda */
        }
        .status-badge {
            padding: 4px 10px;
            border-radius: 9999px;
            font-size: 12px;
            font-weight: 600;
        }
        .status-tepat {
            background-color: #d1fae5;
            color: #065f46;
        }
        .status-terlambat {
            background-color: #fee2e2;
            color: #991b1b;
        }
    </style>
    @endpush

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Rekap Seluruh Presensi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="panel">
                <div class="filter-form">
                    <form method="GET" action="{{ route('admin.presensi.index') }}" class="flex items-end space-x-4">
                        <div>
                            <label for="tanggal" class="block text-sm font-medium text-gray-700">Filter Tanggal</label>
                            <input type="date" name="tanggal" id="tanggal" value="{{ request('tanggal') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        </div>
                        <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 text-sm font-semibold">Filter</button>
                        <a href="{{ route('admin.presensi.index') }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 text-sm font-semibold">Reset</a>
                    </form>
                </div>

                <div class="overflow-x-auto">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Karyawan</th>
                                <th>Tanggal</th>
                                <th>Jam Masuk/Pulang</th>
                                <th>Foto</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($presensi as $item)
                                <tr>
                                    <td>
                                        <div class="text-sm font-semibold text-gray-900">{{ $item->user->name }}</div>
                                        <div class="text-xs text-gray-500">{{ $item->user->jabatan }}</div>
                                    </td>
                                    <td class="text-sm text-gray-700">{{ \Carbon\Carbon::parse($item->tanggal_presensi)->translatedFormat('d M Y') }}</td>
                                    <td>
                                        <div class="text-sm font-mono text-gray-800">Masuk: {{ $item->jam_masuk }}</div>
                                        <div class="text-sm font-mono text-gray-500">Pulang: {{ $item->jam_pulang ?? '-' }}</div>
                                    </td>
                                    <td>
                                        <div class="flex items-center space-x-2">
                                            <img src="{{ Storage::url($item->foto_masuk) }}" class="h-12 w-12 object-cover rounded-md shadow-sm">
                                            @if($item->foto_pulang)
                                                <img src="{{ Storage::url($item->foto_pulang) }}" class="h-12 w-12 object-cover rounded-md shadow-sm">
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <span class="status-badge {{ $item->status == 'tepat_waktu' ? 'status-tepat' : 'status-terlambat' }}">
                                            {{ $item->status == 'tepat_waktu' ? 'Tepat Waktu' : 'Terlambat' }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-16 text-gray-500">Tidak ada data presensi yang cocok.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="mt-6">
                    {{ $presensi->appends(request()->query())->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>