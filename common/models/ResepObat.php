<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "resep_obat".
 *
 * @property int $id_resep
 * @property int $id_pemeriksaan
 * @property array $detail_obat
 * @property string $status_farmasi
 * @property string $create_at
 *
 * @property Pemeriksaan $pemeriksaan
 */
class ResepObat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'resep_obat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pemeriksaan', 'detail_obat'], 'required'],
            [['id_pemeriksaan'], 'default', 'value' => null],
            [['id_pemeriksaan'], 'integer'],
            [['detail_obat', 'create_at'], 'safe'],
            [['status_farmasi'], 'string', 'max' => 20],
            [['id_pemeriksaan'], 'exist', 'skipOnError' => true, 'targetClass' => Pemeriksaan::className(), 'targetAttribute' => ['id_pemeriksaan' => 'id_pemeriksaan']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_resep' => 'Id Resep',
            'id_pemeriksaan' => 'Id Pemeriksaan',
            'detail_obat' => 'Detail Obat',
            'status_farmasi' => 'Status Farmasi',
            'create_at' => 'Create At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPemeriksaan()
    {
        return $this->hasOne(Pemeriksaan::className(), ['id_pemeriksaan' => 'id_pemeriksaan']);
    }
}
