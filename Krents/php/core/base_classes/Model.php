<?php
/**
 * Created by PhpStorm.
 * User: darlane
 * Date: 2/1/18
 * Time: 1:51 PM
 */

namespace Lumisade\Models;


class Model
{
    protected $table;
    protected $fields;
    private $where;
    private $vars;
    private $get;

    public function __construct()
    {
        if ($this->table === null) {
            $child       = new \ReflectionClass(get_class($this));
            $modelName   = strtolower($child->getShortName());
            $this->table = $modelName[strlen($modelName) - 1] === 'y' ? str_replace('y', 'ies', $modelName) : $modelName.'s';
        }
        $this->get  = '*';
        $this->vars = [];
    }


    /**
     * @param array $params
     * @param string $type
     * @return $this
     */
    public function where(array $params, $type = ' and ')
    {
        foreach ($params as $key => $param) {
            $newKey              = $key.'_'.substr(md5($key), 0, 5);
            $this->where         .= ($this->where !== null ? $type : '').$key.'= :'.$newKey;
            $this->vars[$newKey] = $param;
        }
        return $this;
    }

    /**
     * @param array $params
     * @return $this
     */
    public function orWhere(array $params)
    {
        $this->where($params, ' or ');
        return $this;
    }


    /**
     * @param $fields array
     * @return array
     */
    public function get(array $fields)
    {
        $this->get = '';
        foreach ($fields as $field) {
            $this->get .= $field.', ';
        }
        $this->get = substr($this->get, 0, -2);

        return $this->select();
    }

    /**
     * @return $this|null
     */
    public function first()
    {
        $res = $this->select();
        return count($res) === 0 ? null : $res[0];
    }

    /**
     * @return array
     */
    private function select()
    {
        $resArray = [];
        $result   = app()->DB::GetAll(
            'select '.$this->get.' from '.$this->table.' '.($this->where === null ? '' : 'where '.$this->where),
            $this->vars
        );
        /** @var array $data */
        foreach ($result as $data) {
            $model = new $this;
            foreach ($data as $key => $value) {
                if (array_key_exists($key, $this->fields)) {
                    settype($value, $this->fields[$key]);
                }

                $model->$key = $value;
            }
            $resArray[] = $model;
            unset($model);
        }

        return $resArray;
    }


    public function save(){

//        var_dump(get_class_vars(get_class($this)));
        var_dump(get_object_vars($this));
        exit;
    }
}