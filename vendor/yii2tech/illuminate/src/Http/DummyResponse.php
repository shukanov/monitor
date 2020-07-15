<?php
/**
 * @link https://github.com/yii2tech
 * @copyright Copyright (c) 2015 Yii2tech
 * @license [New BSD License](http://www.opensource.org/licenses/bsd-license.php)
 */

namespace Yii2tech\Illuminate\Http;

use Illuminate\Http\Response;

/**
 * DummyResponse is special HTTP response, which does not send anything back to the client.
 *
 * This class is used to spoof Laravel regular response processing for the cases, when response is already sent by Yii.
 *
 * @see YiiApplicationMiddleware
 *
 * @author Paul Klimov <klimov.paul@gmail.com>
 * @since 1.0
 */
class DummyResponse extends Response
{
    /**
     * {@inheritdoc}
     */
    public function send()
    {
        return $this;
    }
}
