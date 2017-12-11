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
        return $this->view('emails.message.sended')
            ->from($this->message->email, $this->message->name)
            ->with('data', [
                'Nombre'    => $this->message->name,
                'Email'     => $this->message->email,
                'Teléfono'  => $this->message->phone,
                'Idioma'    => $this->message->lang,
                'Sucursal'  => $this->message->branch,
                'Mensaje'   => $this->message->text
            ]);
    }
}
