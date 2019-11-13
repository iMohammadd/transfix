<?php 

namespace App\Translator\Export;

use Carbon\Carbon;

class IniExport extends Driver {

    public function export()
    {
        $this->file = $this->path . $this->name . "_" . strtotime(Carbon::now()) . '_' . uniqid() .'.' . $this->ext;
        //dd($this->array);
        $fh = fopen($this->file, 'w');

        foreach ($this->array as $item) {
            $key = addslashes($item['key']);
            $value = addslashes($item['value']);
            fwrite($fh, "\n");
            fwrite($fh, "{$key}=\"{$value}\"\n");
        }
        fclose($fh);

        return $this;
    }
}