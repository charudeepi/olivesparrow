<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class MetaClass extends CApplicationComponent
{
	
	
	function insert($content_id = 0, $meta_key= '', $meta_value = '')
	{
		//$Cmodel=new Content;
		$meta = new ContentMeta();
		$meta->idcontent = $content_id;
		$meta->meta_key = $meta_key;
		$meta->meta_value = $meta_value;
		$meta->isNewRecord = true;
		$meta->save();		
	}
	function update($content_id = 0, $meta_key= '', $meta_value = '')
	{
		$meta = new ContentMeta;
		$meta->updateAll(array('meta_value'=>$meta_value), " idcontent='".$content_id."' and meta_key='".$meta_key."' ");
	}
	
	function get($content_id = 0, $meta_key= ''){
		$meta = new ContentMeta;
		//$this->insert();
        if($meta_key != '')
        {
            $all_records =$meta->findAll(" idcontent='".$content_id."' and meta_key='".$meta_key."' ", array('idmeta' , 'idcontent', 'meta_key' , 'meta_value'));
            $all_records = json_decode( CJSON::encode($all_records));

            $result = array();
            foreach ($all_records[0] as $key => $value) {
                $result[$key] = $value;
            }
            return $result;
//            print_r($result);
//            exit();
//            return $all_records;
//            return $all_records[0];
        }else{
            $all_records =$meta->findAll(" idcontent='".$content_id."'", array('idmeta' , 'idcontent', 'meta_key' , 'meta_value'));
            $all_records = json_decode( CJSON::encode($all_records));
            return $all_records;
        }
	}
}