<?php

namespace RedmineClient\Test\Model;

use RedmineClient\Model\Project;

class ProjectTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider provideProjectData
     */
    public function testCreate(array $data)
    {
        $project = Project::create($data);

        $this->assertInstanceOf('RedmineClient\Model\Project', $project);
    }

    /**
     * @dataProvider provideProjectData
     */
    public function testGetters(array $data)
    {
        $project = Project::create($data);

        $this->assertEquals($data['identifier'], $project->getIdentifier());
        $this->assertEquals($data['description'], $project->getDescription());
        $this->assertEquals($data['created_on'], $project->getCreatedOn());
        $this->assertEquals($data['updated_on'], $project->getUpdatedOn());
        $this->assertEquals($data['parent'], $project->getParent());
        $this->assertEquals($data['name'], $project->getName());
        $this->assertEquals($data['id'], $project->getId());
    }

    /**
     * @codeCoverageIgnore
     */
    public static function provideProjectData()
    {
        $data = array(
            'identifier' => 'test-project',
            'description' => 'Some text describing our test project.',
            'created_on' => '2012/09/28 10:53:50 +0200',
            'parent' => array(
                'name' => 'parent-project',
                'id' => 5,
            ),
            'updated_on' => '2012/09/28 10:53:50 +0200',
            'name' => 'Test Project',
            'id' => 23
        );

        $rows = array();
        $rows[] = array($data);

        return $rows;
    }
}
