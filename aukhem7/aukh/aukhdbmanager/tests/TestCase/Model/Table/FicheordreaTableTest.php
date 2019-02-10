<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FicheordreaTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FicheordreaTable Test Case
 */
class FicheordreaTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FicheordreaTable
     */
    public $Ficheordrea;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ficheordrea'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Ficheordrea') ? [] : ['className' => 'App\Model\Table\FicheordreaTable'];
        $this->Ficheordrea = TableRegistry::get('Ficheordrea', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Ficheordrea);

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
