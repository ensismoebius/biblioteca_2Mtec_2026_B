# Passo a Passo do Fluxo de Trabalho (Clonar ao Merge)

## 1. Clonar o Repositório

Para clonar o projeto para a tua máquina:
 
git clone <URLdorepositorio>


## 2. Criar uma Nova Branch
Nunca trabalhes diretamente na `main`. Cria uma branch seguindo o Padrão de Branches:

git checkout -b tipo/issue-NN-descricao-curta


## 3. Fazer Commit
Após fazer as alterações nos arquivos, faça o commit:

git add .
git commit -m "tipo/descricao-curta"

## 4. Enviar a Branch para o GitHub (Push)
Envia a tua branch local para o repositório remoto:

git push origin tipo/issue-NN-descricao-curta
