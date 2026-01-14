<?php

namespace App\Tests\Unit;

use App\Entity\Author;
use PHPUnit\Framework\TestCase;

class AuthorTest extends TestCase
{
    public function testGettersAndSetters(): void
    {
        $author = new Author();

        $author->setName('Robert Martin');

        $this->assertSame('Robert Martin', $author->getName());
    }
}
