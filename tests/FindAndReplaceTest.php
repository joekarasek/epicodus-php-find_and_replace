<?php
    require_once __DIR__ . '/../src/FindAndReplace.php';

    class ClassTest extends PHPUnit_Framework_TestCase
    {
        function test_replaceWords_oneWordNoMatch()
        {
            // Arrange
            $test_FindAndReplace = new FindAndReplace;
            $phrase = 'cat';
            $word_to_replace = 'dog';
            $replace_with = 'hotdog';

            // Act
            $result = $test_FindAndReplace->replaceWords($phrase, $word_to_replace, $replace_with);

            // Assert
            $this->assertEquals('cat', $result);
        }
        function test_replaceWords_oneWordMatch()
        {
            // Arrange
            $test_FindAndReplace = new FindAndReplace;
            $phrase = 'cat';
            $word_to_replace = 'cat';
            $replace_with = 'hotdog';

            // Act
            $result = $test_FindAndReplace->replaceWords($phrase, $word_to_replace, $replace_with);

            // Assert
            $this->assertEquals('hotdog', $result);
        }
        function test_replaceWords_sentenceNoMatch()
        {
            // Arrange
            $test_FindAndReplace = new FindAndReplace;
            $phrase = 'The cat in the hat.';
            $word_to_replace = 'dog';
            $replace_with = 'hotdog';

            // Act
            $result = $test_FindAndReplace->replaceWords($phrase, $word_to_replace, $replace_with);

            // Assert
            $this->assertEquals('The cat in the hat.', $result);
        }
        function test_replaceWords_sentenceOneMatch()
        {
            // Arrange
            $test_FindAndReplace = new FindAndReplace;
            $phrase = 'The cat in the hat.';
            $word_to_replace = 'cat';
            $replace_with = 'hotdog';

            // Act
            $result = $test_FindAndReplace->replaceWords($phrase, $word_to_replace, $replace_with);

            // Assert
            $this->assertEquals('The hotdog in the hat.', $result);
        }
        function test_replaceWords_sentenceMultipleMatch()
        {
            // Arrange
            $test_FindAndReplace = new FindAndReplace;
            $phrase = 'The cat in the hat laughed at the cat in the dress.';
            $word_to_replace = 'cat';
            $replace_with = 'hotdog';

            // Act
            $result = $test_FindAndReplace->replaceWords($phrase, $word_to_replace, $replace_with);

            // Assert
            $this->assertEquals('The hotdog in the hat laughed at the hotdog in the dress.', $result);
        }
    }
?>
