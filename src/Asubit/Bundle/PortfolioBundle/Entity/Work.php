<?php

namespace Asubit\Bundle\PortfolioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Work
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Asubit\Bundle\PortfolioBundle\Entity\WorkRepository")
 */
class Work
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
     * @var string
     *
     * @ORM\Column(name="thumbnail", type="string", length=255, nullable=true)
     */
    private $thumbnail;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_creation", type="date", nullable=true)
     */
    private $dateCreation;

    /**
     * @var array
     *
     * @ORM\Column(name="photos", type="simple_array", nullable=true)
     */
    private $photos;

    /**
     * @var string
     *
     * @ORM\Column(name="short_description", type="string", length=500, nullable=true)
     */
    private $shortDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="works")
     */
    protected $category;

    /**
     * @var string
     *
     * @ORM\Column(name="tool", type="string", length=255, nullable=true)
     */
    private $tool;

    /**
     * @var string
     *
     * @ORM\Column(name="client", type="string", length=255, nullable=true)
     */
    private $client;

    /**
     * @var array
     *
     * @ORM\Column(name="tags", type="simple_array", nullable=true)
     */
    private $tags;

    /**
     * @var string
     *
     * @ORM\Column(name="linkpreview", type="string", length=255, nullable=true)
     */
    private $linkpreview;


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
     * @return Work
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
     * @return Work
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
     * Set thumbnail
     *
     * @param string $thumbnail
     * @return Work
     */
    public function setThumbnail($thumbnail)
    {
        $this->thumbnail = $thumbnail;

        return $this;
    }

    /**
     * Get thumbnail
     *
     * @return string 
     */
    public function getThumbnail()
    {
        return $this->thumbnail;
    }

    /**
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     * @return Work
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get dateCreation
     *
     * @return \DateTime 
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * Set photos
     *
     * @param array $photos
     * @return Work
     */
    public function setPhotos($photos)
    {
        $this->photos = $photos;

        return $this;
    }

    /**
     * Get photos
     *
     * @return array 
     */
    public function getPhotos()
    {
        return $this->photos;
    }

    /**
     * Set tags
     *
     * @param array $tags
     * @return Work
     */
    public function setTags($tags)
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * Get tags
     *
     * @return array 
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Set shortDescription
     *
     * @param string $shortDescription
     * @return Work
     */
    public function setShortDescription($shortDescription)
    {
        $this->shortDescription = $shortDescription;

        return $this;
    }

    /**
     * Get shortDescription
     *
     * @return string 
     */
    public function getShortDescription()
    {
        return $this->shortDescription;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Work
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set category
     *
     * @param \Asubit\Bundle\PortfolioBundle\Entity\Category $category
     * @return Work
     */
    public function setCategory(\Asubit\Bundle\PortfolioBundle\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \Asubit\Bundle\PortfolioBundle\Entity\Category 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set tool
     *
     * @param string $tool
     * @return Work
     */
    public function setTool($tool)
    {
        $this->tool = $tool;

        return $this;
    }

    /**
     * Get tool
     *
     * @return string 
     */
    public function getTool()
    {
        return $this->tool;
    }

    /**
     * Set client
     *
     * @param string $client
     * @return Work
     */
    public function setClient($client)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return string 
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Set linkpreview
     *
     * @param string $linkpreview
     * @return Work
     */
    public function setLinkpreview($linkpreview)
    {
        $this->linkpreview = $linkpreview;

        return $this;
    }

    /**
     * Get linkpreview
     *
     * @return string 
     */
    public function getLinkpreview()
    {
        return $this->linkpreview;
    }
}
