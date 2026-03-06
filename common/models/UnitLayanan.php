<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "unit_layanan".
 *
 * @property int $id_unit
 * @property string $nama_unit
 * @property string $kode_unit
 * @property bool $status_aktif
 *
 * @property Pendaftaran[] $pendaftarans
 */
class UnitLayanan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'unit_layanan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_unit'], 'required'],
            [['status_aktif'], 'boolean'],
            [['tarif_dasar', 'kategori_spesialis'], 'integer'],
            [['nama_unit'], 'string', 'max' => 100],
            [['kode_unit'], 'string', 'max' => 10],
            [['kode_unit'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_unit' => 'Id Unit',
            'nama_unit' => 'Nama Unit',
            'kode_unit' => 'Kode Unit',
            'tarif_dasar' => 'Tarif Dasar Pendaftaran (Rp)',
            'kategori_spesialis' => 'Kategori Spesialis',
            'status_aktif' => 'Status Aktif',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPendaftarans()
    {
        return $this->hasMany(Pendaftaran::className(), ['id_unit' => 'id_unit']);
    }

     public static function getListSpesialisasi()
    {
        // Asumsi model Spesialisasi sudah ada sesuai skema sebelumnya
        return ArrayHelper::map(Spesialisasi::find()->all(), 'id_spesialisasi', 'nama_spesialisasi');
    }

    public function getSpesialisasi()
    {
        return $this->hasOne(Spesialisasi::className(), ['id_spesialisasi' => 'kategori_spesialis']);
    }
}
