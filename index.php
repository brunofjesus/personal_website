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

require_once('backend/Initializer.php');

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
	 * @var Blog
	 */
    private $blog = null;

    /**
     * Index constructor.
     */
    public function __construct()
    {

        $pathInfo = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : "";//$_SERVER['REDIRECT_URL'];
        $params = preg_split('|/|', $pathInfo, -1, PREG_SPLIT_NO_EMPTY);

        $this->page = isset($params[0]) ? $params[0] : DEFAULT_PAGE;
        $this->articleName = isset($params[1]) ? $params[1] : null;

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
