<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 10/22/2016
 * Time: 1:27 PM
 */

namespace DoctBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Roles
 * @package DoctBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="roles")
 */

class Roles {


  /**
   * @ORM\Column(type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private $id;

  /**
   * @ORM\Column(type="string")
   */
  private $role;

  /**
   * @ORM\ManyToMany(targetEntity="User", mappedBy="roles")
   */
  private $users;


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
     * Set role
     *
     * @param string $role
     *
     * @return Roles
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add user
     *
     * @param \DoctBundle\Entity\User $user
     *
     * @return Roles
     */
    public function addUser(\DoctBundle\Entity\User $user)
    {
        $this->users[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \DoctBundle\Entity\User $user
     */
    public function removeUser(\DoctBundle\Entity\User $user)
    {
        $this->users->removeElement($user);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsers()
    {
        return $this->users;
    }
}
