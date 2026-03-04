<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "pegawai".
 */
class Pegawai extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'pegawai';
    }

    public function rules()
    {
        return [
            [['nama_pegawai', 'id_peran'], 'required', 'message' => '{attribute} tidak boleh kosong.'],
            [['id_peran', 'id_spesialisasi'], 'integer'],
            [['status_aktif'], 'boolean'],
            [['create_at'], 'safe'],
            [['nama_pegawai'], 'string', 'max' => 255],
            [['no_hp'], 'string', 'max' => 20],
            [['id_peran'], 'exist', 'skipOnError' => true, 'targetClass' => Peran::className(), 'targetAttribute' => ['id_peran' => 'id_peran']],
            [['id_spesialisasi'], 'exist', 'skipOnError' => true, 'targetClass' => Spesialisasi::className(), 'targetAttribute' => ['id_spesialisasi' => 'id_spesialisasi']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id_pegawai' => 'ID Pegawai',
            'nama_pegawai' => 'Nama Lengkap & Gelar',
            'id_peran' => 'Peran Utama',
            'id_spesialisasi' => 'Spesialisasi',
            'no_hp' => 'Nomor WhatsApp',
            'status_aktif' => 'Status Aktif',
            'create_at' => 'Terdaftar Pada',
        ];
    }

    /**
     * Helper untuk mengambil data dropdown Peran
     */
    public static function getListPeran()
    {
        return ArrayHelper::map(Peran::find()->all(), 'id_peran', 'nama_peran');
    }

    /**
     * Helper untuk mengambil data dropdown Spesialisasi
     */
    public static function getListSpesialisasi()
    {
        return ArrayHelper::map(Spesialisasi::find()->all(), 'id_spesialisasi', 'nama_spesialisasi');
    }

    public function getPeran()
    {
        return $this->hasOne(Peran::className(), ['id_peran' => 'id_peran']);
    }

    public function getSpesialisasi()
    {
        return $this->hasOne(Spesialisasi::className(), ['id_spesialisasi' => 'id_spesialisasi']);
    }
}