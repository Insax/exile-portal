<?php

namespace App\Http\Livewire;

use App\Models\Clan;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class ListClans extends Component
{
    use WithPagination;

    /** @var int[]  */
    const AMOUNTS = [
        'default' => 20,
        'more' => 50,
        'most' => 100
    ];

    public int $items = 20;
    public string $type = 'All';
    public string $name = '';
    public $page = 1;

    protected $queryString = [
        'items' => ['except' => 20],
        'type' => ['except' => 'All'],
        'name' => ['except' => ''],
        'page' => ['except' => 1]
    ];



    public function updatingName()
    {
        $this->resetPage();
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.list-clans', [
            'clans' => Clan::where('name', 'LIKE', '%'.$this->name.'%')->paginate($this->items),
            'amounts' => self::AMOUNTS
        ]);
    }
}
