<?php
namespace timedoctor;

class Processor
{
    /**
     * @var string
     */
    private $data;

    public function load(string $data): void
    {
        $this->data = $data;
    }

    public function processOld(): string
    {
        $result = '';

        $input = (int)$this->data;

        $array = ['0'];

        for ($i = 1;  $i <= $input; $i++) {
            $arrayA = [];
            $arrayB = [];

            $reversedArray = array_reverse($array);

            foreach ($array as $item) {
                $arrayA [] = '0' . ($item === '0' && $i === 1? '': $item);
            }
            foreach ($reversedArray as $item) {
                $arrayB [] = '1' . ($item === '0' && $i === 1? '': $item);
            }
            $array = array_merge($arrayA, $arrayB);
        }

        $result = implode(',', array_slice($array, count($array) - $input));

        return $result;
    }

    public function process(): string
    {
        $result = '';

        $input = (int)$this->data;
        echo 'input: ' . $input . '<br><br>';

        $array = [];

        $base = decbin(pow(2, $input - 1));
        $post = decbin(0);
        $array[] = $base + $post;

        for ($i = 1; $i <= $input; $i = $i + 2) {
            if ($i >0 && $i % 2 ===0) {
                continue;
            }
            $post = decbin($i);
            $array[] = $base + $post;
        }

        $result = implode(',', $array);
        echo 'result: ' . '<br>';
        return $result;
    }
}