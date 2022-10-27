<?php

namespace Utopia\Balancing\Algorithm;

use Utopia\Balancing\Algorithm;
use Utopia\Balancing\Option;

class Random extends Algorithm
{
    /**
     * @param Option[] $options
     */
    public function run(array $options): ?Option
    {
        return $options[\array_rand($options)] ?? null;
    }
}
