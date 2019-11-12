<?php

namespace App\Translator\Export;

abstract class Driver {
    protected $path;
    protected $name;
    protected $array;
    protected $ext;
    protected $file;

    public function __construct(array $array, $name, $ext)
    {

        $this->array = $array;
        $this->name = $name;
        $this->ext = $ext;

        $this->path = public_path("/download/{$ext}/");
        if (! \File::isDirectory(public_path("/download/{$ext}/"))) {
           mkdir($this->path, 0777, true);
        }

        $this->export();
    }

    public function export() {}

    public function response()
    {
        return $this->file;
    }
}