<?php

class BodyMassIndex extends MassIndex
{

    public function calculate(int $height, int $weight): void
    {
        if ($height != 0 || $weight != 0) {
            $calculateBMI  = $weight / (pow(($height / 100), 2));
            $this->score = $calculateBMI;
            $this->category = $this->detemineCategory();
        }
    }

    public function detemineCategory(): string
    {
        $categoryStatus = "";
        if ($this->score < 16) {
            $categoryStatus = "Underweight (Severe thinness)";
        } elseif ($this->score >= 16.0 && $this->score <= 16.9) {
            $categoryStatus = "Underweight (Moderate thinness)";
        } elseif ($this->score >= 17.0 && $this->score <= 18.4) {
            $categoryStatus = "Underweight (Mild thinness)";
        } elseif ($this->score >= 18.5 && $this->score <= 24.9) {
            $categoryStatus = "Normal Range";
        } elseif ($this->score >= 25.0 && $this->score <= 29.9) {
            $categoryStatus = "Overweight (Pre-obese)";
        } elseif ($this->score >= 30.0 && $this->score <= 34.9) {
            $categoryStatus = "Obese (Class i)";
        } elseif ($this->score >= 35.0 && $this->score <= 39.9) {
            $categoryStatus = "Obese (Class ii)";
        } else {
            $categoryStatus = "Obese (Class iii)";
        }
        return $categoryStatus;
    }
}
