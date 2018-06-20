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
header('Content-Type: text/html; charset=utf-8');

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
        } else {
        	echo 1;
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
        return trim($this->_text_as_array[0]);
    }

    /**
     * Выберем последнее слово
     *
     * @return mixed
     */
    private function _get_last_word()
    {
        return trim($this->_text_as_array[$this->_count_words_in_text - 1]);
    }

    private function _is_text_string_palindrom()
    {
        $first_word = $this->_get_first_word();
        $last_word = $this->_get_last_word();


        // Проверим слова на кол-во символов
        if (iconv_strlen($first_word, 'utf-8') === iconv_strlen($last_word, 'utf-8')) {
			$compare_result = $this->_compare_words($first_word, $last_word);

            if ($compare_result) return true;
        }

        return false;
    }

    private function _compare_words($first_word, $last_word)
    {
        // Первый цикл идет с начала ->
        // Второй цикл с конца <-
		$count = iconv_strlen($first_word, 'utf-8');
		$i_reverse = $count - 1;

        for ($i = 0; $i < $count; $i++, $i_reverse--) {
        	echo "<pre>"; var_dump($first_word[$i] , $last_word[$i_reverse]); echo "</pre>";
        	echo "<pre>"; var_dump($first_word[$i] !== $last_word[$i_reverse]); echo "</pre>";


//        	if ($first_word[$i] !== $last_word[$i_reverse]) {
//        		return false;
//			}
        	
        }
        return true;
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

phpinfo();