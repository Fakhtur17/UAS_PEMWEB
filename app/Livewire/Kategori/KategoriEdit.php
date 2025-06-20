<?php

namespace App\Livewire\Kategori;

use Livewire\Component;
use App\Models\Kategori;
use Illuminate\Support\Facades\Session;

class KategoriEdit extends Component
{
    public $kategoriId, $nama_kategori, $deskripsi;

    public function mount($id)
    {
        $kat = Kategori::findOrFail($id);
        $this->kategoriId    = $kat->id;
        $this->nama_kategori = $kat->nama_kategori;
        $this->deskripsi     = $kat->deskripsi;
    }

    public function update()
    {
        $this->validate([
            'nama_kategori' => 'required|string|max:255',
            'deskripsi'     => 'nullable|string',
        ]);

        Kategori::findOrFail($this->kategoriId)->update([
            'nama_kategori' => $this->nama_kategori,
            'deskripsi'     => $this->deskripsi,
        ]);

        session()->flash('success', 'Kategori berhasil diubah.');
        return redirect()->route('kategori.index');
    }


    public function render()
    {
        return view('livewire.kategori.kategori-edit')
    ->layout('layouts.app');

    }
}
