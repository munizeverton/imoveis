<?php
/**
 * Created by PhpStorm.
 * User: Everton
 * Date: 09/04/2016
 * Time: 23:11
 */

namespace Services;

use App\Models\Imovel;
use App\Services\ImagemService;
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

    }

    protected function getGenericImovelArray()
    {
        return [
            'valor_aluguel' => 500,
            'endereco' => 'Av Rio Branco, 789',
            'cidade' => 'Rio de Janeiro',
            'estado' => 'RJ',
            'cep' => '12456-456',
            'descricao' => 'Fake imovel',
            'url_imagem' => 'http://generic.img.com/imovel.jpg',
        ];
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
        $this->imovelService = new ImovelService(new ImagemService());
    }

    public function testGetList()
    {
        $imoveis = $this->imovelService->getList();
        $this->assertCount(20, $imoveis);
    }

    public function testGet()
    {
        $imovel = $this->imovelService->get(3);
        $this->assertInstanceOf(Imovel::class, $imovel);
    }

    public function testCreate()
    {
        $arrayImovel = $this->getGenericImovelArray();
        $this->imovelService->create($arrayImovel);

        $this->assertCount(21, $this->imovelService->getList());
    }

    public function testUpdate()
    {
        $arrayImovel = $this->getGenericImovelArray();
        $this->imovelService->update(15, $arrayImovel);

        $imovel = $this->imovelService->get(15);
        $this->assertEquals($arrayImovel['endereco'], $imovel->endereco);
    }

    public function testDelete()
    {
        $this->imovelService->delete(12);
        $imoveis = $this->imovelService->getList();
        $this->assertCount(19, $imoveis);
    }
}