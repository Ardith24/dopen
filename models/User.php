<?php

namespace app\models;
// use app\models\Donatur; //mendifinisikan model class Login yang telah kita generate tadi.

class User extends \yii\base\Object implements \yii\web\IdentityInterface
{
    public $id;
    public $nama;
    public $username;
    public $password;
    public $tgl_lahir;
    public $alamat;
    public $hp;
    public $email;
    public $foto;
    public $authKey;
    public $accessToken;

    public static function findIdentity($id)
    {
        //mencari user login berdasarkan IDnya dan hanya dicari 1.
        $user = Donatur::findOne($id); 
        if(count($user)){
            return new static($user);
        }
        return null;
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        //mencari user login berdasarkan accessToken dan hanya dicari 1.
        $user = Donatur::find()->where(['accessToken'=>$token])->one(); 
        if(count($user)){
            return new static($user);
        }
        return null;
    }

    public static function findByUsername($username)
    {
        //mencari user login berdasarkan username dan hanya dicari 1.
        $user = Donatur::find()->where(['username'=>$username])->one(); 
        if(count($user)){
            return new static($user);
        }
        return null;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->authKey;
    }

    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}