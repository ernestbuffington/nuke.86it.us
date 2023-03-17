<?php
/**
 * Zend Framework Modified for PHP-Nuke
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://framework.zend.com/license/new-bsd
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@zend.com so we can send you a copy immediately.
 *
 * @category   Zend (zf1 Future) for PHP-Nuke
 * @package    Zend_XmlRpc
 * @subpackage Value
 * @copyright  Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 * @version    $Id$
 */


/**
 * Zend_XmlRpc_Value_Scalar
 */
require_once NUKE_ZEND_DIR.'XmlRpc/Value/Scalar.php';


/**
 * @category   Zend (zf1 Future) for PHP-Nuke
 * @package    Zend_XmlRpc
 * @subpackage Value
 * @copyright  Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class Zend_XmlRpc_Value_Double extends Zend_XmlRpc_Value_Scalar
{

    /**
     * Set the value of a double native type
     *
     * @param float $value
     */
    public function __construct($value)
    {
        $this->_type = self::XMLRPC_TYPE_DOUBLE;
        $precision = (int)ini_get('precision');
        $formatString = '%1.' . $precision . 'F';
        $this->_value = rtrim(sprintf($formatString, (float)$value), '0');
    }

    /**
     * Return the value of this object, convert the XML-RPC native double value into a PHP float
     *
     * @return float
     */
    public function getValue()
    {
        return (float)$this->_value;
    }
}
