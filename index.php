<?php
/**
 * Метод разбивает входящую строку на слова, обрабатывает каждое слово и возвращает результат.
 *
 * @param string $str
 * @return string
 */
function revertCharacters(string $str): string
{
    if (empty($str)) {
        return "Строка пустая.";
    }

    $words = explode(' ', $str);

    foreach ($words as &$word) {
        $word = handleWord($word);
    }

    return implode(' ', $words);
}

/**
 * Метод обрабатывает входное слово, проверяя регистр и знаки пунктуации, и возвращает результат.
 *
 * @param string $word
 * @return string
 */
function handleWord(string $word): string
{
    $isUpperCase = checkUpperCase($word);

    if ($isUpperCase) {
        $word = mb_ucfirst(checkMarksAndReverse(mb_strtolower($word)));
    } else {
        $word = checkMarksAndReverse($word);
    }

    return $word;
}

/**
 * Метод проверяет, начинается ли слово с заглавной буквы.
 *
 * @param string $word
 * @return bool
 */
function checkUpperCase(string $word): bool
{
    $firstChar = mb_substr($word, 0, 1);
    return mb_strtolower($firstChar) !== $firstChar;
}

/**
 * Метод проверяет наличие знаков пунктуации и обратно переворачивает слово.
 *
 * @param string $word
 * @return string
 */
function checkMarksAndReverse(string $word): string
{
    preg_match('/\w+/u', $word, $matches);

    if ($matches[0] === $word) {
        return reverseWord($word);
    } else {
        $marks = preg_split('/[^[:punct:]]+/', $word, -1, PREG_SPLIT_NO_EMPTY);
        $reversed = reverseWord($word);
        return mb_substr($reversed, 1) . $marks[0];
    }
}

/**
 * Метод обратно переворачивает слово.
 *
 * @param string $word
 * @return string
 */
function reverseWord(string $word): string
{
    return implode('', array_reverse(mb_str_split($word)));
}

/**
 * Метод делает первую букву слова заглавной.
 *
 * @param string $str
 * @return string
 */
function mb_ucfirst(string $str): string
{
    return mb_strtoupper(mb_substr($str, 0, 1)) . mb_substr($str, 1);
}

