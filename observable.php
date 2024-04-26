<?php
abstract class Observable {

  private $observers = array();

  public function addObserver(Observer $observer) {
         array_push($this->observers, $observer);
  }

  public function notifyObservers() {
         for ($i = 0; $i < count($this->observers); $i++) {
                 $widget = $this->observers[$i];
                 $widget->update($this);
         }
     }
}


class DataSource extends Observable {

  private $names;
  private $points;
  public $circuits = ["Qatar",
    "Portugal",
    "Americas",
    "France",
    "Catalunya",
    "Italy"];


  function __construct() {
         $this->names = array();
         $this->points = array();
  }

  public function addRecord($name, $point) {
         array_push($this->names, $name);
         array_push($this->points, $point);
         $this->notifyObservers();
  }

  public function getData() {
         return array($this->names, $this->points, $this->circuits);
  }
}
?>
