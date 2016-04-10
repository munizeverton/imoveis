<?php
/**
 * Created by PhpStorm.
 * User: Everton
 * Date: 09/04/2016
 * Time: 23:11
 */

namespace Services;

use App\Services\ImovelService;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Artisan;

class ImovelServiceTest extends \TestCase
{
    use DatabaseMigrations;
    private $imovelService;
    protected static $db_inited = false;
    protected static function initDB()
    {
        echo "\n---initDB---\n"; // proof it only runs once per test TestCase class
        Artisan::call('db:seed');
        // ...more db init stuff, like seeding etc.
    }
    public function setUp()
    {
        parent::setUp();
        if (!static::$db_inited) {
            static::$db_inited = true;
            static::initDB();
        }
    }
    public function __construct()
    {
        parent::__construct();
        $this->imovelService = new ImovelService();
    }

    public function testGetList()
    {
        $imoveis = $this->imovelService->getList();
        $this->assertCount(20, $imoveis);
    }
}