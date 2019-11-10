<?php

namespace App\Translator\Driver;

abstract class Driver {

    protected $file;
    protected $project_id;
    protected $response = [];

    public function __construct($file, $project_id)
    {
        $this->file = $file;
        $this->project_id = $project_id;
        $this->parse();
    }

    public function parse() {}

    public function response()
    {
        return ($this->response);
    }
}