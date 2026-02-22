<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pasien".
 *
 * @property int $id_pasien
 * @property string $no_rm
 * @property string $nama_pasien
 * @property string $nik
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 * @property string $jenis_kelamin
 * @property string $alamat
 * @property string $create_at
 * @property string $update_at
 *
 * @property Pendaftaran[] $pendaftarans
 */
class Pasien extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pasien';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['no_rm', 'nama_pasien', 'nik', 'tanggal_lahir'], 'required'],
            [['tanggal_lahir', 'create_at', 'update_at'], 'safe'],
            [['alamat'], 'string'],
            [['no_rm'], 'string', 'max' => 20],
            [['nama_pasien'], 'string', 'max' => 255],
            [['nik'], 'string', 'max' => 16],
            [['tempat_lahir'], 'string', 'max' => 100],
            [['jenis_kelamin'], 'string', 'max' => 1],
            [['nik'], 'unique'],
            [['no_rm'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pasien' => 'Id Pasien',
            'no_rm' => 'No Rm',
            'nama_pasien' => 'Nama Pasien',
            'nik' => 'Nik',
            'tempat_lahir' => 'Tempat Lahir',
            'tanggal_lahir' => 'Tanggal Lahir',
            'jenis_kelamin' => 'Jenis Kelamin',
            'alamat' => 'Alamat',
            'create_at' => 'Create At',
            'update_at' => 'Update At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPendaftarans()
    {
        return $this->hasMany(Pendaftaran::className(), ['id_pasien' => 'id_pasien']);
    }
}
