<?php

use App\Models\Emprestimo;
use App\Notifications\LembreteEmprestimoVence;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Schedule::call(function () {
    Emprestimo::where('data_devolucao', now()->addDays(2)->toDateString())->where('lembrete_enviado', false)
        ->get()->each(fn ($e) => $e->user?->notify(new LembreteEmprestimoVence($e)) && $e->update(['lembrete_enviado' => true]));
})->daily()->description('Enviar lembrete de empréstimos');
