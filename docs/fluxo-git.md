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

## 5. Abrir o Pull Request (PR)

1. Entra ao repositório no **GitHub**.
2. Clique em **Compare & pull request**.
3. O template de PR irá carregar automaticamente preenchendo as secções solicitadas (o que foi feito, issue que fecha e como testar)[cite: 1, 9].

## 6.  Merge

1. Aguarde as validações automáticas dos bots.
2. Obtenha a aprovação de três colegas.
3. Clique no botão verde "Merge pull request" e confirme o merge para enviar o código para a main.



