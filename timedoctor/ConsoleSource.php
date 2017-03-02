<?php
namespace timedoctor;

class ConsoleSource extends Source
{
    public function getData(): string
    {
        throw new \BadMethodCallException('getData method is not implemented for ConsoleSource');
    }

    public function putData(string $data): void
    {
        echo "<pre>";
        print_r($data);
        echo "<pre>";
    }
}