<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 10/14/2016
 * Time: 9:32 AM
 */

namespace DoctBundle\DataFixtures\ORM;


use DoctBundle\Entity\Article;
use DoctBundle\Entity\Category;
use DoctBundle\Entity\News;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class DataLoad implements FixtureInterface {

  public function load(ObjectManager $manager) {

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