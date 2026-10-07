# Auditoria de alterações

**Decisão:** tabela própria `AUDITORIAS` + trait `Auditavel`, em vez do pacote
`spatie/laravel-activitylog`: sem dependência nova, já no padrão das nossas
tabelas em MAIÚSCULAS e mais simples para o time entender.

## Uso

Em qualquer model, adicione `use Auditavel;` dentro da classe (importando
`App\Models\Concerns\Auditavel`). Criar, editar e excluir passam a gerar uma
linha em `AUDITORIAS`.

## Limitações

- Só registra alterações feitas via Eloquent (`save()`, `update()`, `delete()`).
  `DB::table()` e updates em massa não disparam eventos.
- A tela `/auditoria` é liberada só para os e-mails de `AUDITORIA_ADMINS`
  (Gate `ver-auditoria`) até os níveis de acesso (#54) serem mesclados.