<?php

namespace common\models;

use Yii;

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
}
