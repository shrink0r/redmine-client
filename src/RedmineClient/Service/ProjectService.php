<?php

namespace RedmineClient\Service;

use RedmineClient\Http\GetRequest;
use RedmineClient\Model\Project;

class ProjectService extends BaseService
{
    const URL_PATH = 'projects.json';

    public function getAll()
    {
        $projects = array();
        $data = $this->cachedInvoke(array($this, 'fetchProjects'));
        
        foreach ($data['projects'] as $projectData)
        {
            $projects[] = Project::create($projectData);
        }

        return $projects;
    }

    protected function fetchProjects()
    {
        $cfg = $this->getConfig();

        $request = new GetRequest();
        $request->addHeader('Content-Type: application/json');
        $request->addCurlOption(CURLOPT_USERPWD, sprintf('%s:%s', 
            $cfg->getAuthUser(), 
            $cfg->getAuthPass()
        ));

        $request->send($cfg->getBaseUrl() . self::URL_PATH);
        $response = $request->getResponse();

        return json_decode($response->getRawData(), TRUE);
    }
}
