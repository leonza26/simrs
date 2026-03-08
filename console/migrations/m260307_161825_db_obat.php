<?php

use yii\db\Migration;

class m260307_161825_db_obat extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('db_obat', [
            'id_obat' => $this->primaryKey(),
            'nama_obat' => $this->string(255)->notNull(),
            'satuan' => $this->string(100)->notNull(),
            'harga_obat' => $this->decimal(12,2)->notNull(),
            'stok' => $this->integer()->defaultValue(0),
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%db_obat}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m260307_161825_db_obat cannot be reverted.\n";

        return false;
    }
    */
}
