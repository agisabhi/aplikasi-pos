<?php

namespace App\Livewire;

use App\Models\Kategori;
use App\Models\Menu;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class CreateMenu extends Component
{
    use WithFileUploads;

    #[Rule('required|max:150')]
    public $nama_menu;

    #[Rule('required')]
    public $kategori_id;

    #[Rule('required|max:100')]
    public $harga;

    #[Rule('required|max:200')]
    public $deskripsi;

    #[Rule('required|mimes:png,jpg,jpeg|max:2048')]
    public $foto;

    public function createMenu()
    {
        $validated = $this->validate();

        if ($this->foto) {
            $validated['foto'] = $this->foto->store('foto_menu', 'public');
        }

        Menu::create($validated);
        $this->reset('nama_menu', 'kategori_id', 'harga', 'deskripsi', 'foto');

        session()->flash('success', 'New Menu Added');
    }


    public function render()
    {
        $data = [
            'kategori' => Kategori::all(),
        ];
        return view('livewire.create-menu', $data);
    }
}
