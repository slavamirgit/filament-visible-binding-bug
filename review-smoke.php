
<?php

declare(strict_types=1);

function calculateAverage(array $values): float
{
    $sum = array_sum($values);

    return $sum / count($values);
}
