<?php

namespace App\Console\Commands;

use App\BitcoinTrade;
use App\Repositories\BitcoinTradesRepository;
use Illuminate\Console\Command;
use App\Http\Clients\BitBayHttpClient;

class UpdateBitcoinTrades extends Command
{
    private BitBayHttpClient $client;
    private BitcoinTradesRepository $repository;

    protected $signature = 'bit-bay:update-trades';
    protected $description = 'Update bitcoin trades';

    public function __construct(BitBayHttpClient $client, BitcoinTradesRepository $repository)
    {
        $this->client = $client;
        $this->repository = $repository;

        parent::__construct();
    }

    public function handle(): void
    {
        $this->repository->deleteAll();
        $allTrades = $this->client->getBitcoinTradeHistory();

        foreach ($allTrades as $apiTrade) {
            $trade = new BitcoinTrade();
            $trade->fill([
                'date' => $apiTrade->date,
                'price' => $apiTrade->price,
                'type' => $apiTrade->type,
                'amount' => $apiTrade->amount,
                'tid' => $apiTrade->tid
            ]);

            $this->repository->save($trade);
        }
    }
}
