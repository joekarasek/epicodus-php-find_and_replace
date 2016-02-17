<?php
    class FindAndReplace
    {
        function replaceWords($phrase, $word_to_replace, $replace_with)
        {
            $phrase = explode(' ', $phrase);
            foreach ($phrase as $index => $word) {
                if ($word == $word_to_replace) {
                    $phrase[$index] = $replace_with;
                }
            }
            $phrase = implode(' ', $phrase);
            return $phrase;
        }

        function replaceAnyMatch($phrase, $word_to_replace, $replace_with)
        {
            $phrase = ' ' . $phrase;
            for ($i=0; $i < strlen($phrase); $i++) {
                if (strpos($phrase, $word_to_replace, $i)) {
                    $i = strpos($phrase, $word_to_replace, $i);
                    $cut_out_size = strlen($word_to_replace);
                    $phrase = substr_replace($phrase, $replace_with, $i, $cut_out_size);
                    $i += strlen($replace_with)-1;
                }
            }
            return substr($phrase, 1);
        }
    }
 ?>
