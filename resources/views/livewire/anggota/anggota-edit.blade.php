<div class="container mt-5">
  <div class="card shadow-sm">
    <div class="card-header text-dark"style="background-color: #a0522d;">
      <h4 class="mb-0">Edit Anggota</h4>
    </div>
    <div class="card-body" style="background-color: #f8e7d1;">
      <form wire:submit="update">
        <div class="mb-3">
          <label for="nama" class="form-label fw-semibold">Nama</label>
          <input id="nama" type="text"
                 class="form-control @error('nama') is-invalid @enderror"
                 wire:model.live="nama">
          @error('nama')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="nim" class="form-label fw-semibold">NIM</label>
          <input id="nim" type="text"
                 class="form-control @error('nim') is-invalid @enderror"
                 wire:model.live="nim">
          @error('nim')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="alamat" class="form-label fw-semibold">Alamat</label>
          <input id="alamat" type="text"
                 class="form-control @error('alamat') is-invalid @enderror"
                 wire:model.live="alamat">
          @error('alamat')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="no_hp" class="form-label fw-semibold">No. HP</label>
          <input id="no_hp" type="text"
                 class="form-control @error('no_hp') is-invalid @enderror"
                 wire:model.live="no_hp">
          @error('no_hp')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="d-flex justify-content-between">
          <a href="{{ route('anggota.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left-circle"></i> Kembali
          </a>
          <button type="submit" class="btn btn-secondary text-white">
            <i class="bi bi-pencil-square"></i> Update
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
