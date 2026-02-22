<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pemeriksaan".
 *
 * @property int $id_pemeriksaan
 * @property int $id_pendaftaran
 * @property array $data_soap
 * @property string $diagnosa_icd10
 * @property string $tindakan
 * @property string $create_at
 *
 * @property Pendaftaran $pendaftaran
 */
class Pemeriksaan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pemeriksaan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pendaftaran', 'data_soap'], 'required'],
            [['id_pendaftaran'], 'default', 'value' => null],
            [['id_pendaftaran'], 'integer'],
            [['data_soap', 'create_at'], 'safe'],
            [['tindakan'], 'string'],
            [['diagnosa_icd10'], 'string', 'max' => 20],
            [['id_pendaftaran'], 'exist', 'skipOnError' => true, 'targetClass' => Pendaftaran::className(), 'targetAttribute' => ['id_pendaftaran' => 'id_pendaftaran']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pemeriksaan' => 'Id Pemeriksaan',
            'id_pendaftaran' => 'Id Pendaftaran',
            'data_soap' => 'Data Soap',
            'diagnosa_icd10' => 'Diagnosa Icd10',
            'tindakan' => 'Tindakan',
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
