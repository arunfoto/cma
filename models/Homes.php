<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "homes".
 *
 * @property int $id
 * @property string $firstname
 * @property string $lastname
 * @property string $email
 * @property string $phone
 * @property string $address
 * @property int $home_sqft
 * @property int $form_submit
 */

class Homes extends \yii\db\ActiveRecord {
	/**
	 * {@inheritdoc}
	 */
	public static function tableName() {
		return 'homes';
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules() {
		return [
			[['firstname', 'email', 'phone', 'home_sqft'], 'required'],
			[['address'], 'string'],
			[['home_sqft', 'form_submit'], 'integer'],
			[['firstname', 'lastname', 'email'], 'string', 'max' => 250],
			[['phone'], 'string', 'max'                          => 15],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels() {
		return [
			'id'          => 'ID',
			'firstname'   => 'Firstname',
			'lastname'    => 'Lastname',
			'email'       => 'Email',
			'phone'       => 'Phone',
			'address'     => 'Address',
			'home_sqft'   => 'Home Sqft',
			'form_submit' => 'Form Submit',
		];
	}
}
