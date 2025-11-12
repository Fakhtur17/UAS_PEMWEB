<div class="container mt-5">
  <div class="card shadow-sm">
    <div class="card-header text-white" style="background-color: #a0522d;">
      <h4 class="mb-0">Tambah Anggota</h4>
    </div>
    <div class="card-body" style="background-color: #f8e7d1;">
      <form wire:submit.prevent="simpan">
        <div class="mb-3">
          <label for="nama" class="form-label fw-semibold">Nama</label>
          <input id="nama" name="nama" dusk="nama" type="text"
                 class="form-control @error('nama') is-invalid @enderror"
                 wire:model="nama">
          @error('nama')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="nim" class="form-label fw-semibold">NIM</label>
          <input id="nim" name="nim" dusk="nim" type="text"
                 class="form-control @error('nim') is-invalid @enderror"
                 wire:model="nim">
          @error('nim')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="alamat" class="form-label fw-semibold">Alamat</label>
          <input id="alamat" name="alamat" dusk="alamat" type="text"
                 class="form-control @error('alamat') is-invalid @enderror"
                 wire:model="alamat">
          @error('alamat')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="no_hp" class="form-label fw-semibold">No. HP</label>
          <input id="no_hp" name="no_hp" dusk="no_hp" type="text"
                 class="form-control @error('no_hp') is-invalid @enderror"
                 wire:model="no_hp">
          @error('no_hp')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="d-flex justify-content-between">
          <a href="{{ route('anggota.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left-circle"></i> Kembali
          </a>
          <button type="submit" dusk="simpan-button" class="btn btn-secondary">
            <i class="bi bi-save"></i> Simpan
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
