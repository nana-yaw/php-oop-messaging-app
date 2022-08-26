<?php

use App\Message;
use App\MessageType;
use PHPUnit\Framework\TestCase;
use App\User;
use App\Role;

class MessageTest extends TestCase
{
    private $_student;
    private $_parent;
    private $_teacher;
    private $_teachStudMsg;
    private $_teachParentMsg;
    private $_studTeachMsg;
    private $_parentTeachMsg;
    private $_invalidTextMessage;

    public function setUp(): void
    {
        $this->_student = new User(
            1, 
            "Mark", 
            "Jeans",
            "mark.jeans@gmail.com",
            Role::$STUDENT
        );

        $this->_parent = new User(
            2, 
            "Luke", 
            "Jeans",
            "luke.jeans@gmail.com",
            Role::$PARENT,
            "Mr"
        );

        $this->_teacher = new User(
            3, 
            "Mary", 
            "Thompson",
            "mary.thompson@gmail.com",
            Role::$TEACHER,
            "Miss"
        );

        $this->_invalidUser = new User(
            4, 
            "Jane", 
            "Doe",
            "jane.doegmail",
            Role::$STUDENT,
            "Miss",
            "jane.me"
        );

        $this->_teachStudMsg = new Message(
            $this->_teacher,
            $this->_student,
            "Congratulations! You won the award!",
            MessageType::$SYSTEM
        );

        $this->_teachParentMsg = new Message(
            $this->_teacher,
            $this->_parent,
            "Congratulations! Your ward won an award!",
            MessageType::$MANUAL
        );

        $this->_studTeachMsg = new Message(
            $this->_student,
            $this->_teacher,
            "Thank you! Will do better!",
            MessageType::$MANUAL
        );

        $this->_parentTeachMsg = new Message(
            $this->_parent,
            $this->_teacher,
            "Will be at the PTA meeting!",
            MessageType::$MANUAL
        );

        $this->_invalidTextMessage = new Message(
            $this->_student,
            $this->_teacher,
            "I will be late for class today!",
            MessageType::$SYSTEM
        );
    }

    public function testSystemMessagesFromTeachersToStudentsOnly()
    {
        $this->assertTrue($this->_teachStudMsg->sendTextMessage());
    }

    public function testSystemMessagesFromTeachersToParentsOnly()
    {
        $this->assertFalse($this->_teachParentMsg->sendTextMessage());
    }

    public function testSenderAndReceiverFullName()
    {
        $this->assertEquals(
            "Miss Mary Thompson", 
            $this->_teachStudMsg->getSenderFullName()
        );

        $this->assertEquals(
            "Mark Jeans", 
            $this->_teachStudMsg->getReceiverFullName()
        );
    }

    public function testGetMessageText()
    {
        $this->assertEquals(
            "Thank you! Will do better!", 
            $this->_studTeachMsg->getTextMessage()
        );
    }

    public function testGetTimeOfMessageInHumanReadableFormat()
    {
        $this->assertEquals(
            date('l jS \of F Y h:i:s A', time()), 
            $this->_parentTeachMsg->getCreatedAt()
        );
    }

    public function testMessageSave()
    {
        $this->assertEquals(false, $this->_invalidTextMessage->save());
        $this->assertEquals(true, $this->_teachStudMsg->save());
    }

}