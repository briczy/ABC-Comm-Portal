<?php
require_once 'User.php';
class UserTest extends PHPUnit_Framework_TestCase
{
    public function test__construct()
    {
        $hw = new User("a","a","a","a","1",false,false);
        $this->assertInstanceOf('User', $hw);
    }
    public function testusername()
    {
        $hw = new User("a","a","a","a","1",false,false);
        $hw->setusername("monkey");
        $string=$hw->returnusername();
        $this->assertEquals("monkey", $string);
    }
    
    public function testfullname()
    {
        $hw = new User("a","a","a","a","1",false,false);
        $hw->setfullname("monkey");
        $string=$hw->returnfullname();
        $this->assertEquals("monkey", $string);
    }
    
    public function testpassword()
    {
        $hw = new User("a","a","a","a","1",false,false);
        $hw->setpassword("monkey");
        $string=$hw->returnpassword();
        $this->assertEquals("monkey", $string);
    }
    
    public function testemail()
    {
        $hw = new User("a","a","a","a","1",false,false);
        $hw->setemail("monkey@gmail.com");
        $string=$hw->returnemail();
        $this->assertEquals("monkey@gmail.com", $string);
    }
}
?>
