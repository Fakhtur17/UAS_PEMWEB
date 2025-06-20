<?php

namespace App\Livewire\Anggota;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Anggota;

class AnggotaIndex extends Component
{
    use WithPagination;

    public $search = '';
    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function delete($id)
    {
        Anggota::findOrFail($id)->delete();
        session()->flash('success', 'Anggota berhasil dihapus!');
    }

    public function render()
    {
        $anggotas = Anggota::where('nama', 'like', "%{$this->search}%")
            ->orWhere('nim', 'like', "%{$this->search}%")
            ->latest()
            ->paginate(10);

        return view('livewire.anggota.index', compact('anggotas'))
               ->layout('layouts.app');
    }
}
