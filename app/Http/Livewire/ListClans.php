<?php

namespace App\Http\Livewire;

use App\Models\Game\Clan;
use Cache;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class ListClans extends Component
{
    use WithPagination;

    /** @var int[] */
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

    public function render(): Factory|View|Application
    {
        $clans = Cache::remember('clansWhereName' . $this->name . 'PageSize' . $this->items . 'Page' . $this->page, 15 * 60, function () {
            return Clan::where('name', 'LIKE', '%' . $this->name . '%')->withCount('accounts')->with('leaderAccount')->paginate($this->items);
        });
        return view('livewire.list-clans', [
            'clans' => $clans,
            'amounts' => self::AMOUNTS
        ]);
    }
}
