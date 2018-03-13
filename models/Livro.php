<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "livro".
 *
 * @property int $id
 * @property string $nome
 * @property int $categoria
 * @property int $quantidade
 *
 * @property Emprestimo[] $emprestimos
 * @property Categoria $categoria0
 */
class Livro extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'livro';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['categoria', 'quantidade'], 'integer'],
            [['nome'], 'string', 'max' => 150],
            [['categoria'], 'exist', 'skipOnError' => true, 'targetClass' => Categoria::className(), 'targetAttribute' => ['categoria' => 'id']],
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
            'categoria' => 'Categoria',
            'quantidade' => 'Quantidade',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmprestimos()
    {
        return $this->hasMany(Emprestimo::className(), ['livro_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoria()
    {
        return $this->hasOne(Categoria::className(), ['id' => 'categoria']);
    }

    public static function livrosDisponiveis(){
        $conn = \Yii::$app->db;

        $sql = 'SELECT livro.id, livro.nome, livro.quantidade 
                FROM bibilioteca.emprestimo
                JOIN livro on livro.id = livro_id
                where emprestimo.data_devolucao is null
                GROUP BY livro.id, livro.nome, livro.quantidade
                HAVING COUNT(*) < livro.quantidade;';

        $dados = $conn->createCommand($sql)->queryAll();

        return $dados;
    }
}
