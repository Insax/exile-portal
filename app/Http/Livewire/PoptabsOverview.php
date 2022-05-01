<?php

namespace App\Http\Livewire;

use Cache;
use DB;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class PoptabsOverview extends Component
{
    use WithPagination;

    const AMOUNTS = [
        'default' => 20,
        'more' => 50,
        'most' => 100
    ];

    const TYPES = [
        'default' => 'MONEY',
        'accountId' => 'UID',
        'name' => 'NAME'
    ];
    public string $name = '';
    public int $items = 20;
    public string $sorting = 'MONEY';
    public string $sortType = 'DESC';
    public $page = 1;
    protected $queryString = [
        'items' => ['except' => 20],
        'name' => ['except' => ''],
        'sorting' => ['except' => 'MONEY'],
        'sortType' => ['except' => 'DESC'],
        'page' => ['except' => 1]
    ];

    public function render(): Factory|View|Application
    {
        return view('livewire.poptabs-overview', [
            'amounts' => self::AMOUNTS,
            'types' => self::TYPES,
            'accounts' => $this->buildQuery()
        ]);
    }

    private function buildQuery()
    {
        return DB::connection('portal')->table('accounts')->select('accounts.*', DB::raw('(select  COALESCE(SUM(`containers`.`money`), 0) + `accounts`.`locker` + `accounts`.`marxet_locker` from `containers` where `accounts`.`uid` = `containers`.`account_uid`) as container_sum_money'))
            ->where('name', 'LIKE', '%' . $this->name . '%')
            ->orderBy($this->sorting == 'MONEY' ? 'container_sum_money' : $this->sorting, $this->sortType)->paginate($this->items);
    }
}
