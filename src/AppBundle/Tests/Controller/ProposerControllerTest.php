<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ProposerControllerTest extends WebTestCase
{
    public function testAddtrajet()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/AddTrajet');
    }

}
