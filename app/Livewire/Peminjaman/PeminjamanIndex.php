<?php

namespace App\Livewire\Peminjaman;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Peminjaman;

class PeminjamanIndex extends Component
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
        Peminjaman::findOrFail($id)->delete();
        session()->flash('success', 'Data peminjaman berhasil dihapus!');
    }
public $totalSedangDipinjam;
        public function render()
    {
        $this->totalSedangDipinjam = Peminjaman::count(); // Atau pakai where('status', 'dipinjam') jika punya kolom status

        $peminjamans = Peminjaman::with(['anggota', 'buku'])
            ->when($this->search, function($q) {
                $q->whereHas('anggota', function($q2) {
                    $q2->where('nama', 'like', '%' . $this->search . '%');
                });
            })
            ->latest()
            ->paginate(10);

        return view('livewire.peminjaman.index', [
        'peminjamans' => $peminjamans,
        'totalSedangDipinjam' => $this->totalSedangDipinjam,
        ])->layout('layouts.app');

    }

}
