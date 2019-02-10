<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FicheorderssTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FicheorderssTable Test Case
 */
class FicheorderssTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FicheorderssTable
     */
    public $Ficheorderss;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ficheorderss'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Ficheorderss') ? [] : ['className' => 'App\Model\Table\FicheorderssTable'];
        $this->Ficheorderss = TableRegistry::get('Ficheorderss', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Ficheorderss);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
