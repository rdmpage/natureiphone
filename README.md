# Nature iPhone app

#### Overview
This is a JQuery Mobile-based clone of [Nature's iPhone app](http://www.nature.com/mobileapps/) that runs in a web browser. For background on this project see [Viewing scientific articles on the iPad: cloning the Nature.com iPhone app using jQuery Mobile](http://iphylo.blogspot.com/2010/12/viewing-scientific-articles-on-ipad.html). There is also a [live demo](http://iphylo.org/~rpage/natureiphone/).

#### How it works
Nature ePub files comprise the article text in HTML, and the references, tables, and figure captions in separate XML files. Links between article text and these external files are represented by local links in the HTML file, e.g. 

`<a href="ref://b3">3</a>`

where ref://b3 corresponds to refence `<ref id="b1">` in the file references.xml. To handle these local links I rewrite them as Javascript calls. Each action (displaying and article, a reference, etc.) invokes a Javascript function that extracts the relevant item (HTML, XML fragment, image) and displays it. The page transitions are all made using jQuery Mobile.

#### Articles
Included with the code are two Open Access (Commons Attribution-NonCommercial-Share Alike 3.0 Unported License) articles from _Nature Communications_ in ePub format. These have been unzipped into separate folders, which the app reads to display the articles.

#### Installation
If you have a local webserver and PHP then you should be able to simply drop this project into a folder on your machine and point your browser at it.