<div class="container mt-2">
  <div class="card shadow-sm">
    <div class="card-header  text-dark" style="background-color: #a0522d;">
      <h4 class="mb-0">Edit Rak</h4>
    </div>
    <div class="card-body"style="background-color: #f8e7d1;">
      <form wire:submit="update">
        <div class="mb-3">
          <label for="kode_rak" class="form-label fw-semibold">Kode Rak</label>
          <input id="kode_rak" type="text"
                 class="form-control @error('kode_rak') is-invalid @enderror"
                 wire:model.live="kode_rak">
          @error('kode_rak')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="lokasi" class="form-label fw-semibold">Lokasi</label>
          <input id="lokasi" type="text"
                 class="form-control @error('lokasi') is-invalid @enderror"
                 wire:model.live="lokasi">
          @error('lokasi')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="d-flex justify-content-between">
          <a href="{{ route('rak.index') }}" class="btn btn-secondary">
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
