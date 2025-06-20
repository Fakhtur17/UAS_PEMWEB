<div class="container mt-0 mb-2">
    <div class="card shadow">
        <div class="card-header text-white d-flex justify-content-between align-items-center" style="background-color: #a0522d;">
            <h4 class="mb-0">Daftar Buku</h4>
            <a href="{{ route('buku.create') }}" class="btn btn-light text-primary fw-bold">
                <i class="fa fa-plus me-1"></i> Tambah Buku
            </a>
        </div>

        <div class="card-body" style="background-color: #f8e7d1;">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Pencarian --}}
            <div class="mb-3">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari judul atau penulis..." wire:model.live="search">
                    <span class="input-group-text bg-primary text-white">
                        <i class="fa fa-search"></i>
                    </span>
                </div>
            </div>

            @if($search)
                <div class="text-muted mb-2">
                    Menampilkan hasil untuk pencarian: <strong>{{ $search }}</strong>
                </div>
            @endif

            <div class="mb-3 text-end text-muted">
                <strong>Total Stok Buku: {{ $bukus->sum('stok') }}</strong>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-secondary text-center">
                        <tr>
                            <th>#</th>
                            <th>Judul</th>
                            <th>Penulis</th>
                            <th>Kategori</th>
                            <th>Rak</th>
                            <th>Tahun</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($bukus as $buku)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $buku->judul }}</td>
                                <td>{{ $buku->penulis }}</td>
                                <td>{{ $buku->kategori->nama_kategori ?? '-' }}</td>
                                <td>{{ $buku->rak ? $buku->rak->kode_rak . ' - ' . $buku->rak->lokasi : '-' }}</td>
                                <td class="text-center">{{ $buku->tahun_terbit }}</td>
                                <td class="text-center">
                                    @if($buku->stok == 0)
                                        <span class="badge bg-danger">Habis</span>
                                    @elseif($buku->stok < 3)
                                        <span class="badge bg-warning text-dark">{{ $buku->stok }} (menipis)</span>
                                    @else
                                        <span class="badge bg-success">{{ $buku->stok }}</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('buku.edit', $buku->id) }}" class="btn btn-sm btn-secondary me-1">
                                        <i class="fa fa-edit me-1"></i>Edit
                                    </a>
                                    <button wire:click="delete({{ $buku->id }})" onclick="return confirm('Yakin ingin menghapus buku ini?')" class="btn btn-sm btn-secondary">
                                        <i class="fa fa-trash me-1"></i>Hapus
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center text-muted">Belum ada data buku.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            <div>
                {{ $bukus->links() }}
            </div>
        </div>
    </div>
</div>
