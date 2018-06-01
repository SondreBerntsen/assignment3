<?php
include_once '../includes/header.inc.php';
 ?>

	<!-- sidebar for categories -->
	<div class="container">
  <div class="row">
    <div class="col-sm-3">
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
    </div>
    <div class="col">
			<div class="card-group">
			  <div class="card">
			    <img class="card-img-top" src="../resources/images/testimg.jpg" alt="Card image cap">
			    <div class="card-body">
			      <h5 class="card-title">Card title</h5>
			      <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam gravida dapibus vestibulum.</p>
			      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
			    </div>
				  </div>
				  <div class="card">
				    <img class="card-img-top" src="../resources/images/testimg.jpg" alt="Card image cap">
				    <div class="card-body">
				      <h5 class="card-title">Card title</h5>
				      <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam gravida dapibus vestibulum.</p>
				      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
				    </div>
				  </div>
				  <div class="card">
				    <img class="card-img-top" src="../resources/images/testimg.jpg" alt="Card image cap">
				    <div class="card-body">
				      <h5 class="card-title">Card title</h5>
				      <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam gravida dapibus vestibulum.</p>
				      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
				    </div>
				  </div>
			</div>
    </div>
  </div>
</div>


	<?php

	echo '</br> Dette er forsiden</br></br>';
	echo '</br> Her vil nylig opplastede items ligge</br></br>';

	include_once '../includes/footer.inc.php'
	?>
