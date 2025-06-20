<?php

namespace App\Livewire\Peminjaman;

use Livewire\Component;
use App\Models\Peminjaman;
use App\Models\Buku;
use App\Models\Anggota;

class PeminjamanEdit extends Component
{
    public $peminjamanId, $buku_id, $anggota_id, $tanggal_pinjam, $tanggal_kembali;

    protected $rules = [
        'buku_id'          => 'required|exists:bukus,id',
        'anggota_id'       => 'required|exists:anggotas,id',
        'tanggal_pinjam'   => 'required|date',
        'tanggal_kembali'  => 'required|date|after_or_equal:tanggal_pinjam',
    ];

    public function mount($id)
    {
        $p = Peminjaman::findOrFail($id);
        $this->peminjamanId   = $p->id;
        $this->buku_id        = $p->buku_id;
        $this->anggota_id     = $p->anggota_id;
        $this->tanggal_pinjam = $p->tanggal_pinjam->format('Y-m-d');
        $this->tanggal_kembali= $p->tanggal_kembali->format('Y-m-d');
    }

    public function update()
    {
        $this->validate();

        Peminjaman::findOrFail($this->peminjamanId)->update([
            'buku_id'         => $this->buku_id,
            'anggota_id'      => $this->anggota_id,
            'tanggal_pinjam'  => $this->tanggal_pinjam,
            'tanggal_kembali' => $this->tanggal_kembali,
        ]);

        session()->flash('success', 'Peminjaman berhasil diperbarui.');
        return redirect()->route('peminjaman.index');
    }

    public function render()
    {
        return view('livewire.peminjaman.edit', [
            'bukus'    => Buku::all(),
            'anggotas' => Anggota::all(),
        ])->layout('layouts.app');
    }
}
