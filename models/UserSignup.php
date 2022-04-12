<?php

namespace app\models;

use yii\base\Model;
use app\models\User;

/**
 * Signup form
 */
class UserSignup extends Model
{
    public $username;
    public $email;
    public $nombre;
    public $apellido;
    public $status;
    public $imagen;
    public $password;
    public $authKey;

    public static function tableName()
    {
        return 'tbl_usuarios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Nombre de usuario ya existe.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['nombre', 'trim'],
            ['nombre', 'required'],
            ['nombre', 'string', 'min' => 2, 'max' => 255],

            ['apellido', 'trim'],
            ['apellido', 'required'],
            ['apellido', 'string', 'min' => 2, 'max' => 255],

            [['imagen'], 'safe'],
            [['imagen'], 'file', 'extensions' => 'jpg, gif, png'],
            ['imagen', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Direccion de correo ya existe.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            [['status'], 'integer'],
        ];
    }


    public function attributeLabels()
    {
        return [
            'id_usuario' => 'Id',
            'username' => 'Usuario',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'auth_key' => 'Auth Key',
            'password' => 'Password',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'imagen' => 'Imagen',
            'status' => 'Estado',
            'created_at' => 'Fecha de creacion',
            'updated_at' => 'Fecha de actualizacion',
        ];
    }
    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->nombre = $this->nombre;
        $user->apellido = $this->apellido;
        $user->imagen = $this->imagen;
        $user->status = $this->status;
        $user->setPassword($this->password);
        $user->generateAuthKey();

        return $user->save() ? $user : null;
    }
}
