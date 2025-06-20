<?php

namespace App\Livewire\Buku;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Rak;
use Livewire\Component;

class BukuEdit extends Component
{
    public $bukuId;
    public $judul, $penulis, $tahun_terbit, $kategori_id, $rak_id, $stok;

    protected $rules = [
        'judul' => 'required|string',
        'penulis' => 'required|string',
        'tahun_terbit' => 'required|digits:4',
        'kategori_id' => 'required|exists:kategoris,id',
        'rak_id' => 'required|exists:raks,id',
        'stok' => 'required|integer|min:0',
    ];

    public function mount($id)
    {
        $buku = Buku::findOrFail($id);
        $this->bukuId = $buku->id;
        $this->judul = $buku->judul;
        $this->penulis = $buku->penulis;
        $this->tahun_terbit = $buku->tahun_terbit;
        $this->kategori_id = $buku->kategori_id;
        $this->rak_id = $buku->rak_id;
        $this->stok = $buku->stok;
    }

    public function update()
    {
        $this->validate();

        Buku::findOrFail($this->bukuId)->update([
            'judul' => $this->judul,
            'penulis' => $this->penulis,
            'tahun_terbit' => $this->tahun_terbit,
            'kategori_id' => $this->kategori_id,
            'rak_id' => $this->rak_id,
            'stok' => $this->stok,
        ]);

        session()->flash('success', 'Buku berhasil diupdate!');
        return redirect()->route('buku.index');
    }

    public function resetForm()
    {
        $buku = Buku::findOrFail($this->bukuId);
        $this->judul = $buku->judul;
        $this->penulis = $buku->penulis;
        $this->tahun_terbit = $buku->tahun_terbit;
        $this->kategori_id = $buku->kategori_id;
        $this->rak_id = $buku->rak_id;
        $this->stok = $buku->stok;
    }

    public function render()
    {
        return view('livewire.buku.edit', [
            'kategoris' => Kategori::all(),
            'raks' => Rak::all(),
        ])->layout('layouts.app');
    }
}
