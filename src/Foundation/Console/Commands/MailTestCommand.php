<?php

namespace ConfettiCode\Laravel\Foundation\Console\Commands;

use ConfettiCode\Laravel\Foundation\Mail\MailTest;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class MailTestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:test {to : The target email address}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check whether mail component work properly';

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
     * @return int
     */
    public function handle()
    {
        try {
            Mail::to($this->argument('to'))->send(new MailTest());
            return Command::SUCCESS;
        } catch (\Throwable $e) {
            report($e);
            return Command::FAILURE;
        }


    }
}
