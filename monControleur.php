<?php
session_start();




require_once("Twig-1.15.0/lib/Twig/Autoloader.php");

Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem("templates");
 $c=new PDO('mysql:host=127.0.0.1;port=3306;dbname=site02','root','');
		if(!$c)
		die("erreur connexion");
$c->exec('SET NAMES utf8');//pour le resultat d'apres l bd;
$c->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);



/*$twig = new Twig_Environment($loader, array(
	"cache" => false
));
 */

$twig = new Twig_Environment($loader, array(
  //  'cache' => 'tmp_cache',
   'cache' => false,
    'autoescape'=>true
));


$actions=array("result"=>0,"accueil"=>0,"enchere"=>0,"aide"=>0,"inscription"=>0,"seconnecter"=>0,"deconnexion"=>1,"addprdt"=>3,"moncompte"=>3,'updateprdt'=>3,'deleteprdt'=>3,'prdtlist'=>3,'addench'=>3,"encheres"=>0,"offre"=>1,'updateench'=>3,'deleteench'=>3,'enchlist'=>3,'addcat'=>3,'updatecat'=>3,'deletecat'=>3,'adduser'=>3,'updateuser'=>3,'deleteuser'=>3,'userlist'=>3,'addjeton'=>3,'updatejeton'=>3,'deletejeton'=>3,'listjeton'=>3,'detailachat'=>3,'compte'=>1,'achat'=>1,'enchvisit'=>1,'buyjetons'=>1,'offrejeton'=>1,"modifench"=>3,"suppench"=>3,"modifprdt"=>3,"suppprdt"=>3,'modifinfo'=>1,'modiflogin'=>1,"winner"=>3);


if (!array_key_exists($_GET['action'],$actions)||!isset($_SESSION['user']['role'])&&$actions[$_GET['action']]>0||isset($_SESSION['user']['role'])&&$actions[$_GET['action']]>$_SESSION['user']['role'])
{
    $tpl="errAction.twig";
    $param=array();
}
else
    include('actions/'.$_GET['action'].".php");

if(isset($_SESSION['user']))$param['user']=$_SESSION['user'];
echo $twig->render($tpl,$param); 







?>
