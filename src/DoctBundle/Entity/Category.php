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
 * @ORM\Table(name="category")
 */

class Category {


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
   * @ORM\OneToOne(targetEntity="Article", mappedBy="category")
   */
  private $article;

  /**
   * @ORM\OneToOne(targetEntity="News", mappedBy="category")
   */
  private $news;

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
     * Set article
     *
     * @param \DoctBundle\Entity\Article $article
     *
     * @return Category
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

    /**
     * Set news
     *
     * @param \DoctBundle\Entity\News $news
     *
     * @return Category
     */
    public function setNews(\DoctBundle\Entity\News $news = null)
    {
        $this->news = $news;

        return $this;
    }

    /**
     * Get news
     *
     * @return \DoctBundle\Entity\News
     */
    public function getNews()
    {
        return $this->news;
    }
}
