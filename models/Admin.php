<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "admin".
 *
 * @property int $id
 * @property string $nama
 * @property string $username
 * @property string $password
 * @property string $tgl_lahir
 * @property string $alamat
 * @property string $hp
 * @property string $email
 * @property string $foto
 */
class Admin extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'admin';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'nama', 'username', 'password', 'tgl_lahir', 'alamat', 'hp', 'email'], 'required'],
            [['id'], 'integer'],
            [['tgl_lahir'], 'safe'],
            [['alamat'], 'string'],
            [['nama', 'username', 'foto'], 'string', 'max' => 45],
            [['password', 'email'], 'string', 'max' => 30],
            [['hp'], 'string', 'max' => 15],
            [['id'], 'unique'],
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
            'username' => 'Username',
            'password' => 'Password',
            'tgl_lahir' => 'Tgl Lahir',
            'alamat' => 'Alamat',
            'hp' => 'Hp',
            'email' => 'Email',
            'foto' => 'Foto',
        ];
    }
}
