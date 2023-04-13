<?php

class BodyMassIndex
{
    public float $score = 0;
    public string $category = "";

    public function calculate(int $height, int $weight): void
    {
        $calculateBMI  = $weight / (pow($height, 2));

        $this->score = $calculateBMI;
    }

    public function detemineCategory(): string
    {
        $categoryStatus = "";
        switch ($this->score) {
            case $this->score < 16:
                $categoryStatus = "Underweight (Severe thinness)";
                break;
            case $this->score <= 16.0 && $this->score >= 16.9:
                $categoryStatus = "Underweight (Moderate thinness)";
                break;
            case $this->score <= 17.0 && $this->score >= 18.4:
                $categoryStatus = "Underweight (Severe thinness)";
                break;
            case $this->score <= 18.5 && $this->score >= 24.9:
                $categoryStatus = "Underweight (Severe thinness)";
                break;
            case $this->score <= 25.0 && $this->score >= 29.9:
                $categoryStatus = "Underweight (Severe thinness)";
                break;
            case $this->score <= 30.0 && $this->score >= 34.9:
                $categoryStatus = "Underweight (Severe thinness)";
                break;
            case $this->score <= 35.0 && $this->score >= 39.9:
                $categoryStatus = "Underweight (Severe thinness)";
                break;
            case $this->score >= 40.0:
                $categoryStatus = "Underweight (Severe thinness)";
                break;
        }
        return $categoryStatus;
    }
}
