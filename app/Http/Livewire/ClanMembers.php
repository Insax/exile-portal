<?php

namespace App\Http\Livewire;

use App\Models\Clan;
use Livewire\Component;

class ClanMembers extends Component
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
    public Clan $clan;

    public function mount(Clan $clan)
    {
        $this->clan = $clan;
    }

    private function buildQuery()
    {
        return $this->clan->accounts()->where('name', 'LIKE', '%'.$this->name.'%')->orderBy($this->sorting, $this->sortType)->paginate($this->items);
    }

    public function render()
    {
        return view('livewire.clan-members', [
        'amounts' => self::AMOUNTS,
            'types' => self::TYPES,
            'members' => $this->buildQuery()
        ]);
    }
}
