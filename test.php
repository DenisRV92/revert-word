<?php

require_once __DIR__.'/index.php';

use PHPUnit\Framework\TestCase;

final class RevertCharactersTest extends TestCase
{

    /**
     * Тест на реверс строки на русском.
     */
    public function testStringRu()
    {
        $this->assertEquals('Тевирп! Онвад ен ьсиледив.', revertCharacters('Привет! Давно не виделись.'));
    }

    /**
     * Тест на реверс строки на английском.
     */
    public function testStringEn()
    {
        $this->assertEquals('Ih! Woh era u?', revertCharacters('Hi! How are u?'));
    }

    /**
     * Тест на реверс смешанной строки.
     */
    public function testStringRuEn()
    {
        $this->assertEquals('Ih! Как era ыт?', revertCharacters('Hi! Как are ты?'));
    }

    /**
     * Тест на реверс одного слова.
     */
    public function testSignleWorld()
    {
        $this->assertEquals('Юувтстевирп!', revertCharacters('Приветствую!'));
    }

    /**
     * Тест на пустую строку.
     */
    public function testEmpty()
    {
        $this->assertEquals('Строка пустая.', revertCharacters(''));
    }

    /**
     * Тест на реверс цифр.
     */
    public function testNumbers()
    {
        $this->assertEquals('987654321', revertCharacters('123456789'));
    }
}