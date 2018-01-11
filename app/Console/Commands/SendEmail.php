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
class SendEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * Note: for one message email:send {message}
     *
     * @var string
     */
    protected $signature = 'email:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send an email message to user in the database';

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
        //region Process
		$schedule = Schedule::findOrFail(1);

        $to = User::findOrFail(1);
        $bcc1 = User::findOrFail(2);
        $bcc2 = User::findOrFail(3);

		if ($schedule) {
			$schedule->status = Schedule::SENDED;
			$schedule->sended_at = Carbon::now();
			$schedule->save();

			$messageSended = new MessageSended($schedule->message);

			Mail::to($to)
				->bcc($bcc1)
				->bcc($bcc2)
				->send($messageSended);
		}

        //endregion
    }
}
