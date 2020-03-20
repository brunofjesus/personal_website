<h1><a href="#">Notes</a></h1>
<ul>
<?php $articleList = $blog->getArticleList();
foreach ($articleList as $articleFile):
	$title = $blog->getTitle($blog->getArticle($articleFile));
	$date = explode('_', $articleFile)[0];
	$link = $blog->getArticleLink($articleFile);
?>
	<li><?=$date;?> - <a href="<?=$link;?>"><?=$title;?></a></li>
<?php endforeach;?>
</ul>
