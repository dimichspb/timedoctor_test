<?php
namespace timedoctor;

interface OutputInterface
{
    public function write(string $input): void;
}