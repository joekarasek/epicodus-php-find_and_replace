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
    }
 ?>
