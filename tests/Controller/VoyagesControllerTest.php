<?php
namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

/**
 * Description of VoyagesControllerTest
 *
 * @author Ethan MÉNAGÉ [ethanmng.pro@gmail.com]
 */
class VoyagesControllerTest extends WebTestCase {
    
    public function testAccesPage() {
        $client = static::createClient();
        $client->request('GET', '/voyages');
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
    }
    
    public function testContenuPage() {
        $client = static::createClient();
        $crawler = $client->request('GET', '/voyages');
        $this->assertSelectorTextContains('h1', 'Mes voyages');
        $this->assertSelectorTextContains('th', 'Ville');
        $this->assertCount(4, $crawler->filter('th'));
        $this->assertSelectorTextContains('h5', 'Corbigny');
    }
    
    public function testLinkVille() {
        $client = static::createClient();
        $client->request('GET', '/voyages');
        $client->clickLink('Corbigny');
        $response = $client->getResponse();
        
        #dd($client->getRequest());
        
        $this->assertEquals(Response::HTTP_OK, $response->getStatusCode());
        $uri = $client->getRequest()->server->get("REQUEST_URI");
        $this->assertEquals('/voyages/voyage/102', $uri);
    }
    
    public function testFiltreVille() {
        $client = static::createClient();
        $client->request('GET', '/voyages');
        $crawler = $client->submitForm('Filtrer', [
            'recherche' => 'Corbigny'
        ]);
        $this->assertCount(1, $crawler->filter('h5'));
        $this->assertSelectorTextContains('h5', 'Corbigny');
    }
    
}
