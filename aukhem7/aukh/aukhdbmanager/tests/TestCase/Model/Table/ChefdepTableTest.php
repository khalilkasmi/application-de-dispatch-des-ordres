<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ChefdepTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ChefdepTable Test Case
 */
class ChefdepTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ChefdepTable
     */
    public $Chefdep;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.chefdep'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Chefdep') ? [] : ['className' => 'App\Model\Table\ChefdepTable'];
        $this->Chefdep = TableRegistry::get('Chefdep', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Chefdep);

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
