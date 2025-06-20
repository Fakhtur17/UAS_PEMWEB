<?php

namespace App\Livewire\Buku;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Rak;
use Livewire\Component;
use Livewire\WithPagination;

class BukuIndex extends Component
{
    use WithPagination;

    public $judul, $penulis, $tahun_terbit, $kategori_id, $rak_id, $bukuId;
    public $search = 'Had';
    public $isEdit = false;
public $stok; // tambah ini

protected $rules = [
    'judul' => 'required|string',
    'penulis' => 'required|string',
    'tahun_terbit' => 'required|digits:4',
    'kategori_id' => 'required|exists:kategoris,id',
    'rak_id' => 'required|exists:raks,id',
    'stok' => 'required|integer|min:0',
];


    protected $paginationTheme = 'bootstrap'; // atau 'tailwind' sesuai UI-mu

    // ✅ Reset form saat pindah halaman
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
{
    logger('Search keyword:', [$this->search]);

    $bukus = Buku::with(['kategori', 'rak'])
        ->when($this->search, function ($query) {
            $query->where(function ($q) {
                $q->where('judul', 'like', '%' . $this->search . '%')
                  ->orWhere('penulis', 'like', '%' . $this->search . '%');
            });
        })
        ->latest()
        ->paginate(5);

    return view('livewire.buku.index', [
        'bukus' => $bukus,
        'kategoris' => Kategori::all(),
        'raks' => Rak::all(),
    ])->layout('layouts.app');
}
    public function store()
{
    $this->validate();

    Buku::create([
        'judul' => $this->judul,
        'penulis' => $this->penulis,
        'tahun_terbit' => $this->tahun_terbit,
        'kategori_id' => $this->kategori_id,
        'rak_id' => $this->rak_id,
        'stok' => $this->stok,
    ]);

    $this->resetForm();
    session()->flash('success', 'Data buku berhasil ditambahkan!');
}


    public function edit($id)
{
    $buku = Buku::findOrFail($id);

    $this->bukuId = $id;
    $this->judul = $buku->judul;
    $this->penulis = $buku->penulis;
    $this->tahun_terbit = $buku->tahun_terbit;
    $this->kategori_id = $buku->kategori_id;
    $this->rak_id = $buku->rak_id;
    $this->stok = $buku->stok;
    $this->isEdit = true;
}


    public function update()
{
    $this->validate();

    Buku::findOrFail($this->bukuId)->update([
        'judul' => $this->judul,
        'penulis' => $this->penulis,
        'tahun_terbit' => $this->tahun_terbit,
        'kategori_id' => $this->kategori_id,
        'rak_id' => $this->rak_id,
        'stok' => $this->stok,
    ]);

    $this->resetForm();
    session()->flash('success', 'Data buku berhasil diubah!');

    $this->resetPage();
}

public function mount()
{
    $this->search = '';
}
protected $listeners = ['searchUpdated'];

public function searchUpdated()
{
    $this->resetPage();
}

    public function delete($id)
    {
        Buku::findOrFail($id)->delete();
        session()->flash('success', 'Data buku berhasil dihapus!');
    }

    public function resetForm()
{
    $this->reset([
        'judul', 'penulis', 'tahun_terbit',
        'kategori_id', 'rak_id', 'stok',
        'bukuId', 'isEdit'
    ]);
}

}
