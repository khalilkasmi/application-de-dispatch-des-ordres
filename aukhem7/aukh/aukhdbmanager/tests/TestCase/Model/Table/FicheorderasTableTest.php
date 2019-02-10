<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FicheorderasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FicheorderasTable Test Case
 */
class FicheorderasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FicheorderasTable
     */
    public $Ficheorderas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ficheorderas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Ficheorderas') ? [] : ['className' => 'App\Model\Table\FicheorderasTable'];
        $this->Ficheorderas = TableRegistry::get('Ficheorderas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Ficheorderas);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
