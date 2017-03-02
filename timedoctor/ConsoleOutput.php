<?php
namespace timedoctor;


class ConsoleOutput extends Output
{
    public function __construct(ConsoleSource $source)
    {
        parent::__construct($source);
    }
}