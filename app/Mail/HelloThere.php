<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use Illuminate\Http\Request;
use App\User;

class HelloThere extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $assunto = 'Assunto';

        return $this->markdown('emails.hellothere')
            ->subject($assunto)
            ->with([
                'nome'  => $this->user->nome,
                'email' => $this->user->email,
                'token' => $this->user->token,
        ]);
    }
}
