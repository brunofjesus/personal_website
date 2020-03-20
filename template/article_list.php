<h1><a href="#">Notes</a></h1>
<ul>
    <?php
    $blog = Blog::getInstance();

    $articleList = $blog->retrieveArticleList();

    foreach ($articleList as $article):
        $title = $article->getTitle();
        $date = explode('_', $article->getFileName())[0];
        $link = $article->getLink();

        echo("<li>$date <a href=\"$link\">$title</a></li>");
    endforeach; ?>
</ul>
