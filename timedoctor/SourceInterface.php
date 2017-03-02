<?php
namespace timedoctor;

interface SourceInterface
{
    public function getData(): string;

    public function putData(string $data): void;
}