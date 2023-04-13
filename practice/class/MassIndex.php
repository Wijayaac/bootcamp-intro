<?php

class MassIndex
{
    protected float $score = 0;
    protected string $category = "";

    public function getScore(): float
    {
        return $this->score;
    }
    public function getCategory(): string
    {
        return $this->category;
    }
}
