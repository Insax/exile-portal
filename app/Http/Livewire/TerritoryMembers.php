<?php

namespace App\Http\Livewire;

use App\Models\Territory;
use Livewire\Component;

class TerritoryMembers extends Component
{
    const AMOUNTS = [
        'default' => 20,
        'more' => 50,
        'most' => 100
    ];

    const TYPES = [
        'default' => 'name',
        'accountId' => 'uid'
    ];

    protected $queryString = [
        'items' => ['except' => 20],
        'name' => ['except' => ''],
        'sorting' => ['except' => 'name'],
        'sortType' => ['except' => 'ASC']
    ];

    public string $name = '';
    public int $items = 20;
    public string $sorting = 'name';
    public string $sortType = 'ASC';
    public Territory $territory;

    public function mount(Territory $territory)
    {
        $this->territory = $territory;
    }

    private function buildQuery()
    {
        return $this->territory->members()->where('name', 'LIKE', '%'.$this->name.'%')->orderBy($this->sorting, $this->sortType)->paginate($this->items);
    }

    public function render()
    {
        return view('livewire.territory-members', [
            'amounts' => self::AMOUNTS,
            'types' => self::TYPES,
            'members' => $this->buildQuery()
        ]);
    }
}
