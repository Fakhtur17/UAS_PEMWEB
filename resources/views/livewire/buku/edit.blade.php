<div class="container mt-2 mb-2">
    <div class="card">
        <div class="card-header text-white"style="background-color: #a0522d;">
            <h5 class="mb-0">Edit Buku</h5>
        </div>
        <div class="card-body" style="background-color: #f8e7d1;">
            <form wire:submit="update">
                <div class="mb-3">
                    <label>Judul Buku</label>
                    <input type="text" wire:model.live="judul" class="form-control">
                    @error('judul') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="mb-3">
                    <label>Penulis</label>
                    <input type="text" wire:model.live="penulis" class="form-control">
                    @error('penulis') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="mb-3">
                    <label>Tahun Terbit</label>
                    <input type="number" wire:model.live="tahun_terbit" class="form-control">
                    @error('tahun_terbit') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="mb-3">
                    <label for="stok" class="form-label fw-semibold">Stok Buku</label>
                    <input type="number" min="0" wire:model.live="stok"
                            class="form-control @error('stok') is-invalid @enderror">
                    @error('stok')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    </div>

                <div class="mb-3">
                    <label>Kategori</label>
                    <select wire:model.live="kategori_id" class="form-control">
                        <option value="">-- Pilih Kategori --</option>
                        @foreach($kategoris as $kategori)
                            <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                        @endforeach
                    </select>
                    @error('kategori_id') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="mb-3">
                    <label>Rak</label>
                    <select wire:model.live="rak_id" class="form-control">
                        <option value="">-- Pilih Rak --</option>
                        @foreach($raks as $rak)
                            <option value="{{ $rak->id }}">{{ $rak->kode_rak }} - {{ $rak->lokasi }}</option>
                        @endforeach
                    </select>
                    @error('rak_id') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('buku.index') }}" class="btn btn-secondary">Kembali</a>
                    <div>
                        <button type="button" wire:click="resetForm" class="btn btn-secondary me-2">Reset</button>
                        <button type="submit" class="btn btn-secondary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
