<?php

namespace App\Livewire\Buku;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Rak;
use Livewire\Component;

class BukuCreate extends Component
{
    public $judul, $penulis, $tahun_terbit, $kategori_id, $rak_id, $stok;

    protected $rules = [
        'judul' => 'required|string',
        'penulis' => 'required|string',
        'tahun_terbit' => 'required|digits:4',
        'kategori_id' => 'required|exists:kategoris,id',
        'rak_id' => 'required|exists:raks,id',
        'stok' => 'required|integer|min:0',
    ];

    public function simpan()
    {
        $this->validate();

        Buku::create([
            'judul' => $this->judul,
            'penulis' => $this->penulis,
            'tahun_terbit' => $this->tahun_terbit,
            'kategori_id' => $this->kategori_id,
            'rak_id' => $this->rak_id,
            'stok' => $this->stok,
        ]);

        session()->flash('success', 'Buku berhasil ditambahkan!');
        return redirect()->route('buku.index');
    }

    public function render()
    {
        return view('livewire.buku.create', [
            'kategoris' => Kategori::all(),
            'raks' => Rak::all(),
        ])->layout('layouts.app');
    }
}
