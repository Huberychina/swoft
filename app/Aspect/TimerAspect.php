<?php declare(strict_types=1);
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://swoft.org/docs
 * @contact  group@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace App\Aspect;

use App\Http\Controller\HomeController;
use Swoft\Aop\Annotation\Mapping\After;
use Swoft\Aop\Annotation\Mapping\AfterReturning;
use Swoft\Aop\Annotation\Mapping\AfterThrowing;
use Swoft\Aop\Annotation\Mapping\Around;
use Swoft\Aop\Annotation\Mapping\Aspect;
use Swoft\Aop\Annotation\Mapping\Before;
use Swoft\Aop\Annotation\Mapping\PointBean;
use Swoft\Aop\Point\JoinPoint;
use Swoft\Aop\Point\ProceedingJoinPoint;
use Swoft\Validator\Annotation\Mapping\Enum;

/**
 * Class AnnotationAspect
 * @Aspect()
 *  @PointBean(
 *     include={HomeController::class}
 * )
 * @since 2.0
 */
class TimerAspect
{
    protected $start_time;
    /**
     * @Before()
     */
    public function before($id)
    {
        $this->start_time=microtime(true);
    }

    /**
     * @After()
     * @param JoinPoint $joinPoint
     */
    public function after(JoinPoint $joinPoint,$id)
    {
        $method = $joinPoint->getMethod();
        $after = microtime(true);
        $runtime = ($after - $this->start_time) * 1000;
        echo "{$method} 方法，本次执行时间为: {$runtime}ms\n";
    }


}
