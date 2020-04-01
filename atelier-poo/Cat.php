<?php
//namespace Animals;

/**
 * Created by PhpStorm.
 * User: nico
 * Date: 06/03/17
 * Time: 10:29
 */
class Cat
{
    const TIREDNESS_MAX = 100;
    const TIREDNESS_INCR = 10;
    const TIREDNESS_DECR = 10;

    /**
     * Le nom du chat
     * @var String
     */
    private $name;

    /**
     * Le collier du chat
     * @var Collar
     */
    private $collar;

    /**
     * La couleur du chat
     * @var String
     */
    private $color;

    /**
     * Niveau de tiredness du chat (de 0 à 100).
     * @var integer
     */
    private $tiredness = 0;

    private $image;

    /**
     * Cat constructor.
     * @param string $name
     * @param string $color
     * @param Collar|null $collar
     */
    public function __construct(string $name, string $color, Collar $collar = null)
    {
        $this->name = $name;
        if (in_array($color, array('brown', 'black', 'ginger'))) {
            $this->color = $color;;
        }
        if ($collar !== null) {
            $this->collar = $collar;
        }
    }

    /**
     * @return string
     */
    public function getImage() :string
    {
        return $this->image;
    }

    /**
     * @param string $image
     * @return Cat
     */
    public function setImage(string $image): Cat
    {
        $this->image = $image;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Cat
     */
    public function setName(string $name): Cat
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return Collar
     */
    public function getCollar(): Collar
    {
        return $this->collar;
    }

    /**
     * @param Collar $collar
     * @return Cat
     */
    public function setCollar(Collar $collar): Cat
    {
        $this->collar = $collar;
        return $this;
    }

    /**
     * @return string
     */
    public function getColor(): string
    {
        return $this->color;
    }

    /**
     * @param string $color
     * @return Cat
     */
    public function setColor(string $color): Cat
    {
        if (in_array($color, array('brown', 'black', 'ginger'))) {
            $this->color = $color;;
        }
    }

    /**
     * @return int
     */
    public function getTiredness(): int
    {
        return $this->tiredness;
    }

    /**
     * @param int $tiredness
     * @return Cat
     */
    public function setTiredness(int $tiredness): Cat
    {
        if($tiredness > 100) {
            $this->tiredness = 100;
        } else {
            $this->tiredness = $tiredness;
        }
        return $this;
    }

    /**
     * Indique si le chat est fatigué
     * @return bool
     */
    public function isTired() : bool
    {
        $result = false;
        if ($this->tiredness >= self::TIREDNESS_MAX) {
            $result = true;
        }
        return $result;
    }

    /**
     * Pour que note chat soit en pleine forme !
     */
    public function rest()
    {
        $this->tiredness = 0;
    }

    /**
     * Le chat marche et surtout se dépense.
     */
    public function walk()
    {
        if ($this->getTiredness() < self::TIREDNESS_MAX) {
            $this->setTiredness($this->getTiredness() + self::TIREDNESS_INCR);
        }
    }

    /**
     * Le chat mange
     */
    public function eat()
    {
        if ($this->getTiredness() > 0) {
            $this->setTiredness($this->getTiredness() - self::TIREDNESS_DECR);
        }
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $str = '<img src="'.$this->getImage().'" height="100px" /> : Je suis un "'.get_class($this).'", je m\'appelle <strong>'.$this->getName().'</strong>, suis de couleur '.$this->getColor().' et mon niveau de tiredness est à '.$this->getTiredness();
        if ($this->collar !== null) {
            $str .= '<br />'.$this->collar;
        } else {
            $str .= '<br />Je n\'ai pas de collier.';
        }
        $str .= '<br />';
        return $str;
    }
}