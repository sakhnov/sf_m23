<?php

interface ForwardInterface {
	public function moveForward();
}

interface BackInterface {
	public function moveBack();
}

abstract class Machines implements BackInterface, ForwardInterface 
{
	public function moveForward() {
		echo 'Едем вперед<br>';
	}
	public function moveBack() {
		echo 'Едем назад<br>';
	}
}

class Car extends Machines
{
	public $brand;
	public $model;
	public $engine;
	public $color;
	public $fuel;
	public $salon;
	public function nitro() {
		echo 'Включили нитро<br>';
	}
	public function signal() {
		echo 'Включили сигнал<br>';
	}
	public function wipers() {
		echo 'Включили дворники<br>';
	}

}
class Tank extends Machines
{
	public $model;
	public $pushka;
	public function shot() {
		echo 'Бахнули из танка<br>';
	}
}
class Specialmachine extends Machines
{
	public $brand;
	public $model;
	public function moveBucket() {
		echo 'Заработал ковш<br>';
	}
}

function drive(Machines $machines){
    $machines->moveForward();
    if (get_class($machines) == 'Car') {
        $machines->nitro();
    }else if(get_class($machines) == 'Specialmachine'){
        $machines->moveBucket();
    }else if(get_class($machines) == 'Tank'){
    	$machines->shot();
    }

}

$car = new Car;
drive($car);
$car->wipers();
$car->signal();

$bulldozer = new Specialmachine;
drive($bulldozer);