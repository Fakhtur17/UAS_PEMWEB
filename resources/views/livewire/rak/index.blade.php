<div class="container mt-2">
  <div class="card shadow-sm">
    <div class="card-header  text-white d-flex justify-content-between align-items-center" style="background-color: #a0522d;">
      <h4 class="mb-0">Daftar Rak</h4>
      <a href="{{ route('rak.create') }}" class="btn btn-light text-primary">
        <i class="fa fa-plus me-1"></i> Tambah Rak
      </a>
    </div>
    <div class="card-body" style="background-color: #f8e7d1;">
      @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif

      <div class="mb-3">
        <input type="text" wire:model.live.debounce.500ms="search" class="form-control" placeholder="Cari kode atau lokasi...">
      </div>

      <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
          <thead class="table-secondary text-center">
            <tr>
              <th>#</th>
              <th>Kode Rak</th>
              <th>Lokasi</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse($raks as $rak)
              <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $rak->kode_rak }}</td>
                <td>{{ $rak->lokasi }}</td>
                <td class="text-center">
                  <a href="{{ route('rak.edit', $rak->id) }}" class="btn btn-sm btn-secondary me-1">
                    <i class="fa fa-edit"></i>
                  </a>
                  <button wire:click="delete({{ $rak->id }})"
                          class="btn btn-sm btn-secondary"
                          onclick="return confirm('Yakin ingin menghapus rak ini?')">
                    <i class="fa fa-trash"></i>
                  </button>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="4" class="text-center text-muted">Belum ada data rak.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>

      <div class="mt-3">
        {{ $raks->links() }}
      </div>
    </div>
  </div>
</div>
