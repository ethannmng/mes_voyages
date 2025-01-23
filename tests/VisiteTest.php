<?php
namespace App\Tests;

use App\Entity\Visite;
use DateTime;
use PHPUnit\Framework\TestCase;

/**
 * Description of VisiteTest
 *
 * @author Ethan MÉNAGÉ [ethanmng.pro@gmail.com]
 */
class VisiteTest extends TestCase {
    
    public function testGetDatecreationString() {
        $visite = new Visite();
        $visite->setDatecreation(new DateTime("2025-01-23"));
        $this->assertEquals("23/01/2025", $visite->getDatecreationString());
    }
    
}
