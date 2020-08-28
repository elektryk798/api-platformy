<?php

namespace App\Http\Controllers;

use App\Repositories\BitcoinTradesRepository;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    private BitcoinTradesRepository $bitcoinTrades;

    public function __construct(BitcoinTradesRepository $bitcoinTrades)
    {
        $this->bitcoinTrades = $bitcoinTrades;
    }

    public function index()
    {
        $bitcoinTrades = $this->bitcoinTrades->getAll();

        return View::make('home', ['bitcoinTrades' => $bitcoinTrades]);
    }
}
