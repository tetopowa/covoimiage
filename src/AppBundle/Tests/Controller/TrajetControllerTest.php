<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TrajetControllerTest extends WebTestCase
{
    public function testLoadtrajet()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/LoadTrajet');
    }

}
