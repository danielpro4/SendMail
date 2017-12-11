<?php

namespace App\Console\Commands;

use App\Mail\MessageSended;
use App\Schedule;
use App\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

/**
 * Class SendEmails
 *
 * @author Daniel Pérez Atanacio<daniel@goplek.com>
 * @package App\Console\Commands
 */
class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * Note: for one message email:send {message}
     *
     * @var string
     */
    protected $signature = 'email:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send an email message to any user in the database';

    /**
     * Create a new command instance.
     *
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     * Docs:
     *  - https://www.digitalocean.com/community/tutorials/how-to-use-cron-to-automate-tasks-on-a-vps
     *  - Crontab
     *     1. sudo crontab -e
     *     2. Add line - at 5 minutes of each hour
     *        - 5 * * * * php /var/www/sendmail.pagelab.io/artisan email:send
     * @return mixed
     * @throws EntityNotFoundException
     */
    public function handle()
    {
        // Starting
        $this->info('Buscando mensajes programados...');
        $schedules = Schedule::where(function ($q) {
            $q->where('status', '=', Schedule::PENDING);
            $q->where('scheduled_at', '<=', Carbon::now());
        })->get();

        //region Process

        // Extract the contact id from console args
        // $id = $this->argument('message');

        // Send the message to
        $user = User::findOrFail(1);

        $bar = $this->output->createProgressBar($schedules->count());

        foreach ($schedules as $schedule) {

            $schedule->status = Schedule::SENDED;
            $schedule->sended_at = Carbon::now();
            $schedule->save();

            $validator = Validator::make(['email' =>  $schedule->message->email], [
                'email' => 'required|email'
            ]);

            if ($validator->passes()) {
                // Create a new mailable instance
                $mailable = new MessageSended( $schedule->message);

                Mail::to($user)->send($mailable);
            }

            $bar->advance();
        }

        $bar->finish();

        //endregion

        $this->info('');
        $this->info('Mensajes enviados!');
    }
}