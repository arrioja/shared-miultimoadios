<?php

/**
 * This is the model class for table "Mensajes".
 *
 * The followings are the available columns in table 'Mensajes':
 * @property integer $id
 * @property integer $uid
 * @property string $para
 * @property string $cuerpo
 * @property string $estatus
 * @property string $estatus
 * @property string $revision
 * @property string $timestamp
 * @property string $cod_registro  // código creado al momento del registro del mensaje
 * @property string $cod_envio     // código creado al momento de enviar el mensaje al destinatario
 */
class Mensajes extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Mensajes the static model class
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
		return 'Mensajes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('para, cuerpo, estatus, asunto', 'required'),
            array('para', 'email'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, uid, para, asunto, cuerpo, estatus, cod_registro, cod_envio', 'safe', 'on'=>'search'),
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
            'Usr' => array(self::BELONGS_TO, 'Usuario', 'uid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
            'uid' => 'User ID',
			'para' => 'Para (Email)',
			'cuerpo' => 'Cuerpo',
			'estatus' => 'Estatus',
            'revision' => 'Revisión',
            'timestamp' => 'TimeStamp',
			'asunto' => 'Título',
            'cod_registro' => 'Código de Verificación Nro 1',
            'cod_envio' => 'Código de Verificación Nro 2'
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
        $criteria->compare('uid',$this->uid);
        $criteria->compare('asunto',$this->asunto,true);
		$criteria->compare('para',$this->para,true);
		$criteria->compare('cuerpo',$this->cuerpo,true);
		$criteria->compare('estatus',$this->estatus,true);
        $criteria->compare('revision',$this->revision,true);
        $criteria->compare('timestamp',$this->timestamp,true);
        $criteria->compare('cod_registro',$this->cod_registro,true);
        $criteria->compare('cod_envio',$this->cod_envio,true);
		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}