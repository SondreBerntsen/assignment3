<?php
	include_once("../includes/header.inc.php");
?>



<head>
	<!-- Required meta tags -->
	<link rel="stylesheet" href="../styles/style.css">
</head>

<div class="container py-3">
    <div class="row">
        <div class="col-10 mx-auto">
          <div class="profileheader">
            <h2 class="mb-3 profileheading justify-content-left">Your profile</h2>
          </div>
            <ul class="nav nav-tabs small justify-content-end" role="tablist">
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#settings" role="tab">Settings</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#listings" role="tab">Listings</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#messages" role="tab">Messages</a></li>
            </ul>
            <div id="content" class="tab-content py-4">
                <div class="tab-pane active" id="settings" role="tabpanel">
                  <h4 class="mb-3">Change your settings</h2>
                    <!--

                    ROGNHILD COMING TRUE

                    -->
                </div>
                <div class="tab-pane" id="listings" role="tabpanel">
                  <h4 class="mb-3">Listings</h2>
                    <div class="useritem rounded">
                      <div class="row">
                        <div class="col-md-8 useritemdesc">
                          <div class="card-block">
                            <h5 class="card-title">Test title</h5>
                            <h6 class='card-subtitle mb-2 text-muted dateItem'></h6><br />
                            <p class="card-text">The nav-tabs above use `justify-content-end` to align all tabs on the right. Sriracha biodiesel taxidermy organic post-ironic, Intelligentsia salvia mustache 90's code editing brunch. Butcher polaroid VHS art party, hashtag Brooklyn deep v PBR narwhal sustainable mixtape swag wolf squid tote bag. Tote bag cronut
                                semiotics, raw denim deep v taxidermy messenger bag. Tofu YOLO Etsy, direct trade ethical Odd Future jean shorts paleo. Forage Shoreditch tousled aesthetic irony, street art organic Bushwick artisan cliche semiotics ugh synth chillwave
                                meditation. Shabby chic lomo plaid vinyl chambray Vice. Vice sustainable cardigan, Williamsburg master cleanse hella DIY 90's blog.</p>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="card-img-bottom float-right">
                            <img src="../resources/images/testimg.jpg" class="img-fluid imgItem" alt="Responsive image">
                          </div>
                          <button name="edit" type="submit" class="btn btn-info userbutton">Edit item</button>
                          <button name="deleteitem" type="submit" class="btn btn-outline-danger userbutton">Delete item</button>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="tab-pane" id="messages" role="tabpanel">
									<div class="row">
										<div class="col">
		                  <h4 class="mb-3">Messages</h2>
										</div>
										<div class="col">
											<h4 class="mb-3">Item in question</h4>
										</div>
									</div>
										<div class="row">

											<div class="col-3">
												<div class="card">
													<div class="card-block">
														<h6 class="card-title">Item title</h5>
														<h6 class='card-subtitle mb-2 text-muted dateItem'>Sellers name</h6>
													</div>
												</div>
											</div>
											<div class="col">
												<div class="messagecontainer">

														<div class="mymessage">
															<h6>Me</h6>
															<p>hello</p>
														</div>
														<div class="recipientmessage">
															<div class="recipientname">
																<h6>Ronny</h6>
															</div>
															<p>yo</p>
														</div>
														<div class="mymessage">
															<h6>Me</h6>
															<p>About that used condom?About that used condom?</p>
														</div>
											</div>
										</div>
                </div>
            </div>
        </div>
    </div>
</div>




<?php
	include_once("../includes/homeFooter.inc.php");
?>
