Biblioteca
============================

![alt text](https://raw.githubusercontent.com/danilocfranca/biblioteca/master/web/tela.png)

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
![alt text](https://raw.githubusercontent.com/danilocfranca/biblioteca/master/web/biblioteca.png)


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

REQUISITOS DESENVOLVIMENTO
---------------------------
Jquery: 

```javascript
   $(document).ready(function(){
        $('#emprestimo-data_prevista_devolucao').on('blur', function(){
            custoEmprestimo();
        });
    });

    function custoEmprestimo(){
        var start = new Date($('#emprestimo-data_retirada').val());
        var end = new Date($('#emprestimo-data_prevista_devolucao').val());

        var diff = new Date(end - start);

        var days = diff/1000/60/60/24;
        var custo_emprestimo = $('#custo_emprestimo').val();
        var custo = custo_emprestimo * days;
        $('#emprestimo-valor_emprestimo').val(custo);
    }
```

HTML5: utilizado nos campos de data
Bootstrap 3: template utilizado
Framework: Yii 2