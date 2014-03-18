<?php

namespace Asubit\Bundle\PortfolioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Asubit\Bundle\PortfolioBundle\Entity\CategoryRepository")
 */
class Category
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="name_canonical", type="string", length=255, nullable=true)
     */
    private $nameCanonical;

    /**
     * @ORM\OneToMany(targetEntity="Work", mappedBy="category")
     */
    protected $works;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Category
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set nameCanonical
     *
     * @param string $nameCanonical
     * @return Category
     */
    public function setNameCanonical($nameCanonical)
    {
        $this->nameCanonical = $nameCanonical;

        return $this;
    }

    /**
     * Get nameCanonical
     *
     * @return string 
     */
    public function getNameCanonical()
    {
        return $this->nameCanonical;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->works = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add works
     *
     * @param \Asubit\Bundle\PortfolioBundle\Entity\Work $works
     * @return Category
     */
    public function addWork(\Asubit\Bundle\PortfolioBundle\Entity\Work $works)
    {
        $this->works[] = $works;

        return $this;
    }

    /**
     * Remove works
     *
     * @param \Asubit\Bundle\PortfolioBundle\Entity\Work $works
     */
    public function removeWork(\Asubit\Bundle\PortfolioBundle\Entity\Work $works)
    {
        $this->works->removeElement($works);
    }

    /**
     * Get works
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getWorks()
    {
        return $this->works;
    }
}
