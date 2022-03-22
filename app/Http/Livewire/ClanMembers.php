<?php

namespace App\Http\Livewire;

use App\Models\Game\Clan;
use Cache;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;
use LivewireUI\Modal\ModalComponent;

class ClanMembers extends Component
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
    public Clan $clan;
    protected $queryString = [
        'items' => ['except' => 20],
        'name' => ['except' => ''],
        'sorting' => ['except' => 'NAME'],
        'sortType' => ['except' => 'ASC'],
        'page' => ['except' => 1]
    ];

    public function mount(Clan $clan)
    {
        $this->clan = $clan;
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.clan-members', [
            'amounts' => self::AMOUNTS,
            'types' => self::TYPES,
            'members' => $this->buildQuery()
        ]);
    }

    private function buildQuery()
    {
        return Cache::remember('clan' . $this->clan->id . 'MembersWhereName' . $this->name . 'orderedBy' . $this->sortType . 'With' . $this->sortType . 'PageSize' . $this->items . 'Page' . $this->page, 15 * 60, function () {
            return $this->clan->accounts()->where('name', 'LIKE', '%' . $this->name . '%')->orderBy(strtolower($this->sorting), $this->sortType)->paginate($this->items);
        });
    }
}
