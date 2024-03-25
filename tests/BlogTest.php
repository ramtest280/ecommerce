<?php

namespace App\Tests;

use Symfony\Component\Panther\PantherTestCase;

class BlogTest extends PantherTestCase
{
    public function testSomething(): void
    {
        $client = static::createPantherClient();
        $crawler = $client->request('GET', '/');

        $this->assertSelectorTextContains('h1', 'Hello World');
        // $this->assertSelectorAttributeContains('h2');
    }
}
