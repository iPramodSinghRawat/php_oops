<?php
/*
Unless you specify otherwise, properties and methods of a class are public.
That is to say, they may be accessed in three possible situations −
- From outside the class in which it is declared
- From within the class in which it is declared
- From within another class that implements the class in which it is declared
*/

class Vehicle{
  private $type;
  private $brand;
  private $engine_capacity; //in cc
  private $power;
  private $torque;
  private $fuel;
  private $fuel_tank_capacity;
  protected $other_details; // can't made private
  protected $mileageData;

  function setType($type_in){
    $this->type=$type_in;
  }
  function getType(){
    return $this->type;
  }

  function setBrand($brand_in){
    $this->brand=$brand_in;
  }
  function getBrand(){
    return $this->brand;
  }

  function setEngineCapacity($engine_capacity_in){
    $this->engine_capacity=$engine_capacity_in;
  }
  function getEngineCapacity(){
    return $this->engine_capacity;
  }

  function setPower($power_in){
    $this->power=$power_in;
  }
  function getPower(){
    return $this->power;
  }

  function setTorque($torque_in){
    $this->torque=$torque_in;
  }
  function getTorque(){
    return $this->torque;
  }

  function setFuel($fuel_in){
    $this->fuel=$fuel_in;
  }
  function getFuel(){
    return $this->fuel;
  }

  function setFuelTankCapacity($fuel_tank_capacity_in){
    $this->fuel_tank_capacity=$fuel_tank_capacity_in;
  }
  function getFuelTankCapacity(){
    return $this->fuel_tank_capacity;
  }

  function setOtherDetails($other_details_in){
    $this->other_details=$other_details_in;
  }
  function getOtherDetails(){
    return $this->other_details;
  }

  /*final keyword, which prevents child classes from overriding a method by prefixing the definition with final.*/
  final public function isTwoStroke() {
      echo " isTwoStroke Engine";
  }

  /*Constructor Functions*/
  function __construct($type_in,$brand_in,$engine_capacity_in,$power_in,$torque_in,
                        $fuel_in,$fuel_tank_capacity_in,$other_details_in) {
    $this->type = $type_in;
    $this->brand= $brand_in;
    $this->engine_capacity = $engine_capacity_in;
    $this->power = $power_in;
    $this->torque = $torque_in;
    $this->fuel = $fuel_in;
    $this->fuel_tank_capacity = $fuel_tank_capacity_in;
    $this->other_details = $other_details_in;
  }

}

/*Inheritance*/
class Bike extends Vehicle{
   private $bike_type;

   function setBikeType($bike_type_in){
     $this->bike_type = $bike_type_in;
   }

  function getBikeType(){
    return $this->bike_type;
  }

  /*Function Overriding*/
  function getOtherDetails(){
    return "OTHER DETAILS ABOUT BIKE: ".$this->other_details;
  }

  public function __construct($type_in,$brand_in,$engine_capacity_in,$power_in,$torque_in,
                        $fuel_in,$fuel_tank_capacity_in,$other_details_in,$bike_type_in){

      parent::__construct($type_in,$brand_in,$engine_capacity_in,$power_in,$torque_in,
                            $fuel_in,$fuel_tank_capacity_in,$other_details_in);

     $this->bike_type = $bike_type_in;

   }

}

/*Interfaces*/
interface SetMileageData{
   public function mileageData($m_data);
}

interface MileageData extends SetMileageData {
    public function getMileageData();
}

class Car extends Vehicle implements MileageData{
   private $car_type;

   function setCarType($car_type_in){
     $this->car_type = $car_type_in;
   }

  function getCarType(){
    return $this->car_type;
  }

  /*Function Overriding*/
  function getOtherDetails(){
    return "OTHER DETAILS ABOUT Car: ".$this->other_details;
  }

  public function __construct($type_in,$brand_in,$engine_capacity_in,$power_in,$torque_in,
                        $fuel_in,$fuel_tank_capacity_in,$other_details_in,$car_type_in){

      /*calling parent Constructor*/
      parent::__construct($type_in,$brand_in,$engine_capacity_in,$power_in,$torque_in,
                            $fuel_in,$fuel_tank_capacity_in,$other_details_in);

     $this->car_type = $car_type_in;

   }

   /*interface class method declare*/
   function mileageData($m_data_in){
     $this->mileageData=$m_data_in;
     //return "Not Available";
   }

   function getMileageData(){
     return $this->mileageData;
   }
}

$my_vehicle = new Vehicle("bike","bajaj","200","23","20","Petrol","10","Pulsar");/* Creating Objects in PHP */

echo "<h4>Vehicle</h4>";
echo "<br>Type: ".$my_vehicle->getType();
echo "<br>Brand: ".$my_vehicle->getBrand();
echo "<br>Engine Capacity: ".$my_vehicle->getEngineCapacity();
echo "<br>Power: ".$my_vehicle->getPower();
echo "<br>Torque: ".$my_vehicle->getTorque();
echo "<br>Fuel: ".$my_vehicle->getFuel();
echo "<br>Fuel Tank Capacity: ".$my_vehicle->getFuelTankCapacity();
echo "<br>Other Details: ".$my_vehicle->getOtherDetails();
echo "<br>isTwoStroke:? ".$my_vehicle->isTwoStroke();

$my_bike = new Bike("bike","bajaj","200","23","20","Petrol","10","Pulsar","Sport");/* Creating Objects in PHP */

echo "<h4>My Bike</h4>";
echo "<br>Type: ".$my_bike->getType();
echo "<br>Brand: ".$my_bike->getBrand();
echo "<br>Engine Capacity: ".$my_bike->getEngineCapacity();
echo "<br>Power: ".$my_bike->getPower();
echo "<br>Torque: ".$my_bike->getTorque();
echo "<br>Fuel: ".$my_bike->getFuel();
echo "<br>Fuel Tank Capacity: ".$my_bike->getFuelTankCapacity();
echo "<br>".$my_bike->getOtherDetails();/*Overrided Function*/
echo "<br>Bike Type: ".$my_bike->getBikeType();
//echo "<br>is Two Stroke: ".$my_bike->isTwoStroke();

$my_car = new Car("car","tata","1200","230","200","Petrol","52","Tiago","Sport");/* Creating Objects in PHP */
$my_car-> mileageData("22");

echo "<h4>My Car</h4>";
echo "<br>Type: ".$my_car->getType();
echo "<br>Brand: ".$my_car->getBrand();
echo "<br>Engine Capacity: ".$my_car->getEngineCapacity();
echo "<br>Power: ".$my_car->getPower();
echo "<br>Torque: ".$my_car->getTorque();
echo "<br>Fuel: ".$my_car->getFuel();
echo "<br>Fuel Tank Capacity: ".$my_car->getFuelTankCapacity();
echo "<br>".$my_car->getOtherDetails();/*Overrided Function*/
echo "<br>Car Type: ".$my_car->getCarType();
echo "<br>MileageData: ".$my_car->getMileageData();

?>
