<?php

namespace App\Livewire\Anggota;

use Livewire\Component;
use App\Models\Anggota;

class AnggotaEdit extends Component
{
    public $anggotaId, $nama, $nim, $alamat, $no_hp;

    protected $rules = [
        'nama'   => 'required|string|max:255',
        'nim'    => 'required|string|max:20|unique:anggotas,nim,{{ $anggotaId }}',
        'alamat' => 'required|string|max:500',
        'no_hp'  => 'required|string|max:20',
    ];

    public function mount($id)
    {
        $a = Anggota::findOrFail($id);
        $this->anggotaId = $a->id;
        $this->nama      = $a->nama;
        $this->nim       = $a->nim;
        $this->alamat    = $a->alamat;
        $this->no_hp     = $a->no_hp;
    }

    public function update()
    {
        $this->validate();

        Anggota::findOrFail($this->anggotaId)->update([
            'nama'   => $this->nama,
            'nim'    => $this->nim,
            'alamat' => $this->alamat,
            'no_hp'  => $this->no_hp,
        ]);

        session()->flash('success', 'Anggota berhasil diubah.');
        return redirect()->route('anggota.index');
    }

    public function render()
    {
        return view('livewire.anggota.anggota-edit')
               ->layout('layouts.app');
    }
}
