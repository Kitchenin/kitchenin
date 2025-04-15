<?php

namespace App\Console\Commands;

use App\Order;
use Illuminate\Console\Command;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emails:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send review emails 20 days after order';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $days_20_ago = date('Y-m-d', strtotime('-20 days', time()));
        $orders = Order::whereDate('created_at', $days_20_ago)->where('review', 1)->get();
        foreach ($orders as $order) {
            $order->sendReview();
            $order->review = false;
            $order->save();
        }
    }
}
