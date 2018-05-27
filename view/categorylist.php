<html>
<head></head>

<body>

<table>
	<tr><td>Kategorier</td></tr>
	<?php

		foreach ($categories as $title => $category)
		{
			// we place the category title in the url
			echo '<tr><td><a href="index.php?category='.$category->title.'">'.$category->title.'</a></td></tr>';
		}
			echo '</br> Dette er forsiden</br></br>';
			echo '</br> Her vil nylig opplastede items ligge</br></br>';

	?>
</table>

</body>
</html>
