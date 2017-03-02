<?php
namespace timedoctor;

class FileInput extends Input
{
    public function __construct(FileSource $source)
    {
        parent::__construct($source);
    }
}