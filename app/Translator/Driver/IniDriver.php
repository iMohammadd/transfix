<?php

namespace App\Translator\Driver;

class IniDriver extends Driver {

    public function parse()
    {
        //dd($this->file);
        $parsed = (parse_ini_file($this->file));

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