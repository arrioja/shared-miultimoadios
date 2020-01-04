<?php

/**
 * This is the model class for table "Usuario".
 *
 * The followings are the available columns in table 'Usuario':
 * @property integer $id
 * @property string $login
 * @property string $password
 * @property string $email
 * @property string $FirstName
 * @property string $LastName
 * @property string $birth_date
 * @property integer $country_code
 * @property string $sex
 * @property string $facebook
 * @property string $twitter
 * @property integer $cod_rol
 * @property string $timestamp
 * @property string $status
 * @property integer $warnings
 *
 * The followings are the available model relations:
 * @property Rol $codRol0
 */
class Usuario extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Usuario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Usuario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('login, password, email, FirstName, LastName, birth_date, country_code, cod_rol', 'required'),
			array('cod_rol', 'numerical', 'integerOnly'=>true),
			array('login', 'length', 'max'=>20),
			array('facebook, twitter', 'length', 'max'=>100),
            array('login','unique'),
            array('email','unique'),
			array('password', 'length', 'max'=>50),
			array('email, FirstName, LastName', 'length', 'max'=>250),
			array('sex, status', 'safe'),
            array('email','email'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, login, email, FirstName, LastName, country_code, sex, facebook, twitter, cod_rol, status', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'codRol' => array(self::BELONGS_TO, 'Rol', 'cod_rol'),
            'Msgs' => array(self::HAS_MANY, 'Mensajes', 'uid'),
            'ConteoMsgs' => array(self::STAT, 'Mensajes', 'id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'login' => 'Login',
			'password' => 'Clave',
			'email' => 'Email',
			'FirstName' => 'Nombres',
			'LastName' => 'Apellidos',
			'birth_date' => 'Fecha Nacimiento',
			'country_code' => 'País',
			'sex' => 'Sexo',
            'facebook' => 'Facebook',
            'twitter' => 'Twitter',
			'cod_rol' => 'Cod Rol',
			'timestamp' => 'Timestamp',
            'warnings' => 'Advertencias',
            'status' => 'Status'
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('login',$this->login,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('FirstName',$this->FirstName,true);
		$criteria->compare('LastName',$this->LastName,true);
		$criteria->compare('birth_date',$this->birth_date,true);
		$criteria->compare('country_code',$this->country_code);
		$criteria->compare('status',$this->status);
		$criteria->compare('sex',$this->sex,true);
        $criteria->compare('facebook',$this->facebook,true);
        $criteria->compare('twitter',$this->twitter,true);
		$criteria->compare('cod_rol',$this->cod_rol);	
        $criteria->compare('status',$this->status);
        $criteria->compare('warnings',$this->warnings);
		$criteria->compare('timestamp',$this->timestamp,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
            'pagination' => array('pageSize' => 50,)
		));
	}

/* Devuelve el número de usuarios registrados en el sitio */
    public function numUsuarios() {
        $sql = "SELECT COUNT(id) as total FROM Usuario";
        $command = Yii::app()->db->createCommand($sql);
        $results = $command->queryAll();
        $num = (int)$results[0]["total"];
        return $num;
    }

    public function es_admon() {
        If(isset(Yii::app()->user->rol) && Yii::app()->user->rol == 'Root')
           { return true;}
        else
           { return false;}

    }

}