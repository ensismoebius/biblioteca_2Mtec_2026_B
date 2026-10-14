# Roteiro da apresentação final — Biblioteca

**Data prevista:** 15/11/2026
**Projeto:** Sistema Biblioteca
**Duração da demonstração ao vivo:** 10 a 15 minutos
**Responsáveis:** todos os integrantes dos subTimes

## 1. Objetivos

Apresentar o sistema Biblioteca, explicar as partes construídas por cada subTime, demonstrar funcionalidades reais e mostrar como a aplicação foi organizada.

Cada integrante deve ter uma fala definida e falar por pelo menos um minuto.

### Atenção à duração

Com aproximadamente 20 integrantes falando por pelo menos um minuto cada, são necessários no mínimo 20 minutos de falas. A demonstração ao vivo terá de 10 a 15 minutos adicionais.

**Duração total estimada: 30 a 35 minutos.** Confirmar com o professor se o limite de 10 a 15 minutos se refere apenas à demonstração ou à apresentação inteira.

| Tempo | Etapa | O que apresentar |
|---|---|---|
| 00:00–01:00 | Abertura | Apresentar o sistema Biblioteca e seu objetivo. |
| 01:00–02:00 | Página inicial | Mostrar a página inicial e explicar a proposta do sistema. |
| 02:00–04:00 | Autenticação | Demonstrar login e, se necessário, cadastro ou recuperação de senha. |
| 04:00–05:30 | Dashboard | Mostrar o painel após entrar com uma conta de demonstração preparada. |
| 05:30–07:00 | Perfil | Apresentar a tela de perfil e explicar as opções realmente disponíveis. |
| 07:00–09:00 | Auditoria | Entrar com uma conta autorizada e mostrar os registros de auditoria disponíveis. |
| 09:00–10:30 | Banco de dados | Apresentar o diagrama ER e explicar os principais relacionamentos. |
| 10:30–12:00 | Relatórios PDF | Demonstrar os relatórios somente se o controller estiver corrigido e os endpoints tiverem sido testados. Caso contrário, explicar a implementação e registrar a pendência. |
| 12:00–13:00 | Encerramento | Resumir as entregas, os aprendizados e os próximos passos do projeto. |

**Duração planejada: 13 minutos.** Antes do ensaio, testar todas as etapas e ajustar o cronograma conforme o funcionamento real da aplicação.

## 3. Divisão das falas dos integrantes

Preencher os nomes com a lista oficial do time. Cada integrante deve falar por pelo menos um minuto. Os horários abaixo são sugestões para organizar as falas, separadamente da demonstração de 13 minutos.

| Integrante | Nome completo | Tema da fala |
|---|---|---|
| 01 | Rafael izack | Objetivo e problema que o sistema resolve |
| 02 | Laura koa | Público-alvo e requisitos do projeto |
| 03 | Gabriel Ornelas | Organização do projeto e tecnologias |
| 04 | Victor cipriano | Banco de dados e migrations |
| 05 | Yasmin Bras | Relacionamentos do diagrama ER |
| 06 | Larissa Gabrielly | Cadastro e dados de clientes, se implementados |
| 07 | Lucas Lima | Livros e exemplares, se implementados |
| 08 | Lucas Oliveira | Autores e gêneros, se implementados |
| 09 | Pedro Henrique | Usuários e níveis de acesso |
| 10 | Pyetro Thiago | Autenticação e login |
| 11 | Leticia Monteiro | Dashboard e perfil |
| 12 | Kauã Batista | Empréstimos, se implementados |
| 13 | Vitor Samuel | Devoluções e regras de empréstimo, se implementadas |
| 14 | Livia | Relatório de empréstimos atrasados |
| 15 | Maria Eduarda | Relatório dos livros mais emprestados |
| 16 | Paulo Henrique | Auditoria de alterações |
| 17 | Marcelo Dampreli | Segurança e autorização |
| 18 | Agatha de Paula | Testes automatizados e qualidade do código |
| 19 | Carol Nascimento | Deploy, produção e infraestrutura |
| 20 | Esmeralda  | Documentação, aprendizados e encerramento |

**Importante:** os temas são sugestões de fala, não uma afirmação de que todas as funcionalidades estão prontas. Cada subTime deve confirmar o que realmente construiu e ajustar os temas de acordo com sua contribuição.

## 4. Dados de demonstração

Preparar previamente dados fictícios e coerentes, sem utilizar informações pessoais reais.

Cenários sugeridos:

- **Cliente fictício:** pessoa cadastrada com dados de teste.
- **Livros e autores:** títulos conhecidos e autores correspondentes.
- **Empréstimo em andamento:** empréstimo sem data de devolução.
- **Empréstimo antigo não devolvido:** registro com data suficientemente antiga para aparecer no relatório de atrasos.
- **Empréstimo devolvido:** registro com data de devolução preenchida.
- **Livro com vários empréstimos:** utilizar registros suficientes para demonstrar o relatório dos livros mais emprestados.
- **Auditoria:** preparar uma alteração que gere um registro auditável.

Antes da apresentação, conferir se os dados respeitam as chaves estrangeiras e restrições do banco. Ajustar as datas ao dia da demonstração, pois o relatório de atrasos utiliza a data atual como referência.

Não depender somente dos registros padrão do seeder. Preparar os dados de demonstração com antecedência, em ambiente de teste, e verificar os resultados dos relatórios antes do evento.

## 5. Ensaio completo

Realizar ao menos um ensaio completo antes de 15/11/2026.

Checklist do ensaio:

- [ ] Todos os integrantes estão presentes ou tiveram suas falas combinadas.
- [ ] Cada integrante fala por pelo menos um minuto.
- [ ] A demonstração ao vivo foi executada na ordem planejada.
- [ ] Os dados de demonstração estão preparados.
- [ ] Login, auditoria e relatórios foram testados quando aplicáveis.
- [ ] O tempo total foi cronometrado.
- [ ] As transições entre integrantes foram ensaiadas.
- [ ] O time identificou as etapas que precisam de melhorias.

**Data do ensaio:** a definir
**Duração cronometrada:** a preencher
**Ajustes identificados:** a preencher

## 6. Plano B — Indisponibilidade da produção

Se o site de produção estiver indisponível durante a apresentação:

1. Informar ao público que houve indisponibilidade do ambiente publicado.
2. Utilizar uma cópia local previamente preparada do projeto.
3. Confirmar com antecedência a instalação das dependências, as variáveis de ambiente, a conexão ao banco de teste e a execução das migrations.
4. Testar localmente as funcionalidades que serão demonstradas.
5. Manter capturas de tela das telas principais e dos PDFs gerados como apoio visual, caso a demonstração interativa não seja possível.
6. Não exibir credenciais, tokens ou dados pessoais reais nas capturas de tela.

A contingência deve ser ensaiada antes do dia da apresentação. Não deixar a configuração do ambiente local para o momento do evento.

## 7. Compartilhamento e responsáveis

O roteiro deve ser compartilhado com todos os integrantes para que cada pessoa confirme seu tema e seu tempo de fala.

**Responsável por consolidar o roteiro:** a definir
**Responsável pelos dados de teste:** a definir
**Responsável por verificar a produção:** a definir
**Responsável pela contingência local:** a definir
**Responsável por cronometrar o ensaio:** a definir

Atualizar este documento depois do ensaio com os nomes, os horários reais, a duração final e os ajustes definidos pelo time.