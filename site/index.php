<?php
/**
 * strang3quark website
 *
 * @author Bruno Jesus <bruno.fl.jesus@gmail.com>
 * @version 0.2
 * @copyright (C) 2015-2020 Bruno Jesus <bruno.fl.jesus@gmail.com>
 * @license GPL v2
 */

error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once('backend/Utils.php');
require_once('backend/config.php');

require_once __DIR__ . '/vendor/autoload.php';

use App\backend\Blog;
use App\backend\Context;

class Index
{

    /**
     * The page to load
     * @var string
     */
    private $page;

    /**
     * The article to load (only for notes)
     * @var string
     */
    private $articleName = null;


	/**
	 * The blog instance
	 * @var Blog|null
     */
    private ?Blog $blog = null;

    /**
     * Index constructor.
     */
    public function __construct()
    {

        $pathInfo = $_SERVER['PATH_INFO'] ?? "";
        $params = preg_split('|/|', $pathInfo, -1, PREG_SPLIT_NO_EMPTY);

        $this->page = $params[0] ?? DEFAULT_PAGE;
        $this->articleName = $params[1] ?? null;

		$this->blog = Blog::getInstance();

		Context::storeValue("page", $this->page);
	}

    public function render() {
		require_once('template/header.php');

		if ($this->page == 'notes') {
			$this->renderBlog();
		} else {
			$this->renderPage();
		}

		require_once('template/footer.php');
	}

	private function renderBlog() {
    	if (isset($this->articleName)) {
			$article = $this->blog->retrieveArticleFromFileName($this->articleName . ".md");

			if (isset($article)){
				echo($article->toHTML());
			} else { //article not found
				echo("NOT FOUND");
			}
		} else {
    		require_once('template/article_list.php');
		}
	}

	private function renderPage() {
    	$page = $this->page;

		if (file_exists("pages/$page.php")) {
            require_once("pages/$page.php");
		} else {
			echo("NOT FOUND"); //TODO: 404
		}
	}
}



$index = new Index();
$index->render();
