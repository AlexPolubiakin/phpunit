<?php
/**
 * My test namespace
 * 
 * @category Some_Test
 * @package  Test_Package
 * @author   Alex Polubiakin <alpolubnev@gmail.com>
 * @license  No license
 * @link
 */
namespace App\Classes;
/**
 * My test Class
 * 
 * @category Some_Test
 * @package  Test_Package
 * @author   Alex Polubiakin <alpolubnev@gmail.com>
 * @license  No license
 * @link
 */
class MyClass
{
    protected $name;
    protected $age;
    protected $skills;
    protected $phone;
    
    /**
     * Set Name function
     * 
     * @param mixed $name введите случайное имя 
     */
    public function setName($name)
    {
        $this->name = $name;
    }
    /**
     * Get Name function
     * 
     * @return string name
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * Set age function
     * 
     * @param mixed $param введите возраст
     */
    public function setAge($param)
    {
        $this->age = $param;
    }
    /**
     * Get Age function
     * 
     * @return string age
     */
    public function getAge()
    {
        return $this->age;
    }
    /**
     * Check valid Age
     * 
     * @return bool
     */
    public function checkAge()
    {
        if ($this->age < 18) {
            return false;
        }
        return true;
    }
    /**
     * Set Skills
     * 
     * @param bool $param наличие умений true/false
     */
    public function setSkills(bool $param)
    {
        $this->skills = $param;
    }
    /**
     * Check valid Age
     * 
     * @return bool
     */
    public function getSkills()
    {
        return $this->skills;
    }
    /**
     * Check valid Age
     * 
     * @return array return array of name,age,skills
     */
    public function getFullData()
    {
        return [
            'name' => $this->name,
            'age' => $this->age,
            'special_skills' => $this->skills
        ];
    }
    /**
     * Set Phone
     * 
     * @param string $phone телефон
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }
    /**
     * Get Phone function
     * 
     * @return string $phone
     */
    public function getPhone()
    {
        return $this->phone;
    }
    /**
     * Check Phone length
     * 
     * @return bool возравщает true/false в зависимости от количества символов
     */
    public function checkPhoneLength()
    {
        if (strlen($this->phone) == 11) {
            return true;
        }
        return false;
    }

}

