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
 * @property JenjangPendidikan $jenjang
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
            [['jenjang_id'], 'integer'],
            [['nama', 'tgl_lahir', 'foto'], 'string', 'max' => 45],
            [['jenjang_id'], 'exist', 'skipOnError' => true, 'targetClass' => JenjangPendidikan::className(), 'targetAttribute' => ['jenjang_id' => 'id']],
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
    public function getJenjang()
    {
        return $this->hasOne(JenjangPendidikan::className(), ['id' => 'jenjang_id']);
    }
}
