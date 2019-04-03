<div class="navbar navbar-inverse set-radius-zero" >
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar">

                    <img src="assets/img/librarymunti.png" />
                </a>

            </div>

            <div class="right-div">
                <a href="logout.php" class="btn btn-danger pull-right">LOGOUT</a>
            </div>
        </div>
    </div>
    <!-- LOGO HEADER END-->
    <section class="menu-section">
        <div class="container">
            <div class="row ">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            
                            <li>
                                <a href="dashboard.php" class="active">DASHBOARD</a>
                            </li>

                             <li>
                                <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Books 
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                
                                    <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                        
                                        <li role="presentation">
                                            <a role="menuitem" tabindex="-1" href="add-book.php">Add Book</a>
                                        </li>                   
                                    
                                        <li role="presentation">
                                            <a role="menuitem" tabindex="-1" href="add-material.php">Add Material</a>
                                        </li>
                                        
                                        <li role="presentation">
                                            <a role="menuitem" tabindex="-1" href="add-Copies.php">Add New Copy</a>
                                        </li> 

                                        <li role="presentation">
                                            <a role="menuitem" tabindex="-1" href="excel.php">Excel Upload</a>
                                        </li>
                                
                                    </ul>
                            </li>

                            <li>
                                <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Books List 
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                    <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                        
                                        <li role="presentation">
                                            <a role="menuitem" tabindex="-1" href="books-available.php">Available Books</a>
                                        </li>

                                        <li role="presentation">
                                            <a role="menuitem" tabindex="-1" href="books-unavailable.php">Unavailable Books</a>
                                        </li>

                                          <li role="presentation">
                                            <a role="menuitem" tabindex="-1" href="books-masterlist.php">Master List</a>
                                        </li>
                                        
                                    </ul>
                            </li>

                            <li>
                                <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Borrow Books 
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                
                                <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                    
                                    <li role="presentation">
                                        <a role="menuitem" tabindex="-1" href="issue-book.php">Issue Book</a>
                                    </li>
                                     
                                     <li role="presentation">
                                        <a role="menuitem" tabindex="-1" href="manage-issued-books.php">Manage Issued Books</a>
                                    </li>
                                
                                </ul>

                            </li>

                             <li>
                                <a href="transaction.php" class="active">Transaction Records</a>
                            </li>
							
                            <li>
								<a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Student Information 
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                    <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                        
                                        <li role="presentation">
                                            <a role="menuitem" tabindex="-1" href="add-Course.php">Add Course</a>
                                        </li>
                                        
                                        <li role="presentation">
                                            <a role="menuitem" tabindex="-1" href="add-YrLevel.php">Add Year Level</a>
                                        </li> 

								    </ul>
							 </li>

                             <li>
                                <a href="reg-students.php" class="active">Registered Students</a>
                            </li>

                            <li>
                                <a href="usermanual.pdf" class="active">User Guide</a>
                            </li>
					
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>	