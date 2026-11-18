<?php

declare(strict_types=1);

class Solution
{
    public function twoSum(array $nums, int $target): array
    {
        $seen = [];

        foreach ($nums as $index => $value) {
            $complement = $target - $value;
            if (isset($seen[$complement])) {
                return [$seen[$complement], $index];
            }

            $seen[$value] = $index;
        }

        return [];
    }
}
