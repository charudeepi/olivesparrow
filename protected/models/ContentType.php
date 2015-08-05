<?php

/**
 * This is the model class for table "content_type".
 *
 * The followings are the available columns in table 'content_type':
 * @property integer $idtype
 * @property string $title
 * @property string $type
 */
class ContentType extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ContentType the static model class
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
		return 'content_type';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, type', 'required'),
			array('title, type', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idtype, title, type', 'safe', 'on'=>'search'),
			array('icon', 'file','types'=>'jpg, gif, png', 'allowEmpty'=>true, 'on'=>'upload'), // this
			array('title, icon', 'length', 'max'=>255, 'allowEmpty' => true,'on'=>'upload'),
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
            'content'=>array(self::HAS_MANY, 'Content', 'idtype', 'together'=>true),
        );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idtype' => 'Idtype',
			'title' => 'Title',
			'type' => 'Type',
			'icon' => 'Icon',
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

		$criteria->compare('idtype',$this->idtype);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('type',$this->type,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}