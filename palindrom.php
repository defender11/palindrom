<?php
/**
 * Created by PhpStorm.
 * User: leva
 * Date: 6/20/18
 * Time: 7:33 AM
 */

/*
Написать программу на рнр, которая определяет является ли строка текста палиндромом (читается с обоих сторон одинаково) и осуществляет вывод строки следующим способом:

а) если строка является палиндромом, то она выводится полностью.

б) если строка не является палиндромом - выводится самый длинный под-палиндром этой строки, т.е. самая длинная часть строки, являющаяся палиндромом

в) если подпалиндромы отсутствуют в строке - выводится первый символ строки.

Примеры палиндромов:
- Аргентина манит негра
- Sum summus mus
*/

class Palindrom
{
    // исходный текст
    private $_text_source;
    // слова предложения ввиде массива
    private $_text_as_array;
    // Кол-во слов в строке
    private $_count_words_in_text = 0;

    public function __construct($text)
    {
        $this->_text_source = $text;
        $this->_text_as_array = explode(' ', $this->_text_source);
        $this->_count_words_in_text = count($this->_text_as_array);
    }

    public function show()
    {
        if ($this->_is_text_string_palindrom()) {
            echo $this->_text_source;
        }

    }


    /* Определим строка как палендром */
    /**
     * Выберем первое слово
     *
     * @return mixed
     */
    private function _get_first_word()
    {
        return $this->_text_as_array[0];
    }

    /**
     * Выберем последнее слово
     *
     * @return mixed
     */
    private function _get_last_word()
    {
        return $this->_text_as_array[$this->_count_words_in_text - 1];
    }

    private function _is_text_string_palindrom()
    {
        $first_word = $this->_get_first_word();
        $last_word = $this->_get_last_word();

        // Проверим слова на кол-во символов
        if (count($first_word) === count($last_word)) {
//            $compare_result = $this->_compare_words($first_word, $last_word);
            $this->_compare_words($first_word, $last_word);

//            if ($compare_result) return true;
        }

        return false;
    }

    private function _compare_words($first_word, $last_word)
    {
        // Первый цикл идет с начала ->
        // Второй цикл с конца <-

        for ($f_i = 0; $f_i < strlen($first_word); $f_i++) {
            for ($l_i = (strlen($last_word) - 1); $l_i > 0; $l_i-- ) {

            }
        }
    }
}

// --------------------------------------

$texts = ['Аргентина манит негра', 'Sum summus mus'];

foreach ($texts as $text) {

    if (!empty($text)) {
        $palindrom = new Palindrom($text);

        $palindrom->show();
    }
}