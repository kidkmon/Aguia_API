<?php
namespace ApiMaster\Controller;

use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerBuilder;
use Silex\Application;
use Symfony\Component\HttpFoundation\Response;

class MultaController
{
    private $app;

    /**
     * MultaController constructor.
     * @param Application $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function index()
    {
        $multas = $this->app['orm.em']
                      ->getRepository("ApiMaster\Model\Multa")
                      ->findAll();

        $multas = SerializerBuilder::create()->build()
                                    ->serialize($multas, 'json');
        
        return new Response($multas, 200);
    }
    
    public function getMulta($id)
    {
        $id = (int) $id;

        $multas = $this->app['orm.em']
                      ->getRepository("ApiMaster\Model\Multa")
                      ->find($id);

        $multas = SerializerBuilder::create()->build()
                                    ->serialize($multas, 'json', SerializationContext::create()->setGroups(array('list')));
        
        return new Response($multas, 200);
    }

     public function create()
    {
        $data = file_get_contents("php://input");
        $data = json_decode($data);
        $data = (array) $data;

        $multa = new \ApiMaster\Model\Multa();

        list($type, $dataImg) = explode(';', $data['img']);
        list(, $dataImg)      = explode(',', $dataImg);
        $dataImg = base64_decode($dataImg);

        $ext = $type == 'data:image/png' ? '.png' : '.jpg';
        
        $newName = uniqid() . microtime() . $ext;

        file_put_contents(UPLOAD_FOLDER . $newName, $dataImg);

        $multa->setDescricaoMulta($data['descricao_multa'])
             ->setPlacaVeiculo($data['placa_veiculo_multa'])
             ->setStatusMulta($data['status_multa'])
             ->setImg($newName)
             ->setCreatedAt(new \DateTime('now', new \DateTimeZone("America/Manaus")))
             ->setUpdatedAt(new \DateTime('now', new \DateTimeZone("America/Manaus")));
        
        $orm = $this->app['orm.em'];
        $orm->persist($multa);
        $orm->flush();
        return json_encode(['msg'=>'Multa Criada com Sucesso!']);
    }

}