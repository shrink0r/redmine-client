<?php

namespace RedmineClient\Service;

use RedmineClient\Http\GetRequest;
use RedmineClient\Model\User;

class UserService extends BaseService
{
    const URL_PATH = 'users.json';

    public function getAll()
    {
        $users = array();
        $data = $this->callAgainstCache(array($this, 'fetchUsers'), array(), TRUE);
        
        foreach ($data['users'] as $userData)
        {
            $users[] = User::create($userData);
        }

        return $users;
    }

    protected function fetchUsers()
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
