<?php

namespace App\Translator\Driver;

use Sepia\PoParser\Parser;
use Sepia\PoParser\SourceHandler\FileSystem;

class PoDriver extends Driver {

    public function parse()
    {
        $handler = new FileSystem($this->file);
        $parser = new Parser($handler);
        $parsed = $parser->parse();

        foreach ($parsed->getEntries() as $entery) {
            $this->response[] = [
                'project_id'    =>  $this->project_id,
                'key'           =>  $entery->getMsgId(),
                'value'         =>  $entery->getMsgStr()
            ];
        }

        return $this;
    }
}