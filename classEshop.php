<?php


abstract class Draw {

    protected $image;

    public function draw(){
    
    echo "<img src='./" . $this->image . "'></img>" . "<br>" 
    . $this->id . "<br>"
     . $this->name . "<br>"
      . $this->desc. "<br>"
       . $this->price;
    
    }
    

}

abstract class Products extends Draw{


    protected $image;
    protected $id;
    protected $name;
    protected $desc;
    protected $price;


}


abstract class Games extends Products{

    public function __construct(){

        
        // $this->XXXX måste kopplas på något vis, antingen ifrån Sql eller input. eller befintligt.
        // lite osäker på redan befintliga
        $this->image = $url;
        $this->id = "Games";
        $this->name = $name;
        $this->desc = $desc;
        $this->price = $price;
    
    }
}

abstract class Consoles extends Products{

    public function __construct(){

        
         // $this->XXXX måste kopplas på något vis, antingen ifrån Sql eller input. eller befintligt.
        // lite osäker på redan befintliga
        $this->image = $url;
        $this->id = "Consoles";
        $this->name = $name;
        $this->desc = $desc;
        $this->price = $price;
    }
}

abstract class Accesories extends Products{

    public function __construct(){

        // $this->XXXX måste kopplas på något vis, antingen ifrån Sql eller input. eller befintligt.
        // lite osäker på redan befintliga
        $this->image = $url;
        $this->id = "Accesories";
        $this->name = $name;
        $this->desc = $desc;
        $this->price = $price;
    
    }
}









?>