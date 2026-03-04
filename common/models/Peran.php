<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "peran".
 *
 * @property int $id_peran
 * @property string $nama_peran
 *
 * @property Pegawai[] $pegawais
 */
class Peran extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'peran';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_peran'], 'required'],
            [['nama_peran'], 'string', 'max' => 50],
            [['nama_peran'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_peran' => 'Id Peran',
            'nama_peran' => 'Nama Peran',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPegawais()
    {
        return $this->hasMany(Pegawai::className(), ['id_peran' => 'id_peran']);
    }
}
