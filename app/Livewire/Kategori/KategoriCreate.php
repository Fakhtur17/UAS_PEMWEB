<?php

namespace App\Livewire\Kategori;

use Livewire\Component;
use App\Models\Kategori;
use Illuminate\Support\Facades\Session;

class KategoriCreate extends Component
{
    public $nama_kategori, $deskripsi;  // <-- ubah di sini

    public function simpan()
    {
        $this->validate([
            'nama_kategori' => 'required|string|max:255',
            'deskripsi'     => 'nullable|string',
        ]);

        Kategori::create([
            'nama_kategori' => $this->nama_kategori,  // <-- pakai nama_kategori
            'deskripsi'     => $this->deskripsi,
        ]);

        session()->flash('success', 'Kategori berhasil ditambahkan.');
        return redirect()->route('kategori.index');
    }

    public function render()
    {
        return view('livewire.kategori.kategori-create')
            ->layout('layouts.app');
    }

}
