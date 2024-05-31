<?php
namespace App\Models;

class Anime{

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $synopsis;

    /**
     * @var string
     */
    private $type;

    /**
     * @var int
     */
    private $rate; 

    /**
     * @var 
     */
    private $release_date;

    /**
     * @var string
     */
    private $slug;

    /**
     * @var string
     */
    private $image;

    /**
     * @var string
     */
    private $color;

    /**
     * @var 
     */
    private $date;


    
    /**
     * Get the value of id
     */ 
    public function getId(): int
    {
        return $this->id;
    }


    /**
     * Get the value of name
     */ 
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the value of name
     */ 
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of synopsis
     */ 
    public function getSynopsis(): string
    {
        return $this->synopsis;
    }

    /**
     * Set the value of synopsis
     */ 
    public function setSynopsis(string $synopsis)
    {
        $this->synopsis = $synopsis;

        return $this;
    }

    /**
     * Get the value of type
     *
     * @return  string
     */ 
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Set the value of type
     */ 
    public function setType(string $type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get the value of rate
     */ 
    public function getRate(): int
    {
        return $this->rate;
    }

    /**
     * Set the value of rate
     */ 
    public function setRate(int $rate)
    {
        $this->rate = $rate;

        return $this;
    }

    /**
     * Get the value of release_date
     */ 
    public function getRelease_date(): string
    {
        return $this->release_date;
    }

    /**
     * Set the value of release_date
     */ 
    public function setRelease_date(string $release_date)
    {
        $this->release_date = $release_date;

        return $this;
    }

    /**
     * Get the value of slug
     */ 
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * Set the value of slug
     */ 
    public function setSlug(string $slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get the value of image
     */ 
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * Set the value of image
     */ 
    public function setImage(string $image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the value of color
     *
     * @return  string
     */ 
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set the value of color
     *
     * @param  string  $color
     *
     * @return  self
     */ 
    public function setColor(string $color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get the value of date
     */ 
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * Set the value of date
     */ 
    public function setDate(string $date)
    {
        $this->date = $date;

        return $this;
    }


}
