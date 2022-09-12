<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m220911_174650_criar_tabela_funcionario
 */
class m220911_174650_criar_tabela_funcionario extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('funcionario', [
            'id' => Schema::TYPE_PK,
            'nome' => Schema::TYPE_STRING . ' NOT NULL',
            'cpf' => Schema::TYPE_STRING . ' NOT NULL',
            'logradouro' => Schema::TYPE_STRING,
            'cep' => Schema::TYPE_STRING,
            'cidade' => Schema::TYPE_STRING,
            'estado' => Schema::TYPE_STRING,
            'numero' => Schema::TYPE_INTEGER,
            'complemento' => Schema::TYPE_STRING,
            'cargo_id' => Schema::TYPE_INTEGER . ' NOT NULL'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('funcionario');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220911_174650_criar_tabela_funcionario cannot be reverted.\n";

        return false;
    }
    */
}
