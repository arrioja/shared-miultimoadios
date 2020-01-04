<?php

/**
 * This is the model class for table "Adjuntos".
 *
 * The followings are the available columns in table 'Adjuntos':
 * @property integer $id
 * @property integer $mid
 * @property string $title
 * @property string $ext
 * @property string $url
 * @property string $upload_date
 * @property string $status_id
 */
class Adjuntos extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Adjuntos the static model class
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
		return 'Adjuntos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('mid, title, url, upload_date', 'required'),
			array('mid', 'numerical', 'integerOnly'=>true),
			array('title, url', 'length', 'max'=>250),
			array('ext', 'length', 'max'=>10),
			array('status_id', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, mid, title, ext, url, upload_date, status_id', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'mid' => 'Mid',
			'title' => 'Title',
			'ext' => 'Ext',
			'url' => 'Url',
			'upload_date' => 'Upload Date',
			'status_id' => 'Status',
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
		$criteria->compare('mid',$this->mid);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('ext',$this->ext,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('upload_date',$this->upload_date,true);
		$criteria->compare('status_id',$this->status_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}