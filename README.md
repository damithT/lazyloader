# lazyloader
#### Simple Javascript PHP Lazy Loader (Ajax Loader)

This is a simple ajax loader which can be used when a user has more than enough data to view on the frontend.
As an example, if you have 10000 rows to show in dropdown or in a simple div, sometimes it may take a while to load the page
since the server is busy with rendering your html with all those data. So as a simple solution for that you can use a
lazy loader which runs by sending Ajax calls to the backend whenever you scroll down on a particular div or something.
Which will initially load few rows and  call the backend and retrieve the rest of the results whenever you reach the bottom
of the scroll. By meaning the rest it's not all the remainin data but a part of it and you can customize any number you want.

##### Basic Usage

###### <div id="rowList" style="height:200px;">
		<div id="rows" style="height:200px;overflow-y:scroll;margin-left:30%;">
				<?php include('getresult.php'); ?>
		</div>
</div>

You can use any height you want. Or may be the whole window.
Id's which were used in DIV's are important. So keep your eye on the javascript part when you change the id's.

The rest is simple and you can use any query language you want. 

```
$perPage = 15;
```
You can define the rows count per page in getresult.php

```
<input type="hidden" class="pagenumber" value="' . $page . '" /><input type="hidden" class="total-pages" value="' . $pages . '" />
```
Please make sure to insert this hidden field with anything you use.

You can use any loader image by replacing the loader.gif

Go through the rest of the files and you can easily modifiy as you want.

Thanks
