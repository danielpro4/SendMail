<?php

namespace App\Console\Commands;

use App\Message;
use Illuminate\Console\Command;

class SeedMessages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'message:seed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     * Parser to JSON Data and create a new Message
     *
     * @return mixed
     */
    public function handle()
    {
        $items = null;
        $path = __DIR__ . '/../../../messages.json';

        if (file_exists($path)) {

            $items = file_get_contents($path);
            $items = json_decode($items, true);

            if (is_array($items)) {

                $bar = $this->output->createProgressBar(count($items));

                foreach ($items as $i => $item) {

                    if (!empty($item['message'])) {

                        // Separate the message value by Pipes
                        $values = explode('|', $item['message']);

                        if (is_array($values)) {
                            // 1. Build row with JSON
                            $fields = [];

                            foreach ($values as $val) {
                                list($fieldName, $fieldValue) = explode(':', $val);

                                $fields[trim($fieldName)] = trim($fieldValue);
                            }

                            // Create new Message
                            Message::create(['name' => 'Message ' . (++$i), 'body' => json_encode($fields)]);
                        }
                    }

                    $bar->advance();
                }

                $bar->finish();
            }
        }

        $this->info('');
        $this->info('Completado');

    }
}
