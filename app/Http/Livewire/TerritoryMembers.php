<?php

namespace App\Http\Livewire;

use App\Models\Territory;
use Cache;
use Livewire\Component;
use Livewire\WithPagination;
use LivewireUI\Modal\ModalComponent;

class TerritoryMembers extends Component
{
    use WithPagination;

    const AMOUNTS = [
        'default' => 20,
        'more' => 50,
        'most' => 100
    ];

    const TYPES = [
        'default' => 'NAME',
        'accountId' => 'UID'
    ];
    public string $name = '';
    public int $items = 20;
    public string $sorting = 'NAME';
    public string $sortType = 'ASC';
    public $page = 1;
    public Territory $territory;
    protected $queryString = [
        'items' => ['except' => 20],
        'name' => ['except' => ''],
        'sorting' => ['except' => 'NAME'],
        'sortType' => ['except' => 'ASC'],
        'page' => ['except' => 1]
    ];

    public function mount(Territory $territory)
    {
        $this->territory = $territory;
    }

    public function render()
    {
        return view('livewire.territory-members', [
            'amounts' => self::AMOUNTS,
            'types' => self::TYPES,
            'members' => $this->buildQuery()
        ]);
    }

    private function buildQuery()
    {
        return $this->territory->territoryMembers()->where('name', 'LIKE', '%' . $this->name . '%')->orderBy(strtolower($this->sorting), $this->sortType)->paginate($this->items);
    }
}
