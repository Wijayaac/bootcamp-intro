<?php

class RelativeMass extends MassIndex
{

    public function calculate(float $height, float $waistSize, string $gender): void
    {
        $calculateRFM = 0;
        if ($gender === "m") {
            $calculateRFM = 64 - (20 * ($height / $waistSize));
        } else {
            $calculateRFM = 76 - (20 * ($height / $waistSize));
        }

        $this->score = $calculateRFM;
        $this->category = $this->detemineCategory($gender);
    }
    public function detemineCategory(string $gender): string
    {
        $categoryStatus = "";
        if ($gender === "f") {
            switch ($this->score) {
                case $this->score >= 32:
                    $categoryStatus = "Obese";
                    break;
                case $this->score >= 10 && $this->score <= 13:
                    $categoryStatus = "Essential fat";
                    break;
                case $this->score >= 14 && $this->score <= 20:
                    $categoryStatus = "Atheletes";
                    break;
                case $this->score >= 21 && $this->score <= 24:
                    $categoryStatus = "Fitness";
                    break;
                case $this->score >= 25 && $this->score <= 31:
                    $categoryStatus = "Average";
                    break;
            }
        } else {
            switch ($this->score) {
                case $this->score >= 25:
                    $categoryStatus = "Obese";
                    break;
                case $this->score >= 2 && $this->score <= 5:
                    $categoryStatus = "Essential fat";
                    break;
                case $this->score >= 6 && $this->score <= 13:
                    $categoryStatus = "Atheletes";
                    break;
                case $this->score >= 14 && $this->score <= 17:
                    $categoryStatus = "Fitness";
                    break;
                case $this->score >= 18 && $this->score <= 24:
                    $categoryStatus = "Average";
                    break;
            }
        }

        return $categoryStatus;
    }
}
