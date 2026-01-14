<?php

namespace App\Tests\Unit;

use App\Entity\Author;
use App\Entity\Book;
use PHPUnit\Framework\TestCase;

class BookTest extends TestCase
{
    public function testGettersAndSetters(): void
    {
        $book = new Book();

        $book->setTitle('Clean Code');
        $book->setIsbn('123456789');

        $this->assertSame('Clean Code', $book->getTitle());
        $this->assertSame('123456789', $book->getIsbn());
    }

    public function testBookCanBeLinkedToAuthor(): void
    {
        $book = new Book();
        $author = new Author();

        
        if (method_exists($book, 'setAuthor') && method_exists($book, 'getAuthor')) {
            $book->setAuthor($author);
            $this->assertSame($author, $book->getAuthor());
            return;
        }

        
        if (method_exists($book, 'addAuthor') && method_exists($book, 'getAuthors')) {
            $book->addAuthor($author);

            $authors = $book->getAuthors();
            $this->assertCount(1, $authors);
            $this->assertSame($author, $authors->first());
            return;
        }

        $this->fail('Aucune méthode trouvée pour lier un Book à un Author (setAuthor/getAuthor ou addAuthor/getAuthors).');
    }
}
