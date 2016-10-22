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
use DoctBundle\Entity\Roles;
use DoctBundle\Entity\Tags;
use DoctBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DoctrineController extends Controller {

  public function indexAction(){
    $this->ManyToManySelf();
    //$this->ManyToMany();
    //$this->ManyToOneSelf();

      //$this->OneToMany();
//
//    $em = $this->getDoctrine();
//    $repoArticle = $em->getRepository(Article::class);
////    $repNews = $em->getRepository(News::class);
//    $article = $repoArticle->find(6);
//    var_dump($article->getParent()->getTitle());
//    $cateRepo = $em->getRepository(Category::class );
//    $category = $cateRepo->find(7);
//    var_dump($category);
//    $news = $repNews->find(5);
//    var_dump($news);
    //var_dump($article);



    return $this->render("::base.html.twig");
  }
  private function ManyToManySelf(){
    $em = $this->getDoctrine();
    $repoUser = $em->getRepository(User::class);
    var_dump($repoUser->find(7)->getFriendsWithMe()->toArray());
  }
  private function ManyToMany(){
    $em = $this->getDoctrine();
    $repoArticle = $em->getRepository(User::class);
    $repoRole = $em->getRepository(Roles::class);
    /**
     * @var $userOne User
     */
    $userOne = $repoArticle->find(1);
    $roles = $userOne->getRoles();
    $role = $repoRole->find(1);
    $users = $role->getUsers();
    var_dump($users->toArray());
  }
  private function ManyToOneSelf(){
    $em = $this->getDoctrine();
    $repoArticle = $em->getRepository(User::class);
    /**
     * @var $userOne User
     */
    $userOne = $repoArticle->find(1);
    var_dump("my friennd");
    var_dump($userOne->getFriends());
    var_dump("friend children");
    var_dump($userOne->getFriendChildren()->toArray());
  }
  private function OneToMany(){
    $em = $this->getDoctrine();
    $repoArticle = $em->getRepository(Article::class);
    $repoTag = $em->getRepository(Tags::class);
    $article = $repoArticle->find(34);
    $tag = $repoTag->find(26);
    var_dump($article->getTags()->toArray());
    //var_dump($tag->getArticle()->getTitle());
  }
}