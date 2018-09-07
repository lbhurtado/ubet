<?php
/**
 * Created by PhpStorm.
 * User: lester
 * Date: 03/09/2018
 * Time: 4:03 PM
 */

namespace App\Generators;

class Identifier
{

    protected $cache;

    public static function getSqlAlgorithm()
    {
        $sqlAlgorithm = "sha2(concat(users.id, '?'),256)";

        return  str_replace('?', config('app.key'), $sqlAlgorithm);
    }

    public function generate($id)
    {
        if ($this->inCache($id)) {
            return $this->fromCache($id);
        }

        return $this->addToCache(
            $id, hash('sha256', $id . config('app.key'))
        );

    }

    public function addToCache($key, $value)
    {
        $this->cache[$key] = $value;

        return $value;
    }

    public function inCache($key)
    {
        return isset($this->cache[$key]);
    }

    public function fromCache($key)
    {
        return $this->cache[$key];
    }
}