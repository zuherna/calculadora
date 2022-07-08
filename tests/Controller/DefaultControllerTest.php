<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    /**
     * @dataProvider provideUrls
     */
    public function testPageIsSuccessful($url)
    {
        $client = self::createClient();
        $client->request('GET', $url);

        $this->assertTrue($client->getResponse()->isSuccessful());
    }

    public function testPageNotFound(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/sumar/5/6');

        $this->assertResponseIsSuccessful();
    }


    public function provideUrls(): array
    {
        return [
            ['/'],
            ['/add/5/6'],
            ['/subtract/5.5/4'],
            ['/multiply/-5/1'],
            ['/divide/3/0'],
        ];
    }

}
