<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Clients\BitBayHttpClient;

class UpdateBitcoinTrades extends Command
{
    private BitBayHttpClient $client;

    protected $signature = 'command:name';

    protected $description = 'Command description';

    public function __construct(BitBayHttpClient $client)
    {
        $this->client = $client;

        parent::__construct();
    }

    public function handle()
    {
        
        return $this->client->getBitcoinTradeHistory();
    }
}
