<?php

namespace App\Livewire\Anggota;

use Livewire\Component;
use App\Models\Anggota;

class AnggotaCreate extends Component
{
    public $nama, $nim, $alamat, $no_hp;

    protected $rules = [
        'nama'   => 'required|string|max:255',
        'nim'    => 'required|string|max:20|unique:anggotas,nim',
        'alamat' => 'required|string|max:500',
        'no_hp'  => 'required|string|max:20',
    ];

    public function simpan()
    {
        $this->validate();

        Anggota::create([
            'nama'   => $this->nama,
            'nim'    => $this->nim,
            'alamat' => $this->alamat,
            'no_hp'  => $this->no_hp,
        ]);

        session()->flash('success', 'Anggota berhasil ditambahkan.');
        return redirect()->route('anggota.index');
    }

    public function render()
    {
        return view('livewire.anggota.anggota-create')
               ->layout('layouts.app');
    }
}
