<?php

namespace App\Http\Livewire;

use App\Models\Clan;
use Cache;
use Livewire\Component;

class ClanMembers extends Component
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
    public Clan $clan;

    public function mount(Clan $clan)
    {
        $this->clan = $clan;
    }

    private function buildQuery()
    {
        return Cache::remember('clanMembersWhereName'.$this->name.'orderedBy'.$this->sortType.'With'.$this->sortType.'PageSize'.$this->items.'Page'.$this->page, 15, function () {
            return $this->clan->accounts()->where('name', 'LIKE', '%'.$this->name.'%')->orderBy(strtolower($this->sorting), $this->sortType)->paginate($this->items);
        });
    }

    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.clan-members', [
        'amounts' => self::AMOUNTS,
            'types' => self::TYPES,
            'members' => $this->buildQuery()
        ]);
    }
}
