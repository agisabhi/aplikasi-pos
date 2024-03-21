<?php

namespace App\Livewire;

use App\Models\Menu;
use Livewire\Component;

class ListMenu extends Component
{
    public function render()
    {
        $data = [
            'menus' => Menu::all(),
        ];
        return view('livewire.list-menu', $data);
    }
}
