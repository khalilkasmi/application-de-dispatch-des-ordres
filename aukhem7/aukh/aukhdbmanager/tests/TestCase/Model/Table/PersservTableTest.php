<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PersservTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PersservTable Test Case
 */
class PersservTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PersservTable
     */
    public $Persserv;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.persserv'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Persserv') ? [] : ['className' => 'App\Model\Table\PersservTable'];
        $this->Persserv = TableRegistry::get('Persserv', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Persserv);

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
