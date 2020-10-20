
# ANGLO VESTIBULARES 

## TESTE DE CONHECIMENTO – DESENVOLVEDOR WEB 

- DB MYSQL 
- BOOTSTRAP 
- JQUERY 
- CODEIGNITER 

---

1. CRIAÇÃO DAS TABELAS E SUAS REFERÊNCIAS (INTEGRIDADE REFERENCIAL) 
2. TABELA TAREFAS (ID, DESCRIÇÃO, RESPONSÁVEL, DATA FINALIZAÇÃO DA TAREFA, CATEGORIA) 
3. TABELA CATEGORIA (ID, DESCRIÇÃO DA CATEGORIA) 
4. TABELA DE RESPONSÁVEIS (ID, NOME) 
5. CRIAÇÃO DE UM FORMULÁRIO DE CADASTRO 
6. CRIAÇÃO DE UMA TELA PARA VISUALIZAÇÃO DAS TAREFAS 
7. EDIÇÃO E EXCLUSÃO 
8. CRIAÇÃO DE UMA TELA DE VISUALIZAÇÃO DA TAREFA COM DETALHAMENTO 

---

AO TERMINAR, ENVIAR OS FONTES E O BACKUP COM AS TABELAS DO BANCO DE DADOS. 

### Provisionamento:
O projeto está usando o docker-compose para provisionar o ambiente de desenvolvimento.
Para testar, instale o docker-compose no seu sistema antes.
1. clone este repositório
2. rode o comando docker-compose up --build para montar o ambiente
3. lembre-se de instalar as dependências do composer em seguida: docker-compose exec web composer install
4. você pode usar docker-compose up -d, para iniciar os serviços e docker-compose down para pará-los novamente.
5. Vai ser preciso criar e popular as tabelas com o sql (não tive tempo para explorar o sistema de migrations do ci4).
 - Um arquivo dentro da pasta environment, que tem todos os arquivos necessários para o provisionamento, tem um arquivo chamado ci4-tarefas.sql 
 - para acessar o cli do mysql acesse o serviço: docker-compose exec db bash
 - rode os comandos do ci4-tarefas.sql como faria usualmente na linha de comando
5. Derrube os serviços com o docker-compose down e suba novamente, a página de boas vindas do ci4 deve estar acessível no localhost:80

----