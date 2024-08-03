<?php

namespace App\Livewire;

use App\Models\Cart;
use App\Models\Menu;
use Livewire\Component;
use App\Models\Kategori;
use Livewire\WithPagination;

class ListMenu extends Component
{
    use WithPagination;
    public $search;

    public function cart($id)
    {
        $menu = Menu::where('id', '=', $id)->first();
        $cek = Cart::where('menu_id', '=', $id)->count();
        if ($cek > 0) {
            $qtyold = Cart::where('menu_id', $id)->first();

            Cart::where('menu_id', $id)
                ->update(['qty' => ($qtyold->qty + 1)]);
        } else {
            $cart = [
                'menu_id' => $id,
                'qty' => 1,
                'harga' => $menu->harga,
            ];
            Cart::create($cart);
        }

        session()->flash('success', 'Menu Added');
    }

    public function render()
    {
        $data = [
            'menus' => Menu::latest()->where('nama_menu', 'like', "%{$this->search}%")->paginate(10),
            'kategoris' => Kategori::all(),
            'carts' => Cart::all(),
        ];
        return view('livewire.list-menu', $data);
    }
}
