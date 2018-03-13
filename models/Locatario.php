<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "locatario".
 *
 * @property int $id
 * @property string $nome
 * @property string $cpf
 * @property string $email
 * @property string $data_nascimento
 *
 * @property Emprestimo[] $emprestimos
 */
class Locatario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'locatario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['data_nascimento'], 'safe'],
            [['nome'], 'string', 'max' => 100],
            [['cpf'], 'string', 'max' => 11],
            [['email'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'cpf' => 'Cpf',
            'email' => 'Email',
            'data_nascimento' => 'Data Nascimento',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmprestimos()
    {
        return $this->hasMany(Emprestimo::className(), ['locatario_id' => 'id']);
    }
}
