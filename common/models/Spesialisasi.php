<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "spesialisasi".
 *
 * @property int $id_spesialisasi
 * @property string $nama_spesialisasi
 *
 * @property Pegawai[] $pegawais
 */
class Spesialisasi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'spesialisasi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_spesialisasi'], 'required'],
            [['nama_spesialisasi'], 'string', 'max' => 100],
            [['nama_spesialisasi'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_spesialisasi' => 'Id Spesialisasi',
            'nama_spesialisasi' => 'Nama Spesialisasi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPegawais()
    {
        return $this->hasMany(Pegawai::className(), ['id_spesialisasi' => 'id_spesialisasi']);
    }
}
