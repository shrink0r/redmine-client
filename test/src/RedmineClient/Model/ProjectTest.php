<?php

namespace RedmineClient\Test\Model;

use RedmineClient\Model\Project;

class ProjectTest extends \PHPUnit_Framework_TestCase
{
    public function testCreate()
    {
        $project = Project::create(array(
            // @todo provide fixture and assert the creation success against it.
        ));
        $this->assertInstanceOf('RedmineClient\Model\Project', $project);
    }
}
