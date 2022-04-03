<?php

namespace App\Http\Livewire;

use App\Models\Territory;
use Cache;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class ListTerritories extends Component
{
    use WithPagination;

    const TYPES = [
        'default' => 'All',
        'deleted' => 'Deleted',
        'active' => 'Active',
        'stolen' => 'Stolen'
    ];

    const AMOUNTS = [
        'default' => 20,
        'more' => 50,
        'most' => 100
    ];

    const SORT_VALUES = [
        'default' => 'ID',
        'name' => 'NAME',
        'leader' => 'LEADER'
    ];

    public int $items = 20;
    public string $type = 'All';
    public string $name = '';
    public $page = 1;
    public string $sorting = 'ID';
    public string $sortType = 'ASC';

    protected $queryString = [
        'items' => ['except' => 20],
        'type' => ['except' => 'All'],
        'name' => ['except' => ''],
        'page' => ['except' => 1],
        'sorting' => ['except' => 'ID'],
        'sortType' => ['except' => 'ASC']
    ];

    protected $listeners = [
        'restored' => '$refresh'
    ];

    public function updatingName()
    {
        $this->resetPage();
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.list-territories', [
            'territories' => $this->queryBuilder(),
            'types' => self::TYPES,
            'amounts' => self::AMOUNTS,
            'sorts' => self::SORT_VALUES
        ]);
    }

    private function queryBuilder()
    {
        return Cache::remember('listTerritories' . $this->type . 'PageSize' . $this->items . 'Page' . $this->page . 'Name' . $this->name . 'sorted' . $this->sorting . 'Type' . $this->sortType, 15 * 60, function () {
            $territory = match ($this->type) {
                'Deleted' => Territory::whereNotNull('deleted_at'),
                'Active' => Territory::whereNull('deleted_at'),
                'Stolen' => Territory::whereNotNull('flag_stolen_at'),
                default => Territory::query(),
            };

            $territory->where('name', 'LIKE', '%' . $this->name . '%')
                ->orderBy(strtolower($this->sorting), $this->sortType)
                ->with(['ownerAccount', 'members']);

            return $territory->paginate($this->items);
        });
    }
}
