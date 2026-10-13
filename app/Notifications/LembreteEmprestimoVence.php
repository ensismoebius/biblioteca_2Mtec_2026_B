<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

/**
 * Notificação para lembrar o utilizador sobre o vencimento de empréstimo.
 */
class LembreteEmprestimoVence extends Notification
{
    use Queueable;

    public $emprestimos;

    /**
     *Cria uma nova instância da notificação.
     */
    public function __construct($emprestimos = null)
    {
        $this->emprestimos = $emprestimos;
    }

    /**
     * Pega a notificação do arrau
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * constroi a mensagem do email da notificação.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('O Emprestimo do livro vence em 2 dias.')
            ->action('Ver Emprestimo', url('/'))
            ->line('Obrigado pela atenção!');
    }

    /**
     * Obtém a representação em array da notificação.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
