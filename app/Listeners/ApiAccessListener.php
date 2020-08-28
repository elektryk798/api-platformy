<?php

namespace App\Listeners;

use App\Events\ApiAccess;
use App\Log;
use App\Repositories\LogsRepository;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ApiAccessListener
{
    private LogsRepository $logs;

    public function __construct(LogsRepository $logs)
    {
        $this->logs = $logs;
    }

    public function handle(ApiAccess $event): void
    {
        $log = new Log();

        $log->fill([
           'type' => $event->type,
           'user_id' => $event->user->id
        ]);

        $this->logs->save($log);
    }
}
