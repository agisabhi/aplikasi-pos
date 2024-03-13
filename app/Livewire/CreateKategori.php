<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Kategori;
use Livewire\Attributes\Rule;
use Livewire\WithPagination;

class CreateKategori extends Component
{
    use WithPagination;

    #[Rule('required|min:3|max:100')]
    public $nama_kategori;

    public $search;
    public $id_kategori;

    #[Rule('required|min:3|max:100')]
    public $edit_kategori;

    public function createKategori()
    {
        $validated = $this->validateOnly('nama_kategori');

        Kategori::create($validated);

        $this->reset(['nama_kategori']);
        session()->flash('success', 'Success Add Category');
    }

    public function edit($id)
    {
        $this->id_kategori = $id;
        $this->edit_kategori = Kategori::find($id)->nama_kategori;
    }

    public function cancelEdit()
    {
        $this->reset(['nama_kategori', 'id_kategori']);
    }

    public function update()
    {
        $this->validateOnly('edit_kategori');
        Kategori::where('id', $this->id_kategori)
            ->update(['nama_kategori' => $this->edit_kategori]);
        $this->reset(['edit_kategori', 'id_kategori']);
        session()->flash('success', 'Success Edit');
    }

    public function render()
    {
        $data = [
            'categories' => Kategori::latest()->where('nama_kategori', 'like', "%{$this->search}%")->paginate(10),
            'category_all' => Kategori::all(),
        ];
        return view('livewire.create-kategori', $data);
    }
}
