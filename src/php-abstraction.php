<?php
/**
 * PHP Abstraction Example (with some comments about interfaces)
 *
 * The purpose of this is to act as a tutorial example of using abstract classes and methods with PHP
 * Expands upon the short example from this page: http://www.hiphiparray.org/2013/08/php-abstraction-and-interfaces/
 *
 * Abstract classes are used to share functions through inheritance.
 * Interfaces are more like a blueprint, used to show how to create the implementing class.
 *
 * Author: hiphiparray.org
 * Date: 2013-10-02
 */

/**
 * Class Shape
 */
abstract class Shape
{
    /**
     * Used when displaying the area of the shape
     *
     * @var string
     */
    protected $name = '';

    /**
     * Used to calculate the area for some shapes
     * We want child classes to access this variable, so can't be private
     *
     * @var int
     */
    protected $width = 0;

    /**
     * Used to calculate the area for some shapes
     *
     * @var int
     */
    protected $height = 0;

    /**
     * Used to show the area of the shape
     *
     * @var string
     */
    public $areaResult = '';

    /**
     * area method
     *
     * Since this method is abstract, we are forcing extending classes to define this method
     * Abstract methods can be either public or protected, not private
     * Interface methods must be public
     *
     * @return mixed
     */
    abstract protected function area();

    /**
     * setAreaResult method
     *
     * Since this method is not abstract, it is shared as-is by extending classes
     * In abstract classes, every method doesn't have to be abstract
     * - that is the extending classes don't have to define the method
     * Interfaces can only declare methods and they must be defined by extending classes.
     *
     * @return string
     */
    protected function setAreaResult()
    {
        $this->areaResult =  "The area of this " . $this->name . " = " . $this->area() . "<br/>";
    }
}

/**
 * Class Square
 */
class Square extends Shape
{
    /**
     * __construct method
     *
     * @param $width
     */
    public function __construct($width)
    {
        $this->width = $width;
        $this->name = 'square';
        $this->setAreaResult();
    }

    /**
     * area method
     *
     * @return mixed
     */
    protected function area()
    {
        return $this->width * $this->width;
    }
}

/**
 * Class Rectangle
 */
class Rectangle extends Shape
{
    /**
     * __construct method
     *
     * @param $width
     * @param $height
     */
    public function __construct($width, $height)
    {
        $this->width = $width;
        $this->height = $height;
        $this->name = 'rectangle';
        $this->setAreaResult();
    }

    /**
     * area method
     *
     * @return mixed
     */
    protected function area()
    {
        return $this->width * $this->height;
    }
}


/**
 * Class Circle
 */
class Circle extends Shape
{
    /**
     * Used to calculate area of circle
     *
     * @var int
     */
    protected $radius = 0;

    /**
     * __construct method
     *
     * @param $radius
     */
    public function __construct($radius)
    {
        $this->radius = $radius;
        $this->name = 'circle';
        $this->setAreaResult();
    }

    /**
     * area method
     *
     * @return mixed
     */
    protected function area()
    {
        // Circle area equals pi multiplied by (radius squared)
        return number_format(pow($this->radius, 2) * M_PI, 2);
    }
}

// Let's make this more readable and define some constants
define("SQUARE_WIDTH", 3);
define("RECTANGLE_WIDTH", 4);
define("RECTANGLE_HEIGHT", 5);
define("CIRCLE_RADIUS", 6);

// now create instances of the different shape classes and display area

$square = new Square(SQUARE_WIDTH);
echo $square->areaResult;
// Output: The area of this square = 9

$rectangle = new Rectangle(RECTANGLE_WIDTH, RECTANGLE_HEIGHT);
echo $rectangle->areaResult;
// Output: The area of this rectangle = 20

$circle = new Circle(CIRCLE_RADIUS);
echo $circle->areaResult;
// Output: The area of this circle = 113.10

?>