<div class="col-md-4">
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-book fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <div>Quantidade de livros cadastrados</div>
                    <div class="huge"><?php echo $livros?></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-book fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <div>Quantidade de livros em empréstimos</div>
                    <div class="huge"><?php echo $emprestados?></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-book fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <div>Quantidade de livros com atraso na devolução</div>
                    <div class="huge"><?php echo $atrasados?></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-money fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <div>Faturamento mês atual</div>
                    <div class="huge"><?php echo Yii::$app->formatter->format($faturamento, 'currency')?></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-money fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <div>Faturamento mês anterior</div>
                    <div class="huge"><?php echo Yii::$app->formatter->format($faturamento_anterior, 'currency')?></div>
                </div>
            </div>
        </div>
    </div>
</div>