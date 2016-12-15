<?php
/**
 * Created by PhpStorm.
 * User: sandfox
 * Date: 15.12.16
 * Time: 18:44
 */

namespace Dream\DreamApply\Client\Models\Concerns;

trait ObjectLinks
{
    /*
     * To use this trait define
     *
     *  protected $objectLinks = [
     *      'link_name' => ClassName::class,
     *  ];
     */

    protected function resolveObjectLink($client, $url, $name)
    {
        if (array_key_exists($name, $this->objectLinks)) {
            $class = $this->objectLinks[$name];
            return new $class($client, $url);
        }

        return null;
    }
}
