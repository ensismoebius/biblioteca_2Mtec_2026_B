# Documentação das rotas

Este documento descreve as principais rotas da aplicação Biblioteca, seus métodos HTTP, suas finalidades e os controles de acesso definidos no código.

## 1. Rotas principais

| Método | Caminho | Nome | Descrição | Acesso |
|---|---|---|---|---|
| GET | `/` | — | Exibe a página inicial. | Público |
| GET | `/dashboard` | `dashboard` | Exibe o painel principal. | Autenticado e e-mail verificado |
| GET | `/profile` | `profile.edit` | Exibe a edição do perfil. | Autenticado |
| PATCH | `/profile` | `profile.update` | Atualiza os dados do perfil. | Autenticado |
| DELETE | `/profile` | `profile.destroy` | Exclui a conta do usuário. | Autenticado |
| GET | `/auditoria` | `auditoria.index` | Exibe os registros de auditoria. | Autenticado e autorizado pela permissão `ver-auditoria` |
| GET | `/relatorios/atrasos/pdf` | `relatorios.atrasos.pdf` | Gera um PDF dos empréstimos em atraso. | Sem middleware de autenticação declarado na rota |
| GET | `/relatorios/mais-emprestados/pdf` | `relatorios.mais-emprestados.pdf` | Gera um PDF dos dez livros mais emprestados. | Sem middleware de autenticação declarado na rota |

## 2. Autenticação e recuperação de senha

A aplicação também disponibiliza rotas do sistema de autenticação do Laravel, definidas em `routes/auth.php`.

Entre elas estão:

- `GET /login` e `POST /login`: exibição e processamento do login.
- `POST /logout`: encerramento da sessão.
- `GET /register` e `POST /register`: exibição e processamento do cadastro.
- `GET /forgot-password` e `POST /forgot-password`: solicitação de recuperação de senha.
- `GET /reset-password/{token}` e `POST /reset-password`: redefinição da senha.
- `GET /verify-email` e `GET /verify-email/{id}/{hash}`: exibição e processamento da verificação do e-mail.
- `POST /email/verification-notification`: solicitação de novo e-mail de verificação.
- `GET /confirm-password` e `POST /confirm-password`: confirmação da senha atual.
- `PUT /password`: atualização da senha.

As rotas de autenticação possuem validações e middlewares específicos conforme suas definições no Laravel.

## 3. Controle de acesso

- `auth`: exige que o usuário esteja autenticado.
- `verified`: exige que o e-mail do usuário esteja verificado.
- `can:ver-auditoria`: exige autorização pela habilidade `ver-auditoria`, configurada na aplicação.

**Atenção:** as rotas de relatórios aparecem sem middleware de autenticação no arquivo `routes/web.php`. Isso descreve o código atual e não significa que os relatórios estejam protegidos. Como os relatórios podem apresentar dados de empréstimos e clientes, o acesso deve ser revisado.

## 4. Fonte de consulta

A lista completa e atualizada de rotas pode ser consultada no terminal do projeto com:

```bash
php artisan route:list
```

As rotas são definidas principalmente em `routes/web.php` e `routes/auth.php`.