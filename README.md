# brunojesus.pt
This is a mirror of my website at http://brunojesus.pt


## How to install

Just put the files on your server, you need a WebServer (I use Apache) and PHP5.

You need to change the variable $base_url in index.php to match your site url.

The static directory is where you put your static pages, you can access this pages by going to /index.php/pagename

The blog articles are located in article directory, they are written in [Markdown](http://daringfireball.net/projects/markdown/syntax), the conversion is done by [Parsedown](https://github.com/erusev/parsedown) (already included). The article list is automatically generated, you can see it in index.php/blog.

## Writing articles

The first line must be the title, then leave an empty line before the content.

```
Article Title

The article content
```

The article contents must be written using [markdown](http://daringfireball.net/projects/markdown/syntax).
