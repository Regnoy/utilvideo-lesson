<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 10/20/2016
 * Time: 9:26 AM
 */

namespace DoctBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Class Article
 * @package DoctBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="address")
 */

class Address {
  /**
   * @ORM\Column(type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private $id;

  /**
   * @ORM\Column(type="string")
   */
  private $address;

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
     * Set address
     *
     * @param string $address
     *
     * @return Address
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }
}
