<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 10/14/2016
 * Time: 9:48 AM
 */

namespace DoctBundle\Controller;


use DoctBundle\Entity\Article;
use DoctBundle\Entity\Category;
use DoctBundle\Entity\News;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DoctrineController extends Controller {

  public function indexAction(){

    $em = $this->getDoctrine();
    $repoArticle = $em->getRepository(Article::class);
//    $repNews = $em->getRepository(News::class);
    $article = $repoArticle->find(6);
    var_dump($article->getParent()->getTitle());
//    $cateRepo = $em->getRepository(Category::class );
//    $category = $cateRepo->find(7);
//    var_dump($category);
//    $news = $repNews->find(5);
//    var_dump($news);
    //var_dump($article);



    return $this->render("::base.html.twig");
  }

}