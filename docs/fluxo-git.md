      Passo a Passo do Fluxo de Trabalho (Clonar ao Merge)

           Clonar o Repositório

Para clonar o projeto para a tua máquina:
 
git clone <URLdorepositorio>

            Criar uma Nova Branch
Nunca trabalhes diretamente na `main`. Cria uma branch seguindo o Padrão de Branches:

git checkout -b tipo/issue-NN-descricao-curta

            Fazer Commit
Após fazer as alterações nos arquivos, faça o commit:

git add .
git commit -m "tipo/descricao-curta"

            Enviar a Branch para o GitHub (Push)
Envia a tua branch local para o repositório remoto:

git push origin tipo/issue-NN-descricao-curta

       Abrir o Pull Request (PR)

 Entra ao repositório no **GitHub**.
Clique em **Compare & pull request**.
 O template de PR irá carregar automaticamente preenchendo as secções solicitadas (o que foi feito, issue que fecha e como testar)


            Merge

 Aguarde as validações automáticas dos bots.
 Obtenha a aprovação de três colegas.
 Clique no botão verde "Merge pull request" e confirme o merge para enviar o código para a main.



