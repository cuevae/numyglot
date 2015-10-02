<?php


namespace Kurtgeiger\Numbers\Model;


class RomanNumeralsParser implements Parser
{

    protected $mapping = [
        'I' => [ 'index' => 0, 'value' => 1 ],
        'V' => [ 'index' => 1, 'value' => 5 ],
        'X' => [ 'index' => 2, 'value' => 10 ],
        'L' => [ 'index' => 3, 'value' => 50 ],
        'C' => [ 'index' => 4, 'value' => 100 ],
        'D' => [ 'index' => 5, 'value' => 500 ],
        'M' => [ 'index' => 6, 'value' => 1000 ]
    ];

    /**
     * RomanNumeralsParser constructor.
     */
    public function __construct()
    {
    }

    public function parseToInteger($input)
    {
        if (strlen($input) === 1)
        {
            return $this->mapping[$input]['value'];
        }

        $counter = 0;
        for ($i = 0 ; $i < strlen($input) ; $i += 2)
        {
            $left = $input[$i];
            if (isset($input[$i + 1]))
            {
                $right = $input[$i + 1];
                if ($this->numberOnTheLeftHasALowerValueThanNumberOnTheRight($left, $right))
                {

                    if($this->numberOnTheLeftIsOneOrTwoIndexesBehindNumberOnTheRight($left, $right) === false){
                        throw new \InvalidArgumentException(
                            sprintf(
                                'Please check your number is well formed: %s. Found an inconsistency at %d',
                                $input,
                                $i
                            )
                        );
                    }

                    $counter += $this->mapping[$right]['value'] - $this->mapping[$left]['value'];
                } else
                {
                    $counter += $this->mapping[$left]['value'] + $this->mapping[$right]['value'];
                }
            } else
            {
                $counter += $this->mapping[$left]['value'];
            }
        }

        return $counter;

    }

    private function numberOnTheLeftHasALowerValueThanNumberOnTheRight($left, $right)
    {
        return $this->mapping[$left]['value'] < $this->mapping[$right]['value'];
    }

    private function numberOnTheLeftIsOneOrTwoIndexesBehindNumberOnTheRight($left, $right)
    {
        return ( $this->mapping[$left]['index'] === ( $this->mapping[$right]['index'] - 1 ))
               || ( $this->mapping[$left]['index'] === ( $this->mapping[$right]['index'] - 2 ));
    }
}