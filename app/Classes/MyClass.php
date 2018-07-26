<?php

namespace App\Classes;

class MyClass
{
    protected $name;
    protected $age;
    protected $skills;
    

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setAge($param)
    {
        $this->age = $param;
    }
    
    public function getAge()
    {
        return $this->age;
    }

    public function checkAge()
    {
        if($this->age < 18) {
            return false;
        }
        return true;
    }

    public function setSkills(bool $param)
    {
        $this->skills = $param;
    }

    public function getSkills()
    {
        return $this->skills;
    }
    public function getFullData()
    {
        return [
            'name' => $this->name,
            'age' => $this->age,
            'special_skills' => $this->skills
        ];
    }
}