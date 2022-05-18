<?php

namespace App\Http\Livewire;

use App\Models\ReadableLogging;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class ListLogs extends Component
{
    use WithPagination;

    public string $searchColumn = 'account_uid';
    public string $searchString = '';
    public array $availableLogTypes = array();
    public bool $mode = false;
    public string $startDate = '';
    public string $endDate = '';

    protected $queryString = [
        'searchColumn' => ['except' => 'account_uid'],
        'searchString' => ['except' => ''],
        'startDate',
        'endDate',
        'page' => ['except' => 1],
    ];


    public array $availableSearchColumns = [
        'account_uid',
        'territory_id',
        'clan_id'
    ];

    public function updating() {
        \Debugbar::log($this->startDate);
        \Debugbar::log($this->endDate);
        $this->resetPage();
    }

    public function render()
    {
        if(empty($this->startDate))
            $this->startDate = Carbon::now()->subDays(5)->format('d/m/Y');

        if(empty($this->endDate))
            $this->endDate = Carbon::now()->format('d/m/Y');

        $this->availableLogTypes = ReadableLogging::where($this->searchColumn, '=', $this->searchString)->where('created_at', '>=', Carbon::createFromFormat('d/m/Y', $this->startDate))->where('created_at', '<=', Carbon::createFromFormat('d/m/Y', $this->endDate))->distinct()->orderBy('type')->pluck('type')->toArray();

        $queryBuilder = ReadableLogging::query();

        $data = $queryBuilder->where($this->searchColumn, '=', $this->searchString)->where('created_at', '>=', Carbon::createFromFormat('d/m/Y', $this->startDate))->where('created_at', '<=', Carbon::createFromFormat('d/m/Y', $this->endDate))->orderBy('created_at', 'DESC')->with(['loggable', 'account', 'clan', 'territory'])->get();

        return view('livewire.list-logs', ['logs' => $data]);
    }
}
