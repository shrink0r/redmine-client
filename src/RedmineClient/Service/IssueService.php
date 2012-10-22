<?php

namespace RedmineClient\Service;

use RedmineClient\Http\GetRequest;
use RedmineClient\Model\Issue;

class IssueService extends BaseService
{
    const URL_PATH = 'issues.json';

    public function getAll()
    {
        $issues = array();
        $data = $this->callAgainstCache(array($this, 'fetchIssues'));
        
        foreach ($data['issues'] as $issueData)
        {
            $issues[] = Issue::create($issueData);
        }

        return $issues;
    }

    protected function fetchIssues()
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
