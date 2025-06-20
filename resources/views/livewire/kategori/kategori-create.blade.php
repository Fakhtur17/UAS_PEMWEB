<div class="container mt-0">
  <div class="card shadow">
    <div class="card-header text-white d-flex justify-content-between align-items-center"style="background-color: #a0522d;">
      <h4 class="mb-0">Tambah Kategori</h4>
    </div>
    <div class="card-body" style="background-color: #f8e7d1;">
      <form wire:submit="simpan">
        <div class="mb-3">
          <label for="nama_kategori" class="form-label fw-semibold">Nama Kategori</label>
          <input
            type="text"
            id="nama_kategori"
            class="form-control @error('nama_kategori') is-invalid @enderror"
            wire:model.live="nama_kategori"
            placeholder="Masukkan nama kategori"
          >
          @error('nama_kategori')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="deskripsi" class="form-label fw-semibold">Deskripsi</label>
          <textarea
            id="deskripsi"
            class="form-control @error('deskripsi') is-invalid @enderror"
            wire:model.live="deskripsi"
            rows="3"
            placeholder="Deskripsi kategori (opsional)"
          ></textarea>
          @error('deskripsi')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="d-flex justify-content-between">
          <a href="{{ route('kategori.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left-circle"></i> Kembali
          </a>
          <button type="submit" class="btn btn-secondary">
            <i class="bi bi-save"></i> Simpan
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
