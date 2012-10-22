<?php

namespace RedmineClient\Test\Model;

use RedmineClient\Model\User;

class UserTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider provideUserData
     */
    public function testCreate(array $data)
    {
        $user = User::create($data);

        $this->assertInstanceOf('RedmineClient\Model\User', $user);
    }

    /**
     * @dataProvider provideUserData
     */
    public function testGetters(array $data)
    {
        $user = User::create($data);

        $this->assertEquals($data['login'], $user->getLogin());
        $this->assertEquals($data['firstname'], $user->getFirstname());
        $this->assertEquals($data['lastname'], $user->getLastname());
        $this->assertEquals($data['password'], $user->getPassword());
        $this->assertEquals($data['mail'], $user->getMail());
        $this->assertEquals($data['auth_source_id'], $user->getAuthSourceId());
    }

    /**
     * @codeCoverageIgnore
     */
    public static function provideUserData()
    {
        // same structure as provided from redmine
        $data = array(
            'login' => 'superman',
            'firstname' => 'clark',
            'lastname' => 'kent',
            'password' => 'LoisLane',
            'mail' => 'super@man.org',
            'auth_source_id' => 2
        );

        $rows = array();
        $rows[] = array($data);

        return $rows;
    }
}
