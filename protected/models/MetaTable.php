<?php

/**
 * This is the model class for table "meta_table".
 *
 * The followings are the available columns in table 'meta_table':
 * @property integer $idmeta
 * @property integer $idcontent
 * @property string $meta_key
 * @property string $meta_value
 */
class MetaTable extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ContentMeta the static model class
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
		return 'meta_table';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idcontent', 'required'),
			array('idcontent', 'numerical', 'integerOnly'=>true),
//			array('bg_color', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idmeta, idcontent, meta_key, meta_value', 'safe', 'on'=>'search'),
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
            //        'content'=>array(self::BELONGS_TO, 'Content', 'idcontent', 'together'=>true),
        		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		/*return array(
			'idmeta' => 'idmeta',
			'idcontent' => 'Content',
			'bg_color' => 'BG Color',
			'meta_value' => 'Description',
		);*/
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		/*$criteria=new CDbCriteria;

		$criteria->compare('idmeta',$this->idmeta);
		$criteria->compare('idcontent',$this->idcontent);
		$criteria->compare('bg_color',$this->bg_color,true);
		$criteria->compare('desc',$this->desc,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));*/
	}
}