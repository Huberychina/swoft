<?php
/**
 * Copyright © 链家网（北京）科技有限公司
 * User: jiajia004@ke.com
 * Date: 2020-04-19 23:08
 * Desc:
 */

namespace App\Rpc\Breaker;


use Swoft\Breaker\Annotation\Mapping\Breaker;

/**
 * the breaker of user
 *
 * @Breaker("user")
 */
class UserBreaker
{
    /**
     * The number of successive failures
     * If the arrival, the state switch to open
     *
     * @Value(name="${config.breaker.user.failCount}", env="${USER_BREAKER_FAIL_COUNT}")
     * @var int
     */
    protected $switchToFailCount = 3;
    /**
     * The number of successive successes
     * If the arrival, the state switch to close
     *
     * @Value(name="${config.breaker.user.successCount}", env="${USER_BREAKER_SUCCESS_COUNT}")
     * @var int
     */
    protected $switchToSuccessCount = 3;
    /**
     * Switch close to open delay time
     * The unit is milliseconds
     *
     * @Value(name="${config.breaker.user.delayTime}", env="${USER_BREAKER_DELAY_TIME}")
     * @var int
     */
    protected $delaySwitchTimer = 500;
}
