<?php

use Aws\S3\S3Client;

class AwsClass extends CApplicationComponent
{
    function saveObj($key, $filepath) {

//        echo 'test 0';
//        if(Yii::app()->request->baseUrl == '/olive') {
//            $bucket = 'olivesparrow/200px';
//        }else{
//            $bucket = 'olivesparrow/infographics';
//        }
        $bucket = 'olivesparrow/infographics';

        // Instantiate the client.
        $s3 = S3Client::factory(array(
            'key'    => 'AKIAIQKMTDDD7JS3A3EA',
            'secret' => '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'
        ));

        //echo 'test2';

        echo "Creating a new object with key {$key}\n";

        $result = $s3->putObject(array(
            'Bucket' => $bucket,
            'Key'    => $key,
            'SourceFile'   => $filepath,
            'ContentType'  => 'image/png',
            'ACL'    => 'public-read',
            'StorageClass' => 'REDUCED_REDUNDANCY'
        ));

        echo 'test 4';

        return $result;

    }

    function deleteObj($key)
    {
        $s3 = S3Client::factory(array(
            'key'    => 'AKIAIQKMTDDD7JS3A3EA',
            'secret' => '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'
        ));

//        if(Yii::app()->request->baseUrl == '/olive') {
//            $bucket = 'olivesparrow/200px';
//        }else{
//            $bucket = 'olivesparrow/infographics';
//        }
        $bucket = 'olivesparrow/infographics';

        $result = $s3->deleteObject(array(
            'Bucket' => $bucket,
            'Key'    => $key
        ));
        return $result;
    }

}