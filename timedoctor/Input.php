<?php
namespace timedoctor;

abstract class Input implements InputInterface
{
    /**
     * @var SourceInterface
     */
    protected $source;

    public function __construct(SourceInterface $source)
    {
        $this->source = $source;
    }

    public function read(): string
    {
        return $this->source->getData();
    }
}