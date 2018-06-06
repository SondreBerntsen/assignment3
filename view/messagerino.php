<?php
	include_once("../includes/header.inc.php");
	include_once("../includes/homeFooter.inc.php");
?>



<head>
	<!-- Required meta tags -->
	<link rel="stylesheet" href="../styles/style.css">
</head>

<div class="container py-3">
    <div class="row">
        <div class="col-10 mx-auto">
          <div class="profileheader">
            <h2 class="mb-3 profileheading justify-content-left">Messages</h2>
          </div>
										<div class="row">
											<!-- message titlecards -->
											<div class="col-3">
												<ul class="nav nav-tabs small" role="tablist">
														<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#mymessages" role="tab">My items</a></li>
														<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#othermessages" role="tab">Other items</a></li>
												</ul>
												<div id="content" class="tab-content py-4">
													<div class="tab-pane active" id="mymessages" role="tabpanel">
														<div class="card">
															<div class="card-block">
																<h6 class="card-title">Item title</h5>
																<h6 class='card-subtitle mb-2 text-muted dateItem'>Item in interested in</h6>
															</div>
														</div>
													</div>

													<div class="tab-pane" id="othermessages" role="tabpanel">
														<div class="card">
															<div class="card-block">
																<h6 class="card-title">Item title</h5>
																<h6 class='card-subtitle mb-2 text-muted dateItem'>Item im giving away</h6>
															</div>
														</div>
													</div>
												</div>
											</div>

											<!-- messagethreadcontainer -->
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




<?php
	include_once("../includes/homeFooter.inc.php");
?>
