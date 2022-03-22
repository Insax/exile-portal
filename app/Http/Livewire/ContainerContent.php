<?php

namespace App\Http\Livewire;

use App\Models\PortalInstance;
use App\Models\ParsedGameInformation\TerritoryContainerContent;
use Cache;
use Livewire\Component;
use Livewire\WithPagination;

class ContainerContent extends Component
{
    use WithPagination;

    /** @var int[] */
    const AMOUNTS = [
        'default' => 20,
        'more' => 50,
        'most' => 100
    ];
    public $territory;
    public int $items = 20;
    public string $name = '';
    public $page = 1;
    protected $queryString = [
        'items' => ['except' => 20],
        'name' => ['except' => ''],
        'page' => ['except' => 1]
    ];

    public function updatingName()
    {
        $this->resetPage();
    }

    public function updatingItems()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.container-content', [
            'territoryContainerContent' => $this->queryBuilder(),
            'amounts' => self::AMOUNTS
        ]);
    }

    private function queryBuilder()
    {
        $currentInstance = Cache::rememberForever('portalInstanceId', function () {
            return PortalInstance::whereName(config('portal.instanceName'))->first()->id;
        });
        $territoryContainerContent = TerritoryContainerContent::wherePortalInstanceId($currentInstance)->whereTerritoryId($this->territory->id);
        if ($this->name)
            $territoryContainerContent->where('item', 'LIKE', '%' . $this->name . '%');

        return $territoryContainerContent->orderBy('count', 'DESC')->paginate($this->items);
    }
}
