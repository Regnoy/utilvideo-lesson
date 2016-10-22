<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 10/14/2016
 * Time: 9:38 AM
 */

namespace DoctBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Class Article
 * @package DoctBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="tags")
 */

class Tags {


  /**
   * @ORM\Column(type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private $id;


  /**
   * @ORM\Column(type="string")
   */
  private $name;


  /**
   * @ORM\ManyToOne(targetEntity="Article", inversedBy="tags")
   * @ORM\JoinColumn(name="article_id", referencedColumnName="id")
   */
  private $article;

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
     *
     * @return Tags
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
     * Set article
     *
     * @param \DoctBundle\Entity\Article $article
     *
     * @return Tags
     */
    public function setArticle(\DoctBundle\Entity\Article $article = null)
    {
        $this->article = $article;

        return $this;
    }

    /**
     * Get article
     *
     * @return \DoctBundle\Entity\Article
     */
    public function getArticle()
    {
        return $this->article;
    }
}
