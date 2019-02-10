<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EmployeTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EmployeTable Test Case
 */
class EmployeTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EmployeTable
     */
    public $Employe;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.employe'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Employe') ? [] : ['className' => 'App\Model\Table\EmployeTable'];
        $this->Employe = TableRegistry::get('Employe', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Employe);

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
