<?php
    class FindAndReplace
    {
        function replaceWords($phrase, $word_to_replace, $replace_with)
        {
            $phrase = explode(' ', $phrase);
            foreach ($phrase as $index => $word) {
                $phrase[$index] = str_replace($word_to_replace, $replace_with, $word);
            }
            $phrase = implode(' ', $phrase);
            return $phrase;
        }

        function replaceAnyMatch($phrase, $word_to_replace, $replace_with)
        {
            return str_replace($word_to_replace, $replace_with, $phrase);
        }
    }
 ?>
