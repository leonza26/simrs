<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "db_obat".
 *
 * @property int $id_obat
 * @property string $nama_obat
 * @property string $satuan
 * @property string $harga_obat
 * @property int $stok
 */
class DbObat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'db_obat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_obat', 'satuan', 'harga_obat'], 'required'],
            [['harga_obat'], 'number'],
            [['stok'], 'default', 'value' => null],
            [['stok'], 'integer'],
            [['nama_obat'], 'string', 'max' => 255],
            [['satuan'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_obat' => 'Id Obat',
            'nama_obat' => 'Nama Obat',
            'satuan' => 'Satuan',
            'harga_obat' => 'Harga Obat',
            'stok' => 'Stok',
        ];
    }
}
