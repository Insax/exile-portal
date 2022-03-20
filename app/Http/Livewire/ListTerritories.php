<?php

namespace App\Http\Livewire;

use App\Models\Account;
use App\Models\Territory;
use App\Models\TerritoryMember;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Component;
use Livewire\WithPagination;

class ListTerritories extends Component
{
    use WithPagination;

    const TYPES = [
        'default' => 'All',
        'deleted' => 'Deleted',
        'active' => 'Active'
    ];

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

    private function queryBuilder(): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        $territory = match ($this->type) {
            'Deleted' => Territory::whereNotNull('deleted_at'),
            'Active' => Territory::whereNull('deleted_at'),
            default => Territory::query(),
        };

        if ($this->name)
            $territory->where('name', 'LIKE', '%'.$this->name.'%')->with(['ownerAccount', 'members']);

        return $territory->paginate($this->items);
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.list-territories', [
            'territories' => $this->queryBuilder(),
            'types' => self::TYPES,
            'amounts' => self::AMOUNTS
        ]);
    }
}
