<?php

/**
 * RecibirForm class.
 * RecibirForm is the data structure for keeping
 * Datos necesarios para procesar la recepción del documento.
 */
class RecibirForm extends CFormModel
{
	public $email;
	public $cod1;
	public $cod2;
	public $verifyCode;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// name, email, subject and body are required
			array('email, cod2', 'required'),
			// email has to be a valid email address
			array('email', 'email'),
			// verifyCode needs to be entered correctly
			array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
		);
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
			'verifyCode'=>'Escriba el siguiente código:',
            'email'=>'Dirección de email en la cual recibió el correo',
            'cod2'=>'Código de verificación de recepción',
		);
	}
}