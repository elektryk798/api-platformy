<?php

namespace App\Repositories;

use App\BitcoinTrade;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class BitcoinTradesRepository
{
    private BitcoinTrade $model;

    public function __construct(BitcoinTrade $model)
    {
        $this->model = $model;
    }

    public function save(BitcoinTrade $model): void
    {
        $model->save();
    }

    public function deleteAll(): void
    {
        DB::table($this->model->getTable())->truncate();
    }

    public function getAll(): Collection
    {
        return $this->model->all();
    }

    public function getOneById(int $id): ?BitcoinTrade
    {
        return $this->model->where('id', $id)->first();
    }
}
