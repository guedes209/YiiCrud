<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m220913_193823_criar_tabela_produto_ml
 */
class m220913_193823_criar_tabela_produto_ml extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('produto_ml', [
            'id' => Schema::TYPE_PK,
            'codigo_ml' => Schema::TYPE_STRING . ' NOT NULL'
        ]);

        $this->insert('produto_ml', ['codigo_ml' => 'MLB1381222244']);
        $this->insert('produto_ml', ['codigo_ml' => 'MLB-1689836021']);
        $this->insert('produto_ml', ['codigo_ml' => 'MLB-1570636742']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('produto_ml');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220913_193823_criar_tabela_produto_ml cannot be reverted.\n";

        return false;
    }
    */
}
