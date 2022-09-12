<?php

use yii\db\Migration;
use yii\db\Schema;
/**
 * Class m220911_175911_criar_tabela_cargo
 */
class m220911_175911_criar_tabela_cargo extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('cargo', [
            'id' => Schema::TYPE_PK,
            'nome' => Schema::TYPE_STRING . ' NOT NULL'
        ]);
        
        $this->addForeignKey('cargo_id', 'funcionario', 'cargo_id', 'cargo', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('cargo_id','funcionario');
        $this->dropTable('cargo');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220911_175911_criar_tabela_cargo cannot be reverted.\n";

        return false;
    }
    */
}
