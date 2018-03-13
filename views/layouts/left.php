<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->


        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Inicio', 'icon' => 'dashboard', 'url' => ['/admin']],
//                    ['label' => 'Custos', 'icon' => 'file-code-o', 'url' => ['/admin/custo']],
                    ['label' => 'Categorias', 'icon' => 'file-code-o', 'url' => ['/admin/categoria']],
                    ['label' => 'Livros', 'icon' => 'book', 'url' => ['/admin/livro']],
                    ['label' => 'Locatario', 'icon' => 'address-card', 'url' => ['/admin/livro']],
                    ['label' => 'Usuário', 'icon' => 'user', 'url' => ['/admin/livro']],
                    ['label' => 'Emprestimo', 'icon' => 'clipboard-list', 'url' => ['/admin/emprestimo']],
                ],
            ]
        ) ?>

    </section>

</aside>
