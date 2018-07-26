<?php

class MyTestClass extends PHPUnit\Framework\TestCase
{   
    /**
     * @test проверка на одинаковые значения
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
     * @test проверка ключей
     */
    public function checkProperty()
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
     * @test 
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
     * @test равен или не равен
     */


  

    /**
     * @test проверка корректных типов данных имя фамилия возраст наличие водительских прав
     */
}