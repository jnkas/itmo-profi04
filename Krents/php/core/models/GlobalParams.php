<?php
/**
 * Created by PhpStorm.
 * User: darlane
 * Date: 1/18/18
 * Time: 8:37 PM
 */

namespace Lumisade\Models;

/**
 * Class GlobalParams
 * @package Framework
 */
class GlobalParams
{
    /** @var array */
    protected $storage;

    /**
     * GlobalParams constructor.
     * @param array $data
     */
    public function __construct(array &$data)
    {
        $this->storage = &$data;
    }

    /**
     * Get value by key
     * @param $key
     * @return null
     */
    public function get($key)
    {
        return isset($this->storage[$key]) ? $this->storage[$key] : null;
    }


    /**
     * Get all storage
     * @return mixed
     */
    public function all()
    {
        return $this->storage;
    }

    /**
     * Set key at storage
     * @param $key
     * @param $value
     */
    public function set($key, $value)
    {
        $this->storage[$key] = $value;
    }
}