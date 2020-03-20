<?php
/**
 * strang3quark website
 *
 * @author Bruno Jesus (aka strang3quark) <bruno.fl.jesus@gmail.com>
 * @version 0.1
 * @copyright (C) 2015-2016 Bruno Jesus (aka strang3quark) <bruno.fl.jesus@gmail.com>
 * @license GPL v2
 */

error_reporting(E_ALL);
ini_set('display_errors', '1');

/*Import Backend*/
require_once('backend/libs/Parsedown.php');
require_once('backend/utils.php');
require_once('backend/config.php');
require_once('backend/blog.php');
/*End Backend Import*/

//Process GET
$page = DEFAULT_PAGE; //the default page is the aboutme page
$article = 'index'; //the default article is the article_list
$pathinfo = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : "";//$_SERVER['REDIRECT_URL'];

$params = preg_split('|/|', $pathinfo, -1, PREG_SPLIT_NO_EMPTY);

if (isset($params[0])){
	$page=$params[0];
}
if (isset($params[1])){
	$article=$params[1];
}

require_once('template/header.php');

if ($page == 'notes'){
	$blog = new Blog(BASE_URL);
	if ($article == 'index'){
		require_once('template/article_list.php');
	}else{
		$articleContent = $blog->getArticle($article); //load the file
		$articleHTML = $blog->getArticleHTML($articleContent); //convert body to HTML
		if ($articleHTML !== false){
			echo($articleHTML);
		}else{ //article not found
			echo("NOT FOUND"); //TODO: 404
		}
	}
}else{
	if (file_exists('pages/'.$page.'.php')){
		require_once('pages/'.$page.'.php');
	}else{
		echo("NOT FOUND"); //TODO: 404
	}
}

require_once('template/footer.php');

?>
