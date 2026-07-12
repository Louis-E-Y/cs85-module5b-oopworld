<?php 

class FoodLog {

    public string $foodName;
    public int $calorieCountPerServing;
    public int $proteinCount;
    public int $saturationLevel;
    public int $costPerServing;
    public int $tasteRating;
    public bool $wasGood;

    //standard constructor
    public function __construct(string $foodName, int $calorieCountPerServing, 
            int $proteinCount, int $saturationLevel, int $costPerServing, int $tasteRating, bool $wasGood) {
            $this->foodName = $foodName;
            $this->calorieCountPerServing = $calorieCountPerServing;
            $this->proteinCount = $proteinCount;
            $this->saturationLevel = $saturationLevel;
            $this->costPerServing = $costPerServing;
            $this->tasteRating = $tasteRating;
            $this->wasGood = $wasGood;
        }

    //function to echo back entered info
    public function displayFoodLog() {
            echo "Food Name: " . $this->foodName . "\n";
            echo "Calorie Count Per Serving: " . $this->calorieCountPerServing . "\n";
            echo "Protein Count: " . $this->proteinCount . "\n";
            echo "Saturation Level: " . $this->saturationLevel . "\n";
            echo "Cost Per Serving: $" . $this->costPerServing . "\n";
            echo "Taste Rating: " . $this->tasteRating . "/10\n";
            echo "Was it good? " . ($this->wasGood ? "Yes" : "No") . "\n";


        }
    //function to calculate total calories based on number of servings
    public function calculateTotalCalories(int $numberOfServings): int {
            return $this->calorieCountPerServing * $numberOfServings;
        }
    //function to calculate total cost based on number of servings
    public function calculateTotalCost(int $numberOfServings): int {
        return $this->costPerServing * $numberOfServings;
        }


    //allow user to set whether the food was good or not
    public function setGoodness(bool $wasGood): void {
            $this->wasGood = $wasGood;
        }



    //function with decision logic, checking if calorie count and protein #s are good
    public function isHealthy(): bool {
            return $this->calorieCountPerServing < 300 && $this->proteinCount > 10;
        }

}
?>