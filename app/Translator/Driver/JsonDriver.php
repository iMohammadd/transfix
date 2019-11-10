<?php
/**
 * Created by PhpStorm.
 * User: mohammad
 * Date: 11/5/19
 * Time: 5:59 PM
 */

namespace App\Translator\Driver;


class JsonDriver extends Driver
{
    public function parse()
    {
        $json = file_get_contents($this->file);
        $parsed = json_decode($json, true);
        foreach ($parsed as $key => $value) {
            $this->response[] = [
                'project_id'    =>  $this->project_id,
                'key'           =>  $key,
                'value'         =>  $value
            ];
        }
        return $this;
    }
}