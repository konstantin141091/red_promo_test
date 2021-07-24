<?php


namespace App\Models;

class SimilarModel
{
    /**
     * Find max repeat word in text
     *
     * @param string $text
     *
     * @return string $word
     *
     */
    protected function findRepeatWord(string $text) {
        $words = explode(' ', $text);
        $str_count = [];
        $max_count_key = '';
        $max_count_value = 1;

        // весь текст разбит на слова в виде массива, перебираем его
        for ($i = 0; $i < count($words); $i++) {
            // проверяем длинну слова, что отбросить слова меньше 3 символов
            if (iconv_strlen($words[$i]) > 3) {
                // проверяем есть ли уже это слова в массиве у нас, если есть то инкримент счетчика
                // если нет то в else добавляем слово
                if (array_key_exists($words[$i], $str_count)) {
                    $count = $str_count[$words[$i]] + 1;
                    $str_count[$words[$i]] = $count;

                    // проверка на самое большое количество повторов
                    if ($count > $max_count_value) {
                        $max_count_value = $count;
                        $max_count_key = $words[$i];
                    }

                }else {
                    $str_count[$words[$i]] = 1;
                }
            }
        }
        return $max_count_key;
    }
}
