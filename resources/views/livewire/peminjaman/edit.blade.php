<div class="container mt-2">
  <div class="card shadow-sm">
    <div class="card-header text-dark"style="background-color: #a0522d;">
      <h4 class="mb-0">Edit Peminjaman</h4>
    </div>
    <div class="card shadow-sm" style="background-color: #f8e7d1;">
      <form wire:submit="update">
        <div class="mb-3">
          <label for="anggota_id" class="form-label fw-semibold">Anggota</label>
          <select id="anggota_id" wire:model.live="anggota_id"
                  class="form-select @error('anggota_id') is-invalid @enderror">
            <option value="">-- Pilih Anggota --</option>
            @foreach($anggotas as $a)
              <option value="{{ $a->id }}">{{ $a->nama }} ({{ $a->nim }})</option>
            @endforeach
          </select>
          @error('anggota_id')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="buku_id" class="form-label fw-semibold">Buku</label>
          <select id="buku_id" wire:model.live="buku_id"
                  class="form-select @error('buku_id') is-invalid @enderror">
            <option value="">-- Pilih Buku --</option>
            @foreach($bukus as $b)
              <option value="{{ $b->id }}">{{ $b->judul }}</option>
            @endforeach
          </select>
          @error('buku_id')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="tanggal_pinjam" class="form-label fw-semibold">Tanggal Pinjam</label>
            <input id="tanggal_pinjam" type="date"
                   wire:model.live="tanggal_pinjam"
                   class="form-control @error('tanggal_pinjam') is-invalid @enderror">
            @error('tanggal_pinjam')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="col-md-6 mb-3">
            <label for="tanggal_kembali" class="form-label fw-semibold">Tanggal Kembali</label>
            <input id="tanggal_kembali" type="date"
                   wire:model.live="tanggal_kembali"
                   class="form-control @error('tanggal_kembali') is-invalid @enderror">
            @error('tanggal_kembali')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <div class="d-flex justify-content-between">
          <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left-circle"></i> Kembali
          </a>
          <button type="submit" class="btn btn-secondary">
            <i class="bi bi-pencil-square"></i> Update
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
