# Revisão de Segurança

## Objetivo

Nesse  documento estou registrando a revisão de segurança realizada no projeto de biblioteca.Que foi pedida na issue #74 claro

A análise foi realizada sobre o estado atual do código disponível no repositório, considerando os recursos que já estão implementados.

---

## Checklist de Segurança

### 1. Mass Assignment

**Verificação:** conferir se os Models utilizam `$fillable` e não possuem `$guarded = []`.

**Resultado:** ✅ OK

Foi realizada uma busca nos Models do projeto por `$fillable` e `$guarded`.

O Model encontrado foi:

```text
app/Models/User.php