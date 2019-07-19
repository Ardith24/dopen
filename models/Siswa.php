<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "siswa".
 *
 * @property int $id
 * @property string $nama
 * @property string $alamat
 * @property string $tgl_lahir
 * @property string $foto
 * @property int $jenjang_id
 *
 * @property JenjangPendidikan $id0
 */
class Siswa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'siswa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'alamat', 'tgl_lahir', 'jenjang_id'], 'required'],
            [['alamat'], 'string'],
            [['tgl_lahir'], 'safe'],
            [['jenjang_id'], 'integer'],
            [['nama', 'foto'], 'string', 'max' => 45],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => JenjangPendidikan::className(), 'targetAttribute' => ['id' => 'id']],
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
            'alamat' => 'Alamat',
            'tgl_lahir' => 'Tgl Lahir',
            'foto' => 'Foto',
            'jenjang_id' => 'Jenjang ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(JenjangPendidikan::className(), ['id' => 'id']);
    }
}
