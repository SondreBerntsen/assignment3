
    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav" id="listOfCategories"></ul>
            </ul>
        </div>
        <a href="#menu-toggle" class="btn btn-info" id="menu-toggle">Categories</a>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container">
            <div class="row">
              <div class="col">
                <div id="submitButton"></div>
          			<section id="listOfItems">
          			</section>
              </div>
            </div>
          </div>

          <div class="tmplContainer">
          	<a id="categoryTmpl"><li></li></a>
          </div>
        </div>

        <!-- /#page-content-wrapper -->

    </div>
    <script src="js/home.js"></script>
    <!-- /#wrapper -->

    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
