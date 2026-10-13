# Decisões técnicas do projeto Biblioteca

## Objetivo

Este documento reúne as principais decisões técnicas identificadas na implementação e na documentação do sistema Biblioteca. Seu objetivo é facilitar a manutenção do projeto, explicando como as soluções estão organizadas, quais são suas limitações e quais cuidados devem ser observados em futuras alterações.

> **Nota:** este registro consolida as decisões verificáveis nos documentos e no código disponíveis. Decisões específicas das quatro sprints que não estejam registradas nessas fontes precisam ser confirmadas com a equipe.

## 1. Organização da aplicação

**Decisão identificada:** utilizar Laravel para organizar as rotas, os controllers, os models, as views e os recursos de autenticação.

**Justificativa:** essa estrutura separa responsabilidades e permite que as funcionalidades sejam mantidas em componentes específicos.

**Consequência para a manutenção:** antes de criar uma funcionalidade, verificar se já existe uma rota, um controller, um model ou uma view relacionada. Evitar concentrar regras de negócio diretamente nos arquivos de rotas.

## 2. Banco de dados

**Decisão identificada:** manter o esquema relacional definido pelas migrations do projeto.

As migrations são a referência para conhecer a estrutura das tabelas e suas alterações ao longo do desenvolvimento.

O projeto possui tabelas de domínio com nomes em letras maiúsculas, como `CLIENTES`, `LIVROS`, `AUTORES`, `GENEROS`, `EMPRESTIMOS`, `NIVEIS` e `AUDITORIAS`.

**Consequências para a manutenção:**

- Consultar as migrations antes de alterar tabelas ou relacionamentos.
- Conferir os nomes das tabelas e das colunas antes de escrever consultas.
- Verificar a compatibilidade entre models e migrations, especialmente a chave primária e o uso de timestamps.
- Não alterar o banco de produção manualmente quando a mudança precisar ser reproduzida em outros ambientes; preferir migrations versionadas.

## 3. Autenticação e autorização

**Implementação identificada:** a aplicação utiliza as rotas de autenticação do Laravel e protege o dashboard com os middlewares `auth` e `verified`.

As rotas de perfil exigem autenticação. A rota de auditoria exige autenticação e autorização por meio da habilidade `ver-auditoria`.

**Consequência para a manutenção:** novas rotas que exibam ou alterem dados privados devem receber os controles de acesso adequados. Não presumir que um usuário autenticado tem autorização para todas as operações.

As rotas de relatórios devem ser revisadas, pois atualmente não possuem middleware de autenticação declarado em `routes/web.php`.

## 4. Auditoria de alterações

**Decisão documentada:** utilizar a tabela própria `AUDITORIAS` e a trait `Auditavel`, em vez de adicionar o pacote `spatie/laravel-activitylog`.

**Justificativa registrada:** evitar uma dependência adicional e manter a solução alinhada ao padrão do banco de dados existente.

**Limitação conhecida:** a auditoria descrita em `docs/auditoria.md` registra operações realizadas por eventos do Eloquent, como `save()`, `update()` e `delete()`. Consultas feitas diretamente com `DB::table()` e atualizações em massa não disparam os mesmos eventos.

**Consequência para a manutenção:** ao adicionar operações que precisam ser auditadas, verificar se elas passam pelo Eloquent e se realmente geram o registro esperado.

## 5. Relatórios em PDF

**Implementação identificada:** o `RelatorioController` utiliza a fachada `Pdf` do pacote DomPDF para gerar relatórios.

Existem endpoints para gerar o relatório de empréstimos em atraso e o relatório dos dez livros mais emprestados.

**Consequência para a manutenção:** alterações nas consultas, nos nomes das colunas ou nos relacionamentos devem ser verificadas em conjunto com as views utilizadas na geração dos PDFs.

Os critérios que definem um empréstimo em atraso também devem ser conferidos nas regras de negócio vigentes antes de modificar o relatório.

## 6. Segurança e qualidade do código

A documentação de segurança existente registra a revisão relacionada à issue #74, incluindo a verificação de mass assignment nos models.

**Práticas a manter:**

- Revisar `$fillable` e `$guarded` nos models que recebem dados externos.
- Validar os dados recebidos antes de persistir alterações.
- Usar autorização apropriada nas rotas e nos controllers.
- Evitar expor informações pessoais ou dados de empréstimos sem necessidade.
- Executar o Laravel Pint e os testes pertinentes antes de enviar alterações.

A revisão anterior deve ser considerada uma verificação do estado do código naquele momento, não uma garantia permanente de ausência de vulnerabilidades.

## 7. Fluxo de desenvolvimento

**Decisão documentada:** desenvolver em branches específicas, usar commits pequenos, abrir Pull Requests e solicitar revisão antes do merge.

O fluxo descrito em `docs/fluxo-git.md` inclui validações automáticas, revisão por colegas e integração à branch principal após a aprovação.

O processo da turma também exige os checks automáticos previstos no repositório e três aprovações para mesclar um Pull Request.

**Consequência para a manutenção:** não desenvolver diretamente na `main`, relacionar o PR à issue correspondente e verificar os checks antes da integração.

## 8. Deploy e produção

A aplicação está publicada no Render:

https://biblioteca-2mtec-2026-b.onrender.com

A configuração de produção deve ser mantida consistente com as configurações de ambiente do Laravel. Alterações em migrations, variáveis de ambiente, autenticação ou dependências devem ser avaliadas antes do deploy.

**Cuidados para futuras alterações:**

- Não versionar senhas, tokens ou outras credenciais.
- Validar migrations antes de executá-las em produção.
- Conferir os logs do serviço após cada deploy.
- Verificar o funcionamento da aplicação pelo endereço HTTPS publicado.

## 9. Fontes para manutenção

Antes de alterar o sistema, consulte:

- `routes/web.php` e `routes/auth.php`: rotas da aplicação.
- `app/Http/Controllers/`: lógica dos controllers.
- `app/Models/`: models e regras associadas aos dados.
- `database/migrations/`: estrutura e evolução do banco.
- `docs/rotas.md`: referência das rotas.
- `docs/permissoes.md`: referência dos controles de acesso.
- `docs/auditoria.md`: funcionamento e limitações da auditoria.
- `docs/seguranca.md`: revisão de segurança.
- `docs/fluxo-git.md`: fluxo de contribuição.
- `docs/definition-of-done.md`: critérios de conclusão das tarefas.

## 10. Manutenção deste documento

Atualizar este registro sempre que uma mudança alterar uma decisão técnica relevante, introduzir uma dependência importante ou modificar a forma de executar, proteger ou manter a aplicação.

Quando houver dúvida sobre uma decisão histórica, consultar as issues, os Pull Requests e os registros das sprints em vez de presumir a justificativa original.