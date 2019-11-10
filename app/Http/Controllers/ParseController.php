<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sepia\PoParser\Parser;
use Sepia\PoParser\SourceHandler\FileSystem;

class ParseController extends Controller
{
    public function po() {
//        $handler = new FileSystem(public_path('en_EN.po'));
//        $parser = new Parser($handler);
//        $parsed = $parser->parse();
//        //return public_path(). "/en_EN.po";
//        //dd($file);
//        //preg_match_all('/(?sm)msgid ""[^"]*(.*)msgstr ""/', $file, $parsed);
//        //dd($parsed);
//        foreach ($parsed->getEntries() as $entery) {
//            echo  "{$entery->getMsgId()} <br>";
//            echo  "{$entery->getMsgStr()} <br>";
//        }
        //return $parsed->getEntries();
        $file = public_path(). "/en_EN.po";
        $r = $this->parse('Po', $file, 1);
        return $r;
    }

    public function ini()
    {
        $file = public_path('en-GB.ini');
        return $this->parse('Ini', $file);
    }

    public function json()
    {
        $file = public_path('fa.json');
        return $this->parse('Json', $file);
    }

    public function parse($driver, $file, $project_id = 1)
    {
        $class = 'App\Translator\Driver\\' . $driver . 'Driver';
        $d = new $class($file, $project_id);
        return $d->response();
    }
}
