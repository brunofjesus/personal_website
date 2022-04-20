Raspberry Pi Web Bookshelf

# [Raspberry PI Web Bookshelf](#) &mdash; 21 Apr, 2021

Until some weeks ago my Raspberry Pi "collection" consisted on a single Raspberry Pi 1 with 512MB of RAM from 2011, that changed recently, the Raspberry Pi 400 caught my eye and I decided to get one, it's a great little machine, in fact, I'm using it to write this article.

When looking through the official Raspberry OS I stumbled upon the **Bookshelf** app, I was amazed, I did not knew all that information was available for free! 

The application is great but then I noticed that the application is not available in other distro's repos, also, I would like to have that information acessible in a easier way, it would be great to be able to search the catalog on my smartphone, or on my other computers without installing stuff.

![Screenshot: Bookshelf](/article_files/20220420_rpiwebbookshelf/bookshelf.png)

I took a quick look at the [official bookshelf app on GitHub](https://github.com/raspberrypi-ui/bookshelf) and discovered that the catalog is being downloaded from a XML file, so it would be easier than I thought, I just need to download, parse and present that XML in a nice way on a website, and that's just what I did!

I decided to code the **Raspberry Pi Web Bookshelf** in Python, it's not a language that I usually use, and the code may not be pretty, but it does the job pretty well. You can access it at [https://bookshelf.brunojesus.pt](https://bookshelf.brunojesus.pt)

![Screenshot: Web Bookshelf](/article_files/20220420_rpiwebbookshelf/web-bookshelf.png)

If you dare to look at the code, you can find it [here](https://github.com/brunofjesus/rpi-web-bookshelf).

