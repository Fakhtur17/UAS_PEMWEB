<div class="container mt-0 mb-2">
        <div class="card shadow">
            <div class="card-header text-white d-flex justify-content-between align-items-center"style="background-color: #a0522d;">
                <h4 class="mb-0">Daftar Kategori</h4>
                <a href="{{ url('/kategori/create') }}" class="btn btn-light text-primary fw-bold">
                    <i class="fa fa-plus me-1"></i> Tambah Kategori
                </a>
            </div>

            <div class="card-body" style="background-color: #f8e7d1;">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- Pencarian --}}
                <form action="{{ route('kategori.index') }}" method="GET" class="mb-3">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Cari nama kategori..." value="{{ request('search') }}">
                        <button type="submit" class="btn btn-outline-primary">
                            <i class="fa fa-search me-1"></i> Cari
                        </button>
                    </div>
                </form>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="table-secondary text-center">
                            <tr>
                                <th>#</th>
                                <th>Nama Kategori</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($kategoris as $kategori)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                   <td>{{ $kategori->nama_kategori }}</td>
                                    <td>{{ $kategori->deskripsi ?? '-' }}</td>
                                   <td class="text-center">
                                        <a href="{{ route('kategori.edit', $kategori->id) }}" class="btn btn-secondary btn-sm">
                                            Edit
                                        </a>
                                        <button wire:click="destroy({{ $kategori->id }})" class="btn btn-sm btn-secondary" onclick="return confirm('Yakin ingin menghapus kategori ini?')">
                                            <i class="fa fa-trash me-1"></i>Hapus
                                        </button>
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted">Belum ada data kategori.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                {{ $kategoris->links() }}
            </div>
        </div>
</div>