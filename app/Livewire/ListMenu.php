<?php

namespace App\Livewire;

use App\Models\Antrian;
use App\Models\AntrianDetail;
use App\Models\Cart;
use App\Models\Menu;
use Livewire\Component;
use Livewire\Attributes\Rule;
use App\Models\Kategori;
use Livewire\WithPagination;

class ListMenu extends Component
{
    use WithPagination;
    public $search;

    #[Rule('required')]
    public $no_meja;

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

    public function deletecart($id)
    {
        Cart::where('id', $id)->delete();
        session()->flash('success', 'Success Delete Menu');
    }

    public function createAntrian()
    {
        $validate = $this->validateOnly('no_meja');

        //Ambil Data dari Tabel Cart
        $carts = Cart::get();

        //Input Data ke Tabel Antrian
        $antrian = Antrian::create(['no_meja' => $this->no_meja]);

        //Masukkan data satu per satu dari tabel cart
        foreach ($carts as $cart) {
            $validated = [
                'antrian_id' => $antrian->id,
                'menu_id' => $cart->menu_id,
                'qty' => $cart->qty,
                'harga' => $cart->harga,
            ];
            AntrianDetail::create($validated);
        }

        //Reset tabel cart
        Cart::truncate();

        //reset variabel public no_meja
        $this->reset(['no_meja']);
        session()->flash('success', 'Success Simpan Antrian');
    }
}
