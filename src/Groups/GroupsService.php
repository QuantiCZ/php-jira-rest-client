<?php

namespace JiraRestApi\Groups;

/**
 * Class to perform search in groups.
 */
class GroupsService extends \JiraRestApi\JiraClient
{
    private $uri = '/groups';

    /**
     * Function to find group.
     *
     * @param array $paramArray Possible values for $paramArray 'query', 'exclude', 'maxResults', 'userName'.
     *
     * @throws \JiraRestApi\JiraException
     * @throws \JsonMapper_Exception
     *
     * @return Group|object
     */
    public function get($paramArray)
    {
        $queryParam = '?'.http_build_query($paramArray);

        $ret = $this->exec($this->uri.'/picker'.$queryParam, null);

        $this->log->info("Result=\n".$ret);

        $groups = $this->json_mapper->mapArray(
            json_decode($ret, false)->groups,
            new \ArrayObject(),
            '\JiraRestApi\Groups\GroupsResult'
        );

        return $groups;
     }
}
