<?php
/**
 * PHP Interface Example (with some comments about abstraction)
 *
 * The purpose of this is to act as a tutorial example of using interfaces with PHP
 * Expands upon the short example from this page: http://www.hiphiparray.org/2013/08/php-abstraction-and-interfaces/
 *
 * Interfaces are more like a blueprint, used to show how to create the implementing class.
 * Abstract classes are used to share functions through inheritance.
 *
 * Author: hiphiparray.org
 * Date: 2013-10-02
 */

/**
 * Class Shape
 */
interface Shape
{
    // Interfaces must not include member variables

    /**
     * area method
     *
     * Extending classes must define this method
     * Interface methods must be public and empty (ie. declare only)
     * Abstract methods can be either public or public, not private
     * Abstract classes can have both abstract (only declared) and non-abstract methods (both declared and defined)
     *
     * @return mixed
     */
    public function area();

    /**
     * setAreaResult method
     *
     * @return string
     */
    public function setAreaResult();
}

/**
 * Class Square
 */
class Square implements Shape
{
    /**
     * Used when displaying the area of the shape
     *
     * @var string
     */
    protected $name = '';

    /**
     * Used to calculate the area for some shapes
     *
     * @var int
     */
    protected $width = 0;

    /**
     * Used to show the area of the shape
     *
     * @var string
     */
    public $areaResult = '';

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
    public function area()
    {
        return $this->width * $this->width;
    }

    /**
     * setAreaResult method
     *
     * @return string
     */
    public function setAreaResult()
    {
        $this->areaResult =  "The area of this " . $this->name . " = " . $this->area() . "<br/>";
    }
}

/**
 * Class Rectangle
 */
class Rectangle implements Shape
{
    /**
     * Used when displaying the area of the shape
     *
     * @var string
     */
    protected $name = '';

    /**
     * Used to calculate the area for some shapes
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
    public function area()
    {
        return $this->width * $this->height;
    }

    /**
     * setAreaResult method
     *
     * @return string
     */
    public function setAreaResult()
    {
        $this->areaResult =  "The area of this " . $this->name . " = " . $this->area() . "<br/>";
    }
}

/**
 * Class Circle
 */
class Circle implements Shape
{
    /**
     * Used when displaying the area of the shape
     *
     * @var string
     */
    protected $name = '';

    /**
     * Used to calculate the area for some shapes
     *
     * @var int
     */
    protected $radius = 0;

    /**
     * Used to show the area of the shape
     *
     * @var string
     */
    public $areaResult = '';

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
    public function area()
    {
        // Circle area equals pi multiplied by (radius squared)
        return number_format(pow($this->radius, 2) * M_PI, 2);
    }

    /**
     * setAreaResult method
     *
     * @return string
     */
    public function setAreaResult()
    {
        $this->areaResult =  "The area of this " . $this->name . " = " . $this->area() . "<br/>";
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