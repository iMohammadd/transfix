<?php 

namespace App\Translator\Export;

use Carbon\Carbon;

class PoExport extends Driver {

    public function export()
    {
        $this->file = $this->path . $this->name . strtotime(Carbon::now()) . '_' . uniqid() .'.' . $this->ext;
        //dd($this->array);
        $fh = fopen($this->file, 'w');
        fwrite($fh, "#\n");
        fwrite($fh, "msgid \"\"\n");
        fwrite($fh,  "msgstr \"\"\n");

        foreach ($this->array as $item) {
            $key = addslashes($item['key']);
            $value = addslashes($item['value']);
            fwrite($fh, "\n");
            fwrite($fh, "msgid \"$key\"\n");
            fwrite($fh, "msgstr \"$value\"\n");
        }
        fclose($fh);

        return $this;
    }
}