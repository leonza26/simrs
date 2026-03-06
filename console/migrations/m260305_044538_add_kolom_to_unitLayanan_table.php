<?php

use yii\db\Migration;

class m260305_044538_add_kolom_to_unitLayanan_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('unit_layanan', 'kategori_spesialis', $this->text()->notNull());
        $this->addColumn('unit_layanan', 'tarif_dasar', $this->decimal(10, 2)->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('unit_layanan', 'kategori_spesialis');
        $this->dropColumn('unit_layanan', 'tarif_dasar');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m260305_044538_add_kolom_to_unitLayanan_table cannot be reverted.\n";

        return false;
    }
    */
}
