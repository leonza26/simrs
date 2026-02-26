<?php

use yii\db\Migration;

class m260221_070424_simrsmini_table2 extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        /**
         * 1. TABLE PERAN (Untuk RBAC Sederhana)
         */
        $this->createTable('{{%peran}}', [
            'id_peran' => $this->bigPrimaryKey(),
            'nama_peran' => $this->string(50)->notNull()->unique(), // ADMIN, DOKTER, PERAWAT, KASIR
        ]);

        /**
         * 2. TABLE SPESIALISASI (Untuk Dokter)
         */
        $this->createTable('{{%spesialisasi}}', [
            'id_spesialisasi' => $this->bigPrimaryKey(),
            'nama_spesialisasi' => $this->string(100)->notNull()->unique(),
        ]);

        /**
         * 3. TABLE PEGAWAI
         */
        $this->createTable('{{%pegawai}}', [
            'id_pegawai' => $this->bigPrimaryKey(),
            'nama_pegawai' => $this->string(255)->notNull(),
            'id_peran' => $this->bigInteger()->notNull(),
            'id_spesialisasi' => $this->bigInteger(), // Nullable, karena tidak semua pegawai punya spesialisasi
            'no_hp' => $this->string(20),
            'status_aktif' => $this->boolean()->defaultValue(true),
            'create_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);

        /**
         * 4. TABLE RESEP OBAT
         */
        $this->createTable('{{%resep_obat}}', [
            'id_resep' => $this->bigPrimaryKey(),
            'id_pemeriksaan' => $this->bigInteger()->notNull(),
            'detail_obat' => 'JSONB NOT NULL', // Format JSON array obat
            'status_farmasi' => $this->string(20)->defaultValue('MENUNGGU'),
            'create_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);

        /**
         * 5. TABLE TAGIHAN
         */
        $this->createTable('{{%tagihan}}', [
            'id_tagihan' => $this->bigPrimaryKey(),
            'id_pendaftaran' => $this->bigInteger()->notNull(),
            'total_biaya' => $this->decimal(15,2)->notNull()->defaultValue(0),
            'status_lunas' => $this->boolean()->defaultValue(false),
            'metode_bayar' => $this->string(50),
            'tgl_bayar' => $this->timestamp(),
            'create_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);

        /**
         * ==========================
         * FOREIGN KEY SECTION
         * ==========================
         */

        // Pegawai -> Peran
        $this->addForeignKey(
            'fk_pegawai_peran',
            '{{%pegawai}}',
            'id_peran',
            '{{%peran}}',
            'id_peran',
            'RESTRICT',
            'CASCADE'
        );

        // Pegawai -> Spesialisasi
        $this->addForeignKey(
            'fk_pegawai_spesialisasi',
            '{{%pegawai}}',
            'id_spesialisasi',
            '{{%spesialisasi}}',
            'id_spesialisasi',
            'SET NULL',
            'CASCADE'
        );

        // Resep -> Pemeriksaan
        $this->addForeignKey(
            'fk_resep_pemeriksaan',
            '{{%resep_obat}}',
            'id_pemeriksaan',
            '{{%pemeriksaan}}',
            'id_pemeriksaan',
            'CASCADE',
            'CASCADE'
        );

        // Tagihan -> Pendaftaran
        $this->addForeignKey(
            'fk_tagihan_pendaftaran',
            '{{%tagihan}}',
            'id_pendaftaran',
            '{{%pendaftaran}}',
            'id_pendaftaran',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m260221_070424_simrsmini_table2 cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m260221_070424_simrsmini_table2 cannot be reverted.\n";

        return false;
    }
    */
}
