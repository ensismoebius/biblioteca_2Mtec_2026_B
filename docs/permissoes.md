# Documentação de permissões

## Objetivo

Este documento descreve os controles de autenticação e autorização identificados nas rotas e configurações atuais da aplicação Biblioteca.

## 1. Regras de acesso

| Recurso | Regra identificada | Comportamento |
|---|---|---|
| Página inicial (`/`) | Público | Não exige autenticação na rota. |
| Dashboard (`/dashboard`) | `auth` e `verified` | Exige usuário autenticado e e-mail verificado. |
| Perfil (`/profile`) | `auth` | Exige autenticação para consultar, atualizar ou excluir o perfil. |
| Auditoria (`/auditoria`) | `auth` e `can:ver-auditoria` | Exige autenticação e autorização pela habilidade `ver-auditoria`. |
| Relatório de empréstimos atrasados | Nenhum middleware de autenticação declarado na rota | O endpoint não possui proteção explícita de autenticação em `routes/web.php`. |
| Relatório dos livros mais emprestados | Nenhum middleware de autenticação declarado na rota | O endpoint não possui proteção explícita de autenticação em `routes/web.php`. |

As rotas de login, cadastro e recuperação de senha são definidas pelo sistema de autenticação do Laravel em `routes/auth.php`.

## 2. Autorização da auditoria

A habilidade `ver-auditoria` é definida em `app/Providers/AppServiceProvider.php`.

A autorização verifica se o e-mail do usuário autenticado está presente na configuração `auditoria.administradores`, definida em `config/auditoria.php`.

Essa configuração lê a variável de ambiente `AUDITORIA_ADMINS`, que aceita uma lista de e-mails separados por vírgulas.

Exemplo de configuração local:

```dotenv
AUDITORIA_ADMINS=admin1@exemplo.com,admin2@exemplo.com
```

Use somente endereços autorizados pela equipe. Não coloque credenciais ou dados secretos no repositório.

## 3. Níveis de acesso

A documentação de auditoria descreve essa lista de e-mails como uma solução provisória até a integração dos níveis de acesso relacionada à issue #54.

Portanto, não se deve presumir que os níveis cadastrados na tabela `