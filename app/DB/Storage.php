<?php
namespace Acc\DB;

use Acc\DB\File;
use Acc\DB\Maria;

class Storage
{
    //private static $type = 'File';
    private static $type = 'Maria';
    public static function getStorage($from)
    {
        return match (self::$type) {
            'File' => new File($from),
            'Maria' => new Maria($from),
            default => throw new \Exception('Undefined storage type'),
        };
    }
}