<?php

namespace App\Http\Livewire;

use App\Models\Territory;
use Cache;
use Livewire\Component;

class TerritoryMembers extends Component
{
    const AMOUNTS = [
        'default' => 20,
        'more' => 50,
        'most' => 100
    ];

    const TYPES = [
        'default' => 'NAME',
        'accountId' => 'UID'
    ];

    protected $queryString = [
        'items' => ['except' => 20],
        'name' => ['except' => ''],
        'sorting' => ['except' => 'NAME'],
        'sortType' => ['except' => 'ASC'],
        'page' => ['except' => 1]
    ];

    public string $name = '';
    public int $items = 20;
    public string $sorting = 'NAME';
    public string $sortType = 'ASC';
    public $page = 1;
    public Territory $territory;

    public function mount(Territory $territory)
    {
        $this->territory = $territory;
    }

    private function buildQuery()
    {
        return Cache::remember('territoryMembersWhereName'.$this->name.'orderedBy'.$this->sortType.'With'.$this->sortType.'PageSize'.$this->items.'Page'.$this->page, 15, function () {
            return $this->territory->members()->where('name', 'LIKE', '%' . $this->name . '%')->orderBy(strtolower($this->sorting), $this->sortType)->paginate($this->items);
        });
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
