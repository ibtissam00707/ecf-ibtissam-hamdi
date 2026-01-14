<?php

namespace App\Tests\Functional;

use App\Entity\Book;
use App\Entity\Author;
use App\Entity\Editor;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BibliosFunctionalTest extends WebTestCase
{
    public function testFixturesDataArePresent(): void
    {
        
        $client = static::createClient();

        /** @var EntityManagerInterface $em */
        $em = static::getContainer()->get(EntityManagerInterface::class);

        $bookCount = $em->getRepository(Book::class)->count([]);
        $authorCount = $em->getRepository(Author::class)->count([]);
        $editorCount = $em->getRepository(Editor::class)->count([]);

        $this->assertGreaterThan(0, $bookCount, 'Aucun livre en base');
        $this->assertGreaterThan(0, $authorCount, 'Aucun auteur en base');
        $this->assertGreaterThan(0, $editorCount, 'Aucun éditeur en base');
    }
}
