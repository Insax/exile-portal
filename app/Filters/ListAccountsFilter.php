<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

class ListAccountsFilter extends QueryFilters
{
    public function withoutClan(): Builder
    {
        return $this->builder->whereNull('clan_id');
    }

    public function clan($clan): Builder
    {
        return $this->builder->where('clan_id', '=', $clan);
    }
}
