<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tagihan".
 *
 * @property int $id_tagihan
 * @property int $id_pendaftaran
 * @property string $total_biaya
 * @property bool $status_lunas
 * @property string $metode_bayar
 * @property string $tgl_bayar
 * @property string $create_at
 *
 * @property Pendaftaran $pendaftaran
 */
class Tagihan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tagihan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pendaftaran'], 'required'],
            [['id_pendaftaran'], 'default', 'value' => null],
            [['id_pendaftaran'], 'integer'],
            [['total_biaya'], 'number'],
            [['status_lunas'], 'boolean'],
            [['tgl_bayar', 'create_at'], 'safe'],
            [['metode_bayar'], 'string', 'max' => 50],
            [['id_pendaftaran'], 'exist', 'skipOnError' => true, 'targetClass' => Pendaftaran::className(), 'targetAttribute' => ['id_pendaftaran' => 'id_pendaftaran']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_tagihan' => 'Id Tagihan',
            'id_pendaftaran' => 'Id Pendaftaran',
            'total_biaya' => 'Total Biaya',
            'status_lunas' => 'Status Lunas',
            'metode_bayar' => 'Metode Bayar',
            'tgl_bayar' => 'Tgl Bayar',
            'create_at' => 'Create At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPendaftaran()
    {
        return $this->hasOne(Pendaftaran::className(), ['id_pendaftaran' => 'id_pendaftaran']);
    }
}
