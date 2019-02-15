




<div class="navbar navbar-inverse set-radius-zero" >
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" >

                    <img src="assets/img/librarymunti.png" />
                </a>

            </div>
			
<?php if($_SESSION['login'])
{
	
?> 

            <div class="right-div">
			<?php
	//Image
	$image =  $_FILES['image']['name'];
	$target = "../image/".basename($image);
	
	if(isset($_SESSION['image'])){
	echo "<img src='../image/". $_SESSION['image'] . "' >";
	}
	
  ?>
                <a href="logout.php" class="btn btn-danger pull-right">LOGOUT</a>
            </div>
            <?php }?>
        </div>
    </div>
	
	
	
	
    <!-- LOGO HEADER END-->
<?php if($_SESSION['login'])
{
?>    
<section class="menu-section">
        <div class="container">
            <div class="row ">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a href="dashboard.php" class="active">DASHBOARD</a></li>
                           
                          
   <li>
                                <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Account <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="my-profile.php">My Profile</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="change-password.php">Change Password</a></li>
                                    <!--<li role="presentation"><a role="menuitem" tabindex="-1" href="upload.php">Change Profile Picture</a></li>--->
                                </ul>
                            </li>
							<li><a href="search.php">Search Books</a></li>
                            <li><a href="issued-books.php">Borrowed Books</a></li>
                          

                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <?php } else { ?>
        <section class="menu-section">
        <div class="container">
            <div class="row ">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">                        
                          
							<li><a href="adminlogin.php">Admin Login</a></li>
                            <li><a href="signup.php">User Signup</a></li>
                            <li><a href="index.php">User Login</a></li>
							<li><a href="Searchbooks.php">Search Books</a></li>
                          

                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <?php } ?>