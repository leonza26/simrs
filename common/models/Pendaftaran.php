<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pendaftaran".
 *
 * @property int $id_pendaftaran
 * @property string $no_registrasi
 * @property int $id_pasien
 * @property int $id_unit
 * @property string $tgl_daftar
 * @property string $keluhan_utama
 * @property string $status_periksa
 *
 * @property Pemeriksaan[] $pemeriksaans
 * @property Pasien $pasien
 * @property UnitLayanan $unit
 */
class Pendaftaran extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pendaftaran';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['no_registrasi', 'id_pasien', 'id_unit'], 'required'],
            [['id_pasien', 'id_unit'], 'default', 'value' => null],
            [['id_pasien', 'id_unit'], 'integer'],
            [['tgl_daftar'], 'safe'],
            [['keluhan_utama'], 'string'],
            [['no_registrasi'], 'string', 'max' => 50],
            [['status_periksa'], 'string', 'max' => 20],
            [['no_registrasi'], 'unique'],
            [['id_pasien'], 'exist', 'skipOnError' => true, 'targetClass' => Pasien::className(), 'targetAttribute' => ['id_pasien' => 'id_pasien']],
            [['id_unit'], 'exist', 'skipOnError' => true, 'targetClass' => UnitLayanan::className(), 'targetAttribute' => ['id_unit' => 'id_unit']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pendaftaran' => 'Id Pendaftaran',
            'no_registrasi' => 'No Registrasi',
            'id_pasien' => 'Id Pasien',
            'id_unit' => 'Id Unit',
            'tgl_daftar' => 'Tgl Daftar',
            'keluhan_utama' => 'Keluhan Utama',
            'status_periksa' => 'Status Periksa',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPemeriksaans()
    {
        return $this->hasMany(Pemeriksaan::className(), ['id_pendaftaran' => 'id_pendaftaran']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPasien()
    {
        return $this->hasOne(Pasien::className(), ['id_pasien' => 'id_pasien']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUnit()
    {
        return $this->hasOne(UnitLayanan::className(), ['id_unit' => 'id_unit']);
    }
}
