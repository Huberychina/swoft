<?php declare(strict_types=1);
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://swoft.org/docs
 * @contact  group@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace App\Http\Controller;

use App\Common\RpcProvider;
use Swoft;
use Swoft\Http\Message\ContentType;
use Swoft\Http\Message\Response;
use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;
use Swoft\View\Renderer;
use Throwable;
use function context;

/**
 * Class HomeController
 * @Controller()
 */
class HomeController
{
    /**
     * @RequestMapping("/")
     * @throws Throwable
     */
    public function index(): Response
    {
        /** @var Renderer $renderer */
        $renderer = Swoft::getBean('view');
        $content  = $renderer->render('home/index');

        return context()->getResponse()->withContentType(ContentType::HTML)->withContent($content);
    }

    /**
     * @RequestMapping("/hi")
     *
     *
     * @return Response
     */
    public function hi(): Response
    {
        return context()->getResponse()->withContent('hi');

    }

    /**
     * @RequestMapping("/getServices")
     *
     *
     * @return Response
     */
    public function getServices(): Response
    {
        return context()->getResponse()->withContent((new RpcProvider())->getList());

    }

    /**
     * @RequestMapping("/hello[/{name}]")
     * @param string $name
     *
     * @return Response
     */
    public function hello(string $name): Response
    {
        return context()->getResponse()->withContent('Hello' . ($name === '' ? '' : ", {$name}"));
    }

    /**
     * @RequestMapping("/wstest", method={"GET"})
     *
     * @return Response
     * @throws Throwable
     */
    public function wsTest(): Response
    {
        return view('home/ws-test');
    }

    /**
     * @RequestMapping("/testapsect")
     * @param string $name
     * @return Response
     */
    public function testapsect(string $name): Response
    {
        sleep(3);
        return context()->getResponse()->withData(['ok']);
    }
}
