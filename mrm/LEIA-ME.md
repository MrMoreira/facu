# Projeto Caique Moreira | MrMoreira.com

## Introdução

Olá! Antes de começar a usar este projeto, siga as instruções abaixo para configurar corretamente o ambiente e entender algumas funcionalidades básicas do sistema.

## Importação do Banco de Dados

1. Importe o banco de dados utilizando o PhpMyAdmin.
2. O banco de dados foi exportado pelo PhpMyAdmin e deve ser importado da mesma forma.

## Configuração da Aba ADM

A aba ADM pode ser modificada diretamente no banco de dados:

- Quando o campo `ADM` está com valor "S" (Sim), os formulários terão o sufixo `Prof` (Professor).
- Quando o campo `ADM` está com valor "N" (Não), os formulários terão o sufixo `Std` (Student).

Essa configuração é utilizada para diferenciar o acesso entre professores e estudantes. Devido à falta de tempo, algumas funcionalidades ainda não foram implementadas completamente, e o sistema está em uma versão básica.

## Configuração do Banco de Dados

Para alterar as configurações do banco de dados, edite o arquivo `processer/dbconnect.php` e modifique os seguintes campos:

```php
private $host = 'XXXXX';
private $db_name = 'mrm';
private $username = 'XXXXX';
private $password = 'XXXXX';


Substitua XXXXX pelos valores apropriados para seu ambiente.
Acesso ao Projeto

Este projeto também está disponível no GitHub:

https://github.com/MrMoreira/facu
Agradecimentos

Obrigado pela paciência e por utilizar este projeto. Se encontrar qualquer problema ou tiver sugestões, sinta-se à vontade para contribuir no repositório do GitHub.

Nota: Este projeto ainda está em desenvolvimento e algumas funcionalidades podem não estar completas.
Contato

Para mais informações, entre em contato:

    Nome: MrMoreira
    GitHub: MrMoreira

😎+==========================================================+😎