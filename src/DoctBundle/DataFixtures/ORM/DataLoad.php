<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 10/14/2016
 * Time: 9:32 AM
 */

namespace DoctBundle\DataFixtures\ORM;


use DoctBundle\Entity\Address;
use DoctBundle\Entity\Article;
use DoctBundle\Entity\Category;
use DoctBundle\Entity\News;
use DoctBundle\Entity\Roles;
use DoctBundle\Entity\Tags;
use DoctBundle\Entity\User;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class DataLoad implements FixtureInterface {

  public function load(ObjectManager $manager) {
    $this->exemManyTomanySelf($manager);
    //$this->exemmanyToMany($manager);
    //$this->exemManyToOneSelf($manager);
      //$this->exemOneToMany($manager);
    //$this->exemManyToOne($manager);
    //$this->exemOneToOne($manager);
  }
  private function exemManyTomanySelf(ObjectManager $manager) {
    $user = new User();
    $user->setFullname("User 1");

    $user2 = new User();
    $user2->setFullname("User 2");

    $user3 = new User();
    $user3->setFullname("User 3");

    $user->addMyFriend($user2);
    $user->addMyFriend($user3);
    $user3->addMyFriend($user);


    $manager->persist($user);
    $manager->persist($user2);
    $manager->persist($user3);
    $manager->flush();
  }
  private function exemManyToMany(ObjectManager $manager){
    $user = new User();
    $user->setFullname("User 1");

    $user2 = new User();
    $user2->setFullname("User 2");

    $user3 = new User();
    $user3->setFullname("User 3");

    $role = new Roles();
    $role->setRole("USER_ROLE");


    $role2 = new Roles();
    $role2->setRole("USER_ADMIN");

    $user->addRole($role);
    $user->addRole($role2);
    $user2->addRole($role);
    $user3->addRole($role2);


    $manager->persist($user);
    $manager->persist($user2);
    $manager->persist($user3);
    $manager->flush();
  }
  private function exemManyToOneSelf(ObjectManager $manager){
    $user = new User();
    $user->setFullname("User 1");

    $user2 = new User();
    $user2->setFullname("User 2");

    $user3 = new User();
    $user3->setFullname("User 3");

    $user->setFriends($user2);
    $user2->setFriends($user);
    $user3->setFriends($user);


    $manager->persist($user);
    $manager->persist($user2);
    $manager->persist($user3);
    $manager->flush();
  }
  private function exemOneToMany(ObjectManager $manager){
    $artile = new Article();
    $artile->setTitle("MY first article");

    $artile2 = new Article();
    $artile2->setTitle("My second title");

    $tags = new Tags();
    $tags->setName("Tags 1");
    $artile->addTag($tags);
    $artile2->addTag($tags);

    $manager->persist($artile);
    $manager->persist($artile2);
    $manager->persist($tags);


    $manager->flush();
  }
  private function exemManyToOne(ObjectManager $manager){
    $address = new Address();
    $address->setAddress("Moscow 22");

    $user1 = new User();
    $user1->setFullname("Pavel");
    $user1->setAddress($address);

    $user2= new User();
    $user2->setFullname("Vasea");
    $user2->setAddress($address);
    $manager->persist($address);
    $manager->persist($user1);
    $manager->persist($user2);
    $manager->flush();
  }
  private function exemOneToOne(ObjectManager $manager){
    $artile = new Article();
    $artile->setTitle("MY first article");

    $artile2 = new Article();
    $artile2->setTitle("My second title");


    $news = new News();
    $news->setTitle("My first news");

    $category = new Category();
    $category->setName("Category");
    $category2 = new Category();
    $category2->setName("Category 1");

    $artile->setCategory($category);
    $artile2->setCategory($category2);
    $artile2->setParent($artile);


    $news->setCategory($category);
    $manager->persist($artile);
    $manager->persist($artile2);
    $manager->persist($news);
    $manager->persist($category);
    $manager->persist($category2);

    $manager->flush();
  }
}