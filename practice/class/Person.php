<?php

class Person
{
    public string $name  = "";
    public string $gender  = "m";
    public int $age = 12;
    public float $height = 0;
    public float $weight = 0;
    public float $waistSize = 0;

    public function __construct(string $name, string $age, string $gender)
    {
        $this->name = $name;
        $this->age = $age;
        $this->gender = $gender;
    }

    public function bodyFact(float $height, float $weight, float $waistSize)
    {
        $this->height = $height;
        $this->weight = $weight;
        $this->waistSize = $waistSize;
    }
}
