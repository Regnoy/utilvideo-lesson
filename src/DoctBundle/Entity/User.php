<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 10/20/2016
 * Time: 9:26 AM
 */

namespace DoctBundle\Entity;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;


/**
 * Class Article
 * @package DoctBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="user")
 */

class User {
  /**
   * @ORM\Column(type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private $id;

  /**
   * @ORM\Column(type="string")
   */
  private $fullname;


  /**
   * @ORM\ManyToOne(targetEntity="Address")
   * @ORM\JoinColumn(name="address_id", referencedColumnName="id")
   */
  private $address;

  /**
   * @ORM\OneToMany(targetEntity="User", mappedBy="friends")
   */
  private $friendChildren;

  /**
   * @ORM\ManyToOne(targetEntity="User", inversedBy="friendChildren")
   * @ORM\JoinColumn(name="friend_id", referencedColumnName="id")
   */

  private $friends;

  /**
   * @ORM\ManyToMany(targetEntity="Roles", inversedBy="users", cascade={"persist"})
   * @ORM\JoinColumn(name="users_roles")
   */

  private $roles;


  /**
   * @ORM\ManyToMany(targetEntity="User", mappedBy="myFriends")
   */
  private $friendsWithMe;

  /**
   * @ORM\ManyToMany(targetEntity="User", inversedBy="friendsWithMe")
   * @ORM\JoinTable(name="friends",
   *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
   *      inverseJoinColumns={@ORM\JoinColumn(name="friend_user_id", referencedColumnName="id")}
   *      )
   */
  private $myFriends;





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
     * Set fullname
     *
     * @param string $fullname
     *
     * @return User
     */
    public function setFullname($fullname)
    {
        $this->fullname = $fullname;

        return $this;
    }

    /**
     * Get fullname
     *
     * @return string
     */
    public function getFullname()
    {
        return $this->fullname;
    }

    /**
     * Set address
     *
     * @param \DoctBundle\Entity\Address $address
     *
     * @return User
     */
    public function setAddress(\DoctBundle\Entity\Address $address = null)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return \DoctBundle\Entity\Address
     */
    public function getAddress()
    {
        return $this->address;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->friendChildren = new ArrayCollection();
        $this->roles = new ArrayCollection();
    }

   

    /**
     * Add friendChild
     *
     * @param \DoctBundle\Entity\User $friendChild
     *
     * @return User
     */
    public function addFriendChild(\DoctBundle\Entity\User $friendChild)
    {
        $this->friendChildren[] = $friendChild;

        return $this;
    }

    /**
     * Remove friendChild
     *
     * @param \DoctBundle\Entity\User $friendChild
     */
    public function removeFriendChild(\DoctBundle\Entity\User $friendChild)
    {
        $this->friendChildren->removeElement($friendChild);
    }

    /**
     * Get friendChildren
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFriendChildren()
    {
        return $this->friendChildren;
    }

    /**
     * Set friends
     *
     * @param \DoctBundle\Entity\User $friends
     *
     * @return User
     */
    public function setFriends(\DoctBundle\Entity\User $friends = null)
    {
        $this->friends = $friends;

        return $this;
    }

    /**
     * Get friends
     *
     * @return \DoctBundle\Entity\User
     */
    public function getFriends()
    {
        return $this->friends;
    }



    /**
     * Add role
     *
     * @param \DoctBundle\Entity\Roles $role
     *
     * @return User
     */
    public function addRole(\DoctBundle\Entity\Roles $role)
    {
        $this->roles[] = $role;

        return $this;
    }

    /**
     * Remove role
     *
     * @param \DoctBundle\Entity\Roles $role
     */
    public function removeRole(\DoctBundle\Entity\Roles $role)
    {
        $this->roles->removeElement($role);
    }

    /**
     * Get roles
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * Add friendsWithMe
     *
     * @param \DoctBundle\Entity\User $friendsWithMe
     *
     * @return User
     */
    public function addFriendsWithMe(\DoctBundle\Entity\User $friendsWithMe)
    {
        $this->friendsWithMe[] = $friendsWithMe;

        return $this;
    }

    /**
     * Remove friendsWithMe
     *
     * @param \DoctBundle\Entity\User $friendsWithMe
     */
    public function removeFriendsWithMe(\DoctBundle\Entity\User $friendsWithMe)
    {
        $this->friendsWithMe->removeElement($friendsWithMe);
    }

    /**
     * Get friendsWithMe
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFriendsWithMe()
    {
        return $this->friendsWithMe;
    }

    /**
     * Add myFriend
     *
     * @param \DoctBundle\Entity\User $myFriend
     *
     * @return User
     */
    public function addMyFriend(\DoctBundle\Entity\User $myFriend)
    {
        $this->myFriends[] = $myFriend;

        return $this;
    }

    /**
     * Remove myFriend
     *
     * @param \DoctBundle\Entity\User $myFriend
     */
    public function removeMyFriend(\DoctBundle\Entity\User $myFriend)
    {
        $this->myFriends->removeElement($myFriend);
    }

    /**
     * Get myFriends
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMyFriends()
    {
        return $this->myFriends;
    }
}
