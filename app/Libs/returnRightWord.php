<?php

// 1 день назад, 3 дня назад, 9 дней назад...
class returnRightWord {
    public static function main($comparedWord, $firstVariant, $secondVariant, $thirdVariant){
        $comparedWord = (int) $comparedWord;

        return match ($comparedWord) {
            1 => $firstVariant,
            2, 3, 4 => $secondVariant,
            0, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20 => $thirdVariant,
            // Если это ~ 34, то вызвать функцию с числом 4
            default => returnRightWord::second_main(
                substr($comparedWord, -1),
                $firstVariant,
                $secondVariant,
                $thirdVariant
            )
        };
    }

    // Why not recurse? - Bugs
    private static function second_main($comparedWord, $firstVariant, $secondVariant, $thirdVariant) {
        $comparedWord = (int) $comparedWord;

        return match ($comparedWord) {
            1 => $firstVariant,
            2, 3, 4 => $secondVariant,
            0, 5, 6, 7, 8, 9 => $thirdVariant
        };
    }

}
