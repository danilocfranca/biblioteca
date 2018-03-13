<?php

namespace app\modules\admin\controllers;

use app\models\Emprestimo;
use app\models\Livro;
use yii\web\Controller;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {



//        var_dump();die;
            $livros = Livro::find()->count();
            $emprestados = Emprestimo::find()->where(['data_devolucao' => null])->count();
            $atrasados = Emprestimo::find()->where('data_devolucao is null and data_prevista_devolucao < now()')->count();
            $faturamento = Emprestimo::find()->where('data_devolucao is not null and month(data_devolucao) = '.date('m'))->sum('valor_pago');
            $faturamento_anterior = Emprestimo::find()->where('data_devolucao is not null and month(data_devolucao) = '.((int)date('m')-1))->sum('valor_pago');

            return $this->render('index',[
                    'livros' => $livros,
                    'emprestados' => $emprestados,
                    'atrasados' => $atrasados,
                    'faturamento' => $faturamento,
                    'faturamento_anterior' => ($faturamento_anterior) ? $faturamento_anterior : 0
                ]
            );



    }
}
