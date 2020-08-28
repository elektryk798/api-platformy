<?php

namespace App\Repositories;

use App\Log;

class LogsRepository
{
    private Log $model;

    public function __construct(Log $model)
    {
        $this->model = $model;
    }

    public function save(Log $model): void
    {
        $model->save();
    }
}
