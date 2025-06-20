<div class="container mt-2">
  <div class="card shadow-sm">
    <div class="card-header text-white d-flex justify-content-between align-items-center"style="background-color: #a0522d;">
      <h4 class="mb-0">Daftar Peminjaman</h4>
      <a href="{{ route('peminjaman.create') }}" class="btn btn-light text-primary">
        <i class="fa fa-plus me-1"></i> Tambah Peminjaman
      </a>
    </div>
    <div class="card-body" style="background-color: #f8e7d1;">
      @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif
      <div class="mb-3">
        <input type="text" wire:model.live.debounce.500ms="search"
              class="form-control" placeholder="Cari nama anggota...">
      </div>

      <div class="mb-3">
        <strong>Total Buku yang Sedang Dipinjam:</strong>
        <span class="badge bg-info text-dark">{{ $totalSedangDipinjam }}</span>
      </div>

      <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
          <thead class="table-secondary text-center">
            <tr>
              <th>#</th>
              <th>Anggota</th>
              <th>Buku</th>
              <th>Pinjam</th>
              <th>Kembali</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse($peminjamans as $p)
              <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $p->anggota->nama }}</td>
                <td>{{ $p->buku->judul }}</td>
                <td class="text-center">{{ $p->tanggal_pinjam->format('d/m/Y') }}</td>
                <td class="text-center">{{ $p->tanggal_kembali->format('d/m/Y') }}</td>
                <td class="text-center">
                  <a href="{{ route('peminjaman.edit', $p->id) }}"
                     class="btn btn-sm btn-secondary">
                    <i class="fa fa-edit"></i>
                  </a>
                  <button wire:click="delete({{ $p->id }})"
                          class="btn btn-sm btn-secondary"
                          onclick="return confirm('Yakin menghapus data ini?')">
                    <i class="fa fa-trash"></i>
                  </button>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="6" class="text-center text-muted">
                  Belum ada data peminjaman.
                </td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
      <div class="mt-3">
        {{ $peminjamans->links() }}
      </div>
    </div>
  </div>
</div>
