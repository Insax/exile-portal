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
    public array $logTypes = array();
    public string $searchString = '';
    public array $availableLogTypes = array();

    protected $queryString = [
        'searchColumn' => ['except' => 'account_uid'],
        'searchString' => ['except' => ''],
        'page' => ['except' => 1],
    ];


    public array $availableSearchColumns = [
        'account_uid',
        'territory_id',
        'clan_id'
    ];

    public function updating()
    {
        $this->resetPage();
    }

    public int $days = 3;

    public function render()
    {
        $this->availableLogTypes = ReadableLogging::distinct()->pluck('type')->toArray();

        $queryBuilder = ReadableLogging::query();

        if(count($this->logTypes))
            $queryBuilder->whereIn('type', $this->logTypes);

        $data = $queryBuilder->where($this->searchColumn, '=', $this->searchString)->where('created_at', '>', Carbon::now()->subDays($this->days))->orderBy('created_at', 'DESC')->with('loggable')->paginate(50);

        return view('livewire.list-logs', ['logs' => $data]);
    }
}
