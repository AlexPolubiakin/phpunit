<?php
/**
 * Some test class
 * 
 * @category Tests
 * @package  Some_Tests
 * 
 */
class MyTestClass extends PHPUnit\Framework\TestCase
{   
    /**
     * Short description
     * 
     * @test   элементарная проверка
     * @return results of test
     */
public function testGetName()
{
    $test1 = new \App\Classes\MyClass;
    $test1->setName('Bob');
    $test1->setAge(30);
    $test1->setSkills(false);
    $this->assertEquals($test1->getName(), 'Bob');    
    $this->assertEquals($test1->getAge(), 30);  
    $this->assertEquals($test1->getSkills(), false);     
}
    /**
     * @test проверка заполненных данных
     */
    public function checkProperties()
    {
        $test1 = new \App\Classes\MyClass;
        $test1->setName('Bob');
        $test1->setAge(30);
        $test1->setSkills(false);
        $this->assertNotEmpty($test1->getfullData());
        $this->assertArrayHasKey('name', $test1->getfullData());
        $this->assertArrayHasKey('age', $test1->getfullData());
        $this->assertArrayHasKey('special_skills', $test1->getfullData());  
    }
  
    /**
     * @test проверка на умения
     */
     public function skillsTest()
     {
        $test1 = new \App\Classes\MyClass;
        $test1->setName('Bob');
        $test1->setAge(30);
        $test1->setSkills(false);

        $this->assertFalse($test1->getSkills());
     }
    /**
     * @test проверка на возраст
     */
    public function checkAge()
    {
        $test1 = new \App\Classes\MyClass;
        $test1->setAge(25);
        $this->assertTrue($test1->checkAge());
    }

    /**
     * @test проверка телефона 
     */

     public function checkPhone()
     {
         $test1 = new \App\Classes\MyClass;
         $test1->setPhone('71234567890');
         $this->assertNotEmpty($test1->getPhone());
         $this->assertTrue($test1->checkPhoneLength());
     }
    

    } 