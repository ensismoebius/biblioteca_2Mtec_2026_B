<!--
  Preencha os campos abaixo. O PR só pode ser mesclado com 3 aprovações e
  com os três checks automáticos verdes (política de PR, code-intelligence
  e vínculo com issue).
-->

## O que este PR faz

<!-- Descreva em 1-3 frases o que mudou e por quê. -->

## Issue relacionada

<!--
  OBRIGATÓRIO: referencie a issue usando uma das palavras-chave do GitHub,
  para que ela feche automaticamente quando este PR for mesclado.
  Exemplos válidos: "Closes #12", "Fixes #7", "Resolves #23".
-->
Closes #

## Como testar

<!-- Passo a passo para outra pessoa validar sua mudança localmente. -->

## Checklist

- [ ] Rodei `./vendor/bin/pint` (ou equivalente) antes de abrir o PR
- [ ] Testei manualmente no navegador (quando aplicável)
- [ ] Adicionei/atualizei testes automatizados (quando aplicável)
- [ ] O PR toca apenas o que é necessário para fechar a issue acima


#  Padrão de Branches 

## Estrutura 

a estrutura teve seguir : tipo/issue-NN-descricao-curta
* **NN**: Número da issue/tarefa (ex: `issue-123`).
* **tipo**: Um dos tipos listados abaixo.
* **descricao-curta**: Resumo da tarefa em letras minúsculas e separado por hífens.

## Tipos 

docs: apenas mudanças de documentação;
feat: uma nova funcionalidade;
fix: a correção de um bug;
perf: mudança de código focada em melhorar performance;
refactor: mudança de código que não adiciona uma funcionalidade e também não corrigi um bug;
style: mudanças no código que não afetam seu significado (espaço em branco, formatação, ponto e vírgula, etc);
test: adicionar ou corrigir testes.


# Padrão de Commits

## Estrutura

A estrutura deve seguir: Tipo/-descricao-curta

## Tipos

fix - Commits do tipo fix indicam que seu trecho de código commitado está solucionando um problema (bug fix), (se relaciona com o PATCH do versionamento semântico).

feat- Commits do tipo feat indicam que seu trecho de código está incluindo um novo recurso (se relaciona com o MINOR do versionamento semântico).

docs - Commits do tipo docs indicam que houveram mudanças na documentação, como por exemplo no Readme do seu repositório. (Não inclui alterações em código).

style - Commits do tipo style indicam que houveram alterações referentes a formatações de código, semicolons, trailing spaces, lint... (Não inclui alterações em código).