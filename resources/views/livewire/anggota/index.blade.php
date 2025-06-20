<div class="container mt-2">
  <div class="card shadow-sm">
    <div class="card-header text-white d-flex justify-content-between"style="background-color: #a0522d;">
      <h4 class="mb-0">Daftar Anggota</h4>
      <a href="{{ route('anggota.create') }}" class="btn btn-light text-primary">
        <i class="fa fa-plus me-1"></i> Tambah Anggota
      </a>
    </div>
    <div class="card-body" style="background-color: #f8e7d1;">
      @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif

      <div class="mb-3">
        <input type="text" wire:model.live.debounce.500ms="search" class="form-control" placeholder="Cari nama atau NIM...">
      </div>

      <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
          <thead class="table-secondary text-center">
            <tr>
              <th>#</th>
              <th>Nama</th>
              <th>NIM</th>
              <th>Alamat</th>
              <th>No. HP</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse($anggotas as $a)
              <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $a->nama }}</td>
                <td>{{ $a->nim }}</td>
                <td>{{ $a->alamat }}</td>
                <td>{{ $a->no_hp }}</td>
                <td class="text-center">
                  <a href="{{ route('anggota.edit', $a->id) }}"
                     class="btn btn-sm btn-secondary me-1">
                    <i class="fa fa-edit"></i>
                  </a>
                  <button wire:click="delete({{ $a->id }})"
                          class="btn btn-sm btn-secondary"
                          onclick="return confirm('Yakin ingin menghapus anggota ini?')">
                    <i class="fa fa-trash"></i>
                  </button>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="6" class="text-center text-muted">Belum ada data anggota.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>

      <div class="mt-3">
        {{ $anggotas->links() }}
      </div>
    </div>
  </div>
</div>
