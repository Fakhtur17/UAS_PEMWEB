<?php

namespace App\Livewire\Rak;

use Livewire\Component;
use App\Models\Rak;

class RakEdit extends Component
{
    public $rakId, $kode_rak, $lokasi;

    protected $rules = [
        'kode_rak' => 'required|string|max:50',
        'lokasi'   => 'required|string|max:255',
    ];

    public function mount($id)
    {
        $rak = Rak::findOrFail($id);
        $this->rakId   = $rak->id;
        $this->kode_rak = $rak->kode_rak;
        $this->lokasi   = $rak->lokasi;
    }

    public function update()
    {
        $this->validate();

        Rak::findOrFail($this->rakId)->update([
            'kode_rak' => $this->kode_rak,
            'lokasi'   => $this->lokasi,
        ]);

        session()->flash('success', 'Rak berhasil diubah.');
        return redirect()->route('rak.index');
    }

    public function render()
    {
        return view('livewire.rak.rak-edit')
               ->layout('layouts.app');
    }
}
