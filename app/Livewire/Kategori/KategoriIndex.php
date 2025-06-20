<?php

namespace App\Livewire\Kategori;

use Livewire\Component;
use App\Models\Kategori;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Session;

class KategoriIndex extends Component
{
    use WithPagination;

    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        Session::flash('success', 'Kategori berhasil dihapus.');
    }

    public function render()
    {
        return view('livewire.kategori.index', [
            'kategoris' => Kategori::latest()->paginate(10)
        ])->layout('layouts.app');
    }
}
