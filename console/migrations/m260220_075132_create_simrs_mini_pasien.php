<?php

use yii\db\Migration;

class m260220_075132_create_simrs_mini_pasien extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
         // 1. Create Pasien Table
        $this->createTable('{{%pasien}}', [
            'id_pasien' => $this->bigPrimaryKey(),
            'no_rm' => $this->string(20)->notNull()->unique(),
            'nama_pasien' => $this->string(255)->notNull(),
            'nik' => $this->char(16)->notNull()->unique(),
            'tempat_lahir' => $this->string(100),
            'tanggal_lahir' => $this->date()->notNull(),
            'jenis_kelamin' => $this->char(1),
            'alamat' => $this->text(),
            'create_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'update_at' => $this->timestamp(),
        ]);

        // 2. Create Unit Layanan Table
        $this->createTable('{{%unit_layanan}}', [
            'id_unit' => $this->bigPrimaryKey(),
            'nama_unit' => $this->string(100)->notNull(),
            'kode_unit' => $this->string(10)->unique(),
            'status_aktif' => $this->boolean()->defaultValue(true),
        ]);

        // 3. Create Pendaftaran Table
        $this->createTable('{{%pendaftaran}}', [
            'id_pendaftaran' => $this->bigPrimaryKey(),
            'no_registrasi' => $this->string(50)->notNull()->unique(),
            'id_pasien' => $this->bigInteger()->notNull(),
            'id_unit' => $this->bigInteger()->notNull(),
            'tgl_daftar' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'keluhan_utama' => $this->text(),
            'status_periksa' => $this->string(20)->defaultValue('ANTRE'),
        ]);

        // 4. Create Pemeriksaan Table (JSONB Support)
        $this->createTable('{{%pemeriksaan}}', [
            'id_pemeriksaan' => $this->bigPrimaryKey(),
            'id_pendaftaran' => $this->bigInteger()->notNull(),
            'data_soap' => 'JSONB NOT NULL', // Manual definition for Postgres JSONB
            'diagnosa_icd10' => $this->string(20),
            'tindakan' => $this->text(),
            'create_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);

        // Add Foreign Keys
        $this->addForeignKey('fk_pendaftaran_pasien', '{{%pendaftaran}}', 'id_pasien', '{{%pasien}}', 'id_pasien', 'CASCADE');
        $this->addForeignKey('fk_pendaftaran_unit', '{{%pendaftaran}}', 'id_unit', '{{%unit_layanan}}', 'id_unit', 'CASCADE');
        $this->addForeignKey('fk_pemeriksaan_pendaftaran', '{{%pemeriksaan}}', 'id_pendaftaran', '{{%pendaftaran}}', 'id_pendaftaran', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%pemeriksaan}}');
        $this->dropTable('{{%pendaftaran}}');
        $this->dropTable('{{%unit_layanan}}');
        $this->dropTable('{{%pasien}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m260220_075132_create_simrs_mini_pasien cannot be reverted.\n";

        return false;
    }
    */
}
