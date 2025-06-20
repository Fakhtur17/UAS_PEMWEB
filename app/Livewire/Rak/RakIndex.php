<?php

namespace App\Livewire\Rak;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Rak;

class RakIndex extends Component
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
        Rak::findOrFail($id)->delete();
        session()->flash('success', 'Rak berhasil dihapus!');
    }

    public function render()
    {
        $raks = Rak::where('kode_rak', 'like', "%{$this->search}%")
                   ->orWhere('lokasi', 'like', "%{$this->search}%")
                   ->latest()
                   ->paginate(10);

        return view('livewire.rak.index', compact('raks'))
               ->layout('layouts.app');
    }
}
