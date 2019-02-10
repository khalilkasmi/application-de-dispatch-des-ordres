<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FicheordresTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FicheordresTable Test Case
 */
class FicheordresTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FicheordresTable
     */
    public $Ficheordres;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ficheordres'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Ficheordres') ? [] : ['className' => 'App\Model\Table\FicheordresTable'];
        $this->Ficheordres = TableRegistry::get('Ficheordres', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Ficheordres);

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
