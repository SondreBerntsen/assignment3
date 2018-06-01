<?php
include_once '../includes/header.inc.php';
 ?>

	<!-- sidebar for categories -->
	<div class="sidenav">
		<ul>
			<li>
				<h4>
					<strong>Kategorier</strong>
				</h4>
			</li>
			<?php
			// for every category in categories
			foreach ($categories as $title => $category)
			{
			// we place the category title in the url
			echo '<li> <a href="index.php?category='.$category->title.'">'.$category->title.'</a></li>';
			}
			?>
		</ul>
	</div>

	<?php

	echo '</br> Dette er forsiden</br></br>';
	echo '</br> Her vil nylig opplastede items ligge</br></br>';

	include_once '../includes/footer.inc.php'
	?>
