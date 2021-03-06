<?php

namespace Phpfox\Framework\Mysqli;

use Phpfox\Framework\Db\SqlResultInterface;

/**
 * Class MysqliSqlResult
 *
 * @package Phpfox\Framework\Mysqli
 */
class MysqliSqlResult implements SqlResultInterface
{

    /**
     * @var mixed
     */
    private $resource;

    public function __construct($resource)
    {
        $this->resource = $resource;
    }

    public function isValid()
    {
        return $this->resource !== false;
    }


    public function fetch()
    {
        $result = [];

        while (null != ($object = $this->resource->fetch_object())) {
            $result[] = $object;
        }

        return $result;
    }
}