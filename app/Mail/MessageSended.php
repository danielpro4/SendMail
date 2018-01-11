<?php

namespace App\Mail;

use App\Contact;
use App\Message;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * Class MessageSended
 *
 * @author Daniel Pérez Atanacio<daniel@goplek.com>
 * @package App\Mail
 */
class MessageSended extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var Message
     */
    protected $message;

    /**
     * Create a new message instance.
     * @param Message $message
     */
    public function __construct(Message $message)
    {
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $bodyParse = json_decode($this->message->body, true);

        $name = $bodyParse['Nombre'];
        $email = $bodyParse['Email'];

        return $this->view('emails.message.page')
			->subject('Mensaje de idiomasvw.com.mx')
            ->from($email, $name)
            ->with('data', $bodyParse);
    }
}
