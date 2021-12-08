<?php
declare(strict_types=1);

namespace Htmlacademy\models;

use Htmlacademy\exceptions\FileSourceException;

class ScanDir {
    public function __construct(string $dirName)
    {
        if(!$dirName){
            throw new FileSourceException("Указаной папки нет");
        }

        $this->dirName = $dirName;
    }

    public function showFiles(string $fileExt): array {
        return glob($this->dirName . '*' . $fileExt);
    }
}