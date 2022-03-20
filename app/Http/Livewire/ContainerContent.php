<?php

namespace App\Http\Livewire;

use App\Models\PortalInstance;
use App\Models\TerritoryContainerContent;
use Livewire\Component;
use Livewire\WithPagination;

class ContainerContent extends Component
{
    use WithPagination;

    public $territory;

    const AMOUNTS = [
        'default' => 20,
        'more' => 50,
        'most' => 100
    ];

    public function updatingName()
    {
        $this->resetPage();
    }

    public function updatingItems()
    {
        $this->resetPage();
    }

    protected $queryString = [
        'items' => ['except' => 20],
        'name' => ['except' => ''],
        'page' => ['except' => 1]
    ];

    public int $items = 20;
    public string $name = '';
    public $page = 1;

    private function queryBuilder()
    {
        $instanceId = PortalInstance::whereName(config('portal.instanceName'))->first()->id;
        $territoryContainerContent = TerritoryContainerContent::wherePortalInstanceId($instanceId)->whereTerritoryId($this->territory->id);
        if ($this->name)
            $territoryContainerContent->where('item', 'LIKE', '%'.$this->name.'%');

        return $territoryContainerContent->orderBy('count', 'DESC')->paginate($this->items);
    }

    public function render()
    {
        return view('livewire.container-content', [
            'territoryContainerContent' => $this->queryBuilder(),
            'amounts' => self::AMOUNTS
        ]);
    }
}
