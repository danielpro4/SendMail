<?php

namespace App\Console\Commands;

use App\Message;
use App\Schedule;
use Carbon\Carbon;
use Illuminate\Console\Command;


/**
 * Class ScheduleMessages
 *
 * @author Daniel Pérez Atanacio<daniel@goplek.com>
 * @package App\Console\Commands
 */
class ScheduleMessages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'message:schedule';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Agendar mensajes';

    /**
     * Día inicial para programar
     * @var int
     */
    protected $initDay = 11;

    /**
     * Tamaño mínimo de mensajes por día
     *
     * @var int
     */
    protected $minLength = 10;

    /**
     * Tamaño máximo de mensajes por día
     *
     * @var int
     */
    protected $maxLength = 30;

    /**
     * Create a new command instance.
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
        $this->info('Iniciando proceso...');

        //region Process

        // Retrieve all messages
        $messages = Message::all();

        //region Split the collection
        $size = $messages->count();
        $count = $offset = 0;

        $bar = $this->output->createProgressBar($size);

        // Splitted the messages
        $collections = [];

        for (; $count < $size; ) {
            // Calc new len
            $length = rand($this->minLength, $this->maxLength);

            $collections[] = $messages->slice($offset, $length);

            // Offset Carry
            $offset = $offset + $length;

            // Carry
            $count = $count + $length;

        }
        //endregion

        //region Scheduled the messages

        $insertables = [];

        foreach ($collections as $i => $collection) {
            // Init current date
            $initDay = $this->initDay + $i;

            $currentDate = Carbon::create(2017, 12, $initDay, rand(5, 9), rand(0, 59), 0);

            $items = $collection->map(function ($message) use ($currentDate) {
                // Create a new item
                $item = ['id' => $message->id, 'scheduled_at' => $currentDate->format('Y-m-d H:i:s')];

                // Calculate the min and max minute
                $min = rand(1, 60);
                $max = rand(61, 120);

                // Calc next
                $currentDate = $currentDate->addMinutes(rand($min, $max));

                return $item;
            })->toArray();

            $insertables = array_merge($insertables, $items);
        }

        //endregion


        //region Store the schedule messages

        $messages = [];

        foreach ($insertables as $i => $insertable) {

            $schedule = Schedule::create([
                'message_id' => $insertable['id'],
                'scheduled_at' => $insertable['scheduled_at'],
                'status' => 'PENDING'
            ]);

            if ($schedule->id) {
                $messages[] = $messages;
            }

            $bar->advance();
        }

        $bar->finish();

        //endregion

        $this->info('');
        $this->info('Completado');
    }
}
