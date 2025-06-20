<?php

namespace App\Livewire\Rak;

use Livewire\Component;
use App\Models\Rak;

class RakCreate extends Component
{
    public $kode_rak, $lokasi;

    protected $rules = [
        'kode_rak' => 'required|string|max:50',
        'lokasi'   => 'required|string|max:255',
    ];

    public function simpan()
    {
        $this->validate();

        Rak::create([
            'kode_rak' => $this->kode_rak,
            'lokasi'   => $this->lokasi,
        ]);

        session()->flash('success', 'Rak berhasil ditambahkan.');
        return redirect()->route('rak.index');
    }

    public function render()
    {
        return view('livewire.rak.rak-create')
               ->layout('layouts.app');
    }
}
