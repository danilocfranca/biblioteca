<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "emprestimo".
 *
 * @property int $id
 * @property int $livro_id
 * @property int $locatario_id
 * @property string $data_retirada
 * @property string $data_prevista_devolucao
 * @property string $valor_emprestimo
 * @property string $data_devolucao
 * @property string $valor_pago
 *
 * @property Livro $livro
 * @property Locatario $locatario
 */
class Emprestimo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'emprestimo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['livro_id', 'locatario_id'], 'integer'],
            [['data_retirada', 'data_prevista_devolucao', 'data_devolucao'], 'safe'],
            [['valor_emprestimo', 'valor_pago'], 'number'],
            [['livro_id'], 'exist', 'skipOnError' => true, 'targetClass' => Livro::className(), 'targetAttribute' => ['livro_id' => 'id']],
            [['locatario_id'], 'exist', 'skipOnError' => true, 'targetClass' => Locatario::className(), 'targetAttribute' => ['locatario_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'livro_id' => 'Livro',
            'locatario_id' => 'Locatario',
            'data_retirada' => 'Data Retirada',
            'data_prevista_devolucao' => 'Data Prevista Devolucao',
            'valor_emprestimo' => 'Valor Emprestimo',
            'data_devolucao' => 'Data Devolucao',
            'valor_pago' => 'Valor Pago',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLivro()
    {
        return $this->hasOne(Livro::className(), ['id' => 'livro_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocatario()
    {
        return $this->hasOne(Locatario::className(), ['id' => 'locatario_id']);
    }
}
