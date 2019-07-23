<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "donasi".
 *
 * @property int $id
 * @property string $nama
 * @property string $jumlah
 * @property int $jenis_id
 * @property string $create_at
 *
 * @property Jenis $id0
 */
class Donasi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'donasi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'jumlah', 'jenis_id'], 'required'],
            [['jenis_id'], 'integer'],
            [['create_at'], 'safe'],
            [['nama'], 'string', 'max' => 45],
            [['jumlah'], 'string', 'max' => 50],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => Jenis::className(), 'targetAttribute' => ['id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'jumlah' => 'Jumlah',
            'jenis_id' => 'Jenis ID',
            'create_at' => 'Create At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(Jenis::className(), ['id' => 'id']);
    }
}
