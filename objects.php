<?php

class Car {
  public $model;
  public $color;
  public $quantity;
  public function __construct($model, $color, $quantity) {
    $this->model = $model;
    $this->color = $color;
    $this->quantity = $quantity;
}    
}

interface year {
    public function yearFilter(); 
} 

class passengerCar extends Car implements year {
    public $year;
    public function __construct ($model, $color, $quantity, $year) {
    Car::__construct($model, $color, $quantity);
    $this->year = $year;
    }
   /*  public function getYear() {
        return $this->year;
    }
    public function setYear() {
        $this->year = $year;
        return $this; 
    }  *//* 
    public function carQuantity() {
        $a = $this->quantity + $this->quantity;
        echo $a;
    } */
    public function yearFilter() {
        if ($this->year < 2012) {
            echo $this->model . ' ' . 'Old car';
        } else {
            echo $this->model . ' ' . 'New car';
        }
    }
}

/* class passengerCar implements carSum {
    public function carQuantity() {
        $audi->quantity + $lexus->quantity;     
     }
} */

$audi = new passengerCar('Audi', 'Red', 2, 2010);
echo $audi->yearFilter();
/* $audi->carQuantity(); */ 
/* echo carQuantity(); */



$lexus = new passengerCar('Lexus', 'Black', 1, 2015);

 
class Goods {
    public $price;
    public $quantity;
    public function __construct($price, $quantity) {
        $this->price = $price;
        $this->quantity = $quantity;
    }
    public function freeDelivery() {
        if ($this->price > 30000) {
            echo 'Free Delivery';
        } else {
            echo 'Pay Delivery';
        }
    }
}

interface resolution {
    public function resolutionFilter();
}


class Tv extends Goods implements resolution {
    public $model;
    public $size;
    public $color;
    public $resolution;
    public function __construct ($price, $quantity, $model, $size, $color, $resolution) {
      Goods::__construct($price, $quantity); 
      $this->model = $model;
      $this->size = $size;
      $this->color = $color;
      $this->resolution = $resolution;
      }
    public function resolutionFilter() {
     if ($this->resolution == 'UHD') {
         echo $this->model . $this->size .  'UHD';
     } elseif ($this->resolution == 'FHD') {
        echo $this->model . $this->size . 'FHD';
     } else {
         echo $this->model . $this->size . 'HD';
     }
  }
}

$philips = new Tv(28000, 32, 'Philips', 43, 'Black', 'UHD');
$philips->resolutionFilter();
$philips->freeDelivery();

$samsung = new Tv(39000, 15, 'Samsung', 49, 'White', 'FHD');
$samsung->resolutionFilter();
$samsung->freeDelivery();


interface plan {
    public function dayPlan();
}

interface price {
    public function penPrice();
}


class Pen extends Goods implements plan, price {
    public $model;
    public $color;
    public function __construct($price, $quantity, $model, $color) {
        Goods::__construct($price, $quantity);
        $this->model = $model;
        $this->color = $color;
    }    
    public function dayPlan() {
        $quantity = $this->quantity;
        if ($quantity) {
            echo ($this->quantity/30);
        }
    }
    public function penPrice() {
        $penprice = $this->quantity * $this->price;
        echo $penprice;
    }
}

$green_pen = new Pen(7, 1500, 'Zinko', 'Green');
$green_pen->dayPlan();
$green_pen->penPrice();

$red_pen = new Pen(15, 3000, 'Ericson', 'Red');
$red_pen->dayPlan();
$red_pen->penPrice();

class Bird {
    public $name;
    public $area;
    public function __construct($name, $area) {
        $this->name = $name;
        $this->area = $area;
    }
    public function aerial() {
        if ($this->area) {
            echo $this->name . 'lives' . $this->area;
        } 
    }
}

interface population {
    public function populationWarning();
}

class Duck extends Bird implements population {
    
    public $population;
    public function __construct($name, $area, $population) {
        Bird::__construct($name, $area);
        $this->population = $population;
    }    
    public function populationWarning() {
        if ($this->population < 1000) {
            echo 'Warning';
        } else {
            echo 'There is no reason to warry';
        }
    }
}
$first_duck = new Duck('Big Grey Duck', 'Europe', 150000);
$first_duck->populationWarning();
$first_duck->aerial();
$second_duck = new Duck('African Wild Duck', 'Africa', 976);
$second_duck->populationWarning();
$second_duck->aerial();

interface electronicsPrice {
    public function getPrice();
}


class Electronics extends Goods implements electronicsPrice {
  public $name;
  public $discount;
  public $category;
  public function __construct($price, $quantity, $name, $discount, $category) {
    Goods::__construct($price, $quantity);
    $this->name = $name;
    $this->discount = $discount;
    $this->category = $category;
  }    
  public function getPrice() {
    /* $phoneDiscount = ($this->category == 'Smartphone'); */
    $discount = ($this->discount); /* , $phoneDiscount); */
    if ($discount) {
      return round ($this->price - ($this->price * 0.1));
    } else {
    return $this->price;
    }
  }
} 
$iphone7 = new Electronics(36000, 10, 'Iphone 7', 10, 'Smartphone');
echo $iphone7->getPrice();
echo $iphone7->freeDelivery();    
   
$tab4 = new Electronics(15000, 5, 'Tab 4', 5, 'Tablet');
echo $tab4->getPrice();   
echo $tab4->freeDelivery();    
   
  
?>