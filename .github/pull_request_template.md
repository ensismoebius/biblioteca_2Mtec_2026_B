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


