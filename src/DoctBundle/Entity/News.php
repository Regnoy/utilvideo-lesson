<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 10/14/2016
 * Time: 9:21 AM
 */

namespace DoctBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class News
 * @package DoctBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="news")
 */

class News {

  /**
   * @ORM\Column(type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private $id;

  /**
   * @ORM\Column(type="string")
   */
  private $title;

  /**
   * @ORM\Column(type="datetime")
   */
  private $created;

  /**
   * @ORM\Column(type="datetime")
   */
  private $updated;

  /**
   * @ORM\OneToOne(targetEntity="Category", inversedBy="news")
   * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
   */
  private $category;


  public function __construct() {
    $this->created = new \DateTime();
    $this->updated = new \DateTime();
  }


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
   * Set title
   *
   * @param string $title
   *
   * @return News
   */
  public function setTitle($title)
  {
    $this->title = $title;

    return $this;
  }

  /**
   * Get title
   *
   * @return string
   */
  public function getTitle()
  {
    return $this->title;
  }

  /**
   * Set created
   *
   * @param \DateTime $created
   *
   * @return News
   */
  public function setCreated($created)
  {
    $this->created = $created;

    return $this;
  }

  /**
   * Get created
   *
   * @return \DateTime
   */
  public function getCreated()
  {
    return $this->created;
  }

  /**
   * Set updated
   *
   * @param \DateTime $updated
   *
   * @return News
   */
  public function setUpdated($updated)
  {
    $this->updated = $updated;

    return $this;
  }

  /**
   * Get updated
   *
   * @return \DateTime
   */
  public function getUpdated()
  {
    return $this->updated;
  }

    /**
     * Set category
     *
     * @param \DoctBundle\Entity\Category $category
     *
     * @return News
     */
    public function setCategory(\DoctBundle\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \DoctBundle\Entity\Category
     */
    public function getCategory()
    {
        return $this->category;
    }
}
