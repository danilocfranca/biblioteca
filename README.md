Biblioteca
============================

Um sistema administrativo de cadastro de livros, categorias, usuários e dashboard. Um
sistema de empréstimo de livros, o qual o usuário após efetuar o login, pode alterar seus
dados de cadastro, realizar empréstimos de livros disponíveis e acompanhar empréstimos
em aberto ou já realizados.



REQUIREMENTS
------------

Apache + PHP5

INSTALAÇÃO
------------


CONFIGURAÇÃO
-------------

### Database
Criar database a partir do script biblioteca.sql e editar o arquivo `config/db.php` com os dados do database:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2basic',
    'username' => 'root',
    'password' => '1234',
    'charset' => 'utf8',
];
```

### Url de acesso

http://localhost/biblioteca/web/index.php?r=admin