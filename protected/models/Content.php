<?php

/**
 * This is the model class for table "content".
 *
 * The followings are the available columns in table 'content':
 * @property integer $idcontent
 * @property string $title
 * @property string $description
 * @property string $created
 * @property integer $status
 * @property string $type
 * @property string $modified
 */
class Content extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Content the static model class
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
		return 'content';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, description, status, type', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('title, description, image', 'length', 'max'=>255),
			array('type', 'length', 'max'=>50),
            array('modified','default',
                  'value'=>new CDbExpression('NOW()'),
                  'setOnEmpty'=>false,'on'=>'update'),
            array('created,modified','default',
                  'value'=>new CDbExpression('NOW()'),
                  'setOnEmpty'=>false,'on'=>'insert'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idcontent, title, description, created, status, type, modified', 'safe', 'on'=>'search'),
			array('image', 'file','types'=>'jpg, gif, png', 'allowEmpty'=>true, 'on'=>'upload'), // this
			array('title image', 'length', 'max'=>255, 'allowEmpty' => true,'on'=>'upload')
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
            'contentmeta'=>array(self::HAS_MANY, 'ContentMeta', 'idcontent', 'together'=>true),
            'contentype'=>array(self::BELONGS_TO, 'ContentType', 'idtype', 'together'=>true),
		);

	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idcontent' => 'Idcontent',
			'title' => 'Title',
			'description' => 'Description',
//			'desc' => 'Desc',
			'image' => 'Image',
//			'bg_color' => 'Background Color',
			'created' => 'Created',
			'status' => 'Status',
			'type' => 'Type',
			'idtype' => 'Type Name',
			'modified' => 'Modified',
			
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

		$criteria->compare('idcontent',$this->idcontent);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('type',$this->type,true);
//		$criteria->compare('idtype',$this->idtype,true);
		$criteria->compare('modified',$this->modified,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}