<?php

namespace App\Livewire\Peminjaman;

use Livewire\Component;
use App\Models\Peminjaman;
use App\Models\Buku;
use App\Models\Anggota;
use Carbon\Carbon;

class PeminjamanCreate extends Component
{
    public $buku_id, $anggota_id, $tanggal_pinjam, $tanggal_kembali;

    protected $rules = [
        'buku_id'         => 'required|exists:bukus,id',
        'anggota_id'      => 'required|exists:anggotas,id',
        'tanggal_pinjam'  => 'required|date',
        'tanggal_kembali' => 'required|date|after_or_equal:tanggal_pinjam',
    ];

    public function simpan()
    {
        $this->validate();

        // Validasi: maksimal 3 kali pinjam dalam 1 bulan untuk anggota yang sama
        $jumlahPinjamanBulanIni = Peminjaman::where('anggota_id', $this->anggota_id)
            ->whereMonth('tanggal_pinjam', Carbon::parse($this->tanggal_pinjam)->month)
            ->whereYear('tanggal_pinjam', Carbon::parse($this->tanggal_pinjam)->year)
            ->count();

        if ($jumlahPinjamanBulanIni >= 3) {
            session()->flash('error', 'Anggota ini sudah melakukan 3 peminjaman di bulan ini.');
            return;
        }

        Peminjaman::create([
            'buku_id'         => $this->buku_id,
            'anggota_id'      => $this->anggota_id,
            'tanggal_pinjam'  => $this->tanggal_pinjam,
            'tanggal_kembali' => $this->tanggal_kembali,
        ]);

        session()->flash('success', 'Peminjaman berhasil disimpan.');
        return redirect()->route('peminjaman.index');
    }

    public function render()
    {
        return view('livewire.peminjaman.create', [
            'bukus'    => Buku::all(),
            'anggotas' => Anggota::all(),
        ])->layout('layouts.app');
    }
}
