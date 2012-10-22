<?php

namespace RedmineClient\Test\Model;

use RedmineClient\Model\Issue;

class IssueTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider provideIssueData
     */
    public function testCreate(array $data)
    {
        $issue = Issue::create($data);

        $this->assertInstanceOf('RedmineClient\Model\Issue', $issue);
    }

    /**
     * @dataProvider provideIssueData
     */
    public function testGetters(array $data)
    {
        $issue = Issue::create($data);

        $this->assertEquals($data['done_ratio'], $issue->getDoneRatio());
        $this->assertEquals($data['status'], $issue->getStatus());
        $this->assertEquals($data['description'], $issue->getDescription());
        $this->assertEquals($data['created_on'], $issue->getCreatedOn());
        $this->assertEquals($data['subject'], $issue->getSubject());
        $this->assertEquals($data['author'], $issue->getAuthor());
        $this->assertEquals($data['start_date'], $issue->getStartDate());
        $this->assertEquals($data['updated_on'], $issue->getUpdatedOn());
        $this->assertEquals($data['assigned_to'], $issue->getAssignedTo());
        $this->assertEquals($data['tracker'], $issue->getTracker());
        $this->assertEquals($data['project'], $issue->getProject());
        $this->assertEquals($data['id'], $issue->getId());
        $this->assertEquals($data['priority'], $issue->getPriority());
    }

    /**
     * @codeCoverageIgnore
     */
    public static function provideIssueData()
    {
        // same structure as provided from redmine
        $data = array(
            'done_ratio' => 0,
            'status' => array('name' => 'neu', 'id' => 1),
            'description' => 'This is a test issue description.',
            'created_on' => '2012/10/19 16:01:09 +0200',
            'subject' => 'This is a test issue subject',
            'author' => array('name' => 'clark-kent', 'id' => 3),
            'start_date' => '2012/10/19',
            'updated_on' => '2012/10/19 16:02:43 +0200',
            'assigned_to' => array('name' => 'Lois Lane', 'id' => 2),
            'tracker' => array('name' => 'Ticket', 'id' => 1),
            'project' => array('name' => 'Test Project', 'id' => 169),
            'id' => 9365,
            'priority' => array('name' => 'Normal','id' => 4)
        );

        $rows = array();
        $rows[] = array($data);

        return $rows;
    }
}
