<?php
/**
 * Created by PhpStorm.
 * User: DXing1202 <dxing1202@outlook.com>
 * Date: 2018/11/01
 * Time: 0:29
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
// use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

/**
 * Class LuckyController
 * @package AppBundle\Controller
 * @Route("/post")
 */
class LuckyController extends Controller{

    /**
     * @Route("/{id}",defaults={"page_num":1},requirements={"page_num"="\d+"})
     */
    public function indexAction($page_num){
          // 获取get a的变量值
          // $a = $this->getRequest()->get('a');


//        $method = $this->getRequest()->getMethod();
//        if($method == "POST"){
//
//        }

        return $this->render('lucky/index.html.twig',[
            'name' => $page_num,
        ]);
    }

    # 创建你的第一个Symfony页面
    /**
     * @Route("/lucky/number")
     */
    public function numberAction(){
        $number = rand(0,100);

//        return new Response(
//            '<html><body>Lucky number: '.$number.'</body></html>'
//        );
        // 使用$this->render 渲染模板
        return $this->render('lucky/number.html.twig',[
            'number'=>$number,
        ]);
    }

    # 创建一个JSON响应
    /**
     * @Route("/api/lucky/number")
     */
    public function apiNumberAction(){
        $data = [
            'lucky_number' => rand(0,100)
        ];

//        return new Response(
//            json_encode($data),
//            200,
//            ['Content-Type'=>'application/json']
//        );
        return new JsonResponse($data);
    }

    # controller的介绍

    /**
     * @Route("/num/{id}",name="post_num")
     */
    public function numAction(){

        //$a = $this->getRequest()->get('a');

        //return new RedirectResponse('http://www.imooc.com');

        $a = $this->getRequest()->getSession()->get("c");

        $this->getRequest()->getSession()->getFlashBag()->add(
            'notice',
            'you have something wrong'
        );

        return $this->render('lucky/number.html.twig',[
            'number'=>$a,
        ]);
    }

}