<?php


namespace JiraRestApi\Groups;


use JiraRestApi\ClassSerialize;

class GroupsResult implements \JsonSerializable
{

    use ClassSerialize;

    /**
     * uri which was hit.
     *
     * @var string
     */
    public $html;

    /**
     * @var string
     */
    public $name;

    /**
     * @var array
     */
    public $labels;


    public function jsonSerialize()
    {
        return array_filter(get_object_vars($this));
    }


}
