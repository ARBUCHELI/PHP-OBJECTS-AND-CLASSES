<?php

class StringUtils
{
  public static function secondCase($string) {
    if(strlen($string) > 1) {
      $string = strtolower($string);
      $string[1] = strtoupper($string[1]);
      return $string;
    } else if(strlen($string) === 1) {
        return strtolower($string);
    } else if(strlen($string) < 1) {
      return "";
    }  
  }
}

class Pajamas {
  private $owner, $fit, $color;
  function __construct(
    $owner = "unclaimed",
    $fit = "fine",
    $color = "white"
    ) {
      $this->owner = StringUtils::secondCase($owner);
      $this->fit = $fit;
      $this->color = $color;
    }

    public function describe() {
      return "$this->owner's $this->color pajamas fit $this->fit.";
    }

    public function setFit($new_fit) {
      $this->fit = $new_fit;
    }
}

$chicken_PJs = new Pajamas("CHICKEN", "M", "black");

echo $chicken_PJs->describe();
echo "\n";
echo "\n";
$chicken_PJs->setFit("S");

echo $chicken_PJs->describe();
echo "\n";
echo "\n";

class ButtonablePajamas extends Pajamas
{
  private $button_state = "unbuttoned";

  public function describe() {
    return parent::describe() . " They also have buttons which are currently $this->button_state.";
  }

  public function toggleButtons() {
    if ($this->button_state === "unbuttoned") {
      $this->button_state = "buttoned";
    } else {
      $this->button_state = "unbuttoned";
    }
    }
}

$moose_PJs = new ButtonablePajamas("moose", "L", "red");

echo $moose_PJs->describe();
echo "\n";
$moose_PJs->toggleButtons();
echo "\n";
echo $moose_PJs->describe();