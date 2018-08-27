<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
	
<link rel="stylesheet" href="project.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="project.js"></script>
</head>
<body>
	<div id="mainContainer">
        <div class="screenDisabler"></div>
		<ul id="sideNavBarMenu" class="sidebar">
			<li class="menuItem active" data-show="companyView" style="border-bottom: 2px solid #273744;">
				<i class="navIcons far fa-building"></i>
				<label class="navLabel Company">Transerve</label>
			</li>
			<li class="menuItem" data-show="userView">
				<i class="navIcons fas fa-user-tie"></i>
				<label class="navLabel userName">Rohan M.</label>
				<label class="navLabel companyName"><i class="far fa-building" style="margin-right: 5px"></i>XYZ Company</label>
			</li>
			<li class="menuItem" data-show="groupView">
				<i class="navIcons far fa-folder-open"></i>
				<label class="navLabel">Groups</label>
			</li>
			<li class="menuItem" data-show="projectView">
				<i class="navIcons fas fa-folder-open"></i>
				<label class="navLabel">Projects</label>
			</li>
			<li class="menuItem" data-show="formView">
				<i class="navIcons far fa-file-alt"></i>
				<label class="navLabel">Forms</label>
			</li>
			<li class="menuItem" data-show="settingView">
				<i class="navIcons fas fa-cog"></i>
				<label class="navLabel">Settings</label>
			</li>
			<li class="menuItem" data-show="mapDataView">
				<i class="navIcons fas fa-map-marker-alt"></i>
				<label class="navLabel">Map & Data View</label>
			</li>
		</ul>
		<div id="sideNavBarContents">
            <div id="preLoader" class="navContainer" style="display: none;text-align: center;background: #2a80b9;">
				<img src="Preloader.gif"/>
			</div>
			<div id="companyView" class="navContainer" style="display: block">
				<div class="navSection">
					<h3 class="navHeader">Transerve</h3>
				</div>
                <label>Click on projects to proceed.</label>
			</div>
			<div id="userView" class="navContainer">
				<div class="navSection">
					<h3 class="navHeader">User</h3>
				</div>
			</div>
			<div id="groupView" class="navContainer">
				<div class="navSection">
					<h3 class="navHeader">Groups</h3>
				</div>
			</div>
			<div id="projectView" class="navContainer">
				<div class="navSection">
					<h3 class="navHeader" style="position: relative;">
						Projects
						<label class="projectCount">(23)</label>
						
						<button class="showCreateProject">Create New Project</button>
						
						<div class="iconContainer">
							<span class="iconSection refresh" style="cursor: pointer;">
								<i class="icon fas fa-sync-alt"></i>
								<label style="cursor: pointer;">Refresh</label>
							</span>
							<span class="iconSection filter" style="cursor: pointer;">
								<i class="icon fas fa-filter"></i>
								<div id="selectFilter" class="singleSelectDropdown selectDropdown" style="display: inline-block">
									<div class="select">  
										<label class="selectedItems inputText" data-default="Default" style="cursor: pointer;">
											Filter
										</label>  
										<i class="fas fa-angle-down downArrow"></i>
									</div>
									<ul class="options" style="display:none;">
										<li>
											<label class="item">Date</label>
										</li>
									</ul>
								</div>
							</span>
							<span class="iconSection search">
								<i class="icon fas fa-search searchProject" style="cursor: pointer;"></i>
								<input class="inputText" type="text" name="name" placeholder="Search Project Here..." autocomplete="off"/>
							</span>
						</div>					
					</h3>
					<div id="" class="navContent">
						<!-- start of project list -->
						<div id="projectList">
                            <div class="noRecordsFoundMsg" style="display:none;">No Records match search criteria.</div>
							<div class="list">
								<div class="item">
									<div class="title">
										<label class="name">Project School</label>
										<i class="fas fa-ellipsis-v ellipseIcon"></i>
									</div>
									<div class="content">
										<div class="contentRow1">
											<label class="formCount">20</label>
											<label class="formLabel">Number of Forms</label>
										</div>
										<div class="contentRow2">
											<label class="userCount">20</label>
											<div class="userImgGallery">
												<img class="userImg img1" src="5terre.jpg"  >
												<img class="userImg img2" src="img_forest.jpg"  >
												<img class="userImg img3" src="img_lights.jpg"  >
												<div class="userImg img4" >
													<p class="ImgCount" style="margin: 8px 7px;">+ 4</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<label class="hyperLink viewAllProjects">View All Projects</label>
						</div>
						<!-- end of project list -->
						<!-- start of project details -->
						<div id="projectDetails">
							<h5 class="name">
                                <span class="projectName">Project School</span>
								<i class="fas fa-pencil-alt pencilIcon"></i>
								<button class="blueButton addToGroup"> + Add to Group</button>
							</h5>
							<label class="lastUpdatedLabel">Last Updated:</label>
							<label class="lastUpdatedLabel lastUpdated">05 Jan</label>
							<div style="height:5px;"></div>
							<label class="createdOnLabel">Created On:</label>
							<label class="createdOnLabel createdOn">May 25, 2018</label>

							<div class="description" style="margin-top: 3px;">
								Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Dignissim enim sit amet venenatis urna cursus eget nunc scelerisque. Tellus molestie nunc non blandit massa enim nec dui nunc. Eget felis eget nunc lobortis mattis. Molestie a iaculis at erat pellentesque. Mattis nunc sed blandit libero volutpat sed cras ornare arcu.
							</div>
							<label class="hyperLink viewMore">View more...</label>
							<div style="margin: 17px 0;border: 3px solid #f1f7f5;"></div>
						</div>
						<!-- end of project details -->
						<!-- start of form list -->
						<div id="formList">
							<div class="tabHeader">
								<div class="tabMenuOption active" data-show="tabFormsView">Forms</div>
								<div class="tabMenuOption" data-show="tabUsersView">Users</div>
							</div>
							<div class="tabContent">
								<div id="tabFormsView" class="tabContainer" style="display: block">
									<div style="position: relative; padding: 25px 0 25px 25px;">
										<button class="blueButton addNewFormToProject">Add New Form To Project <i class="fas fa-angle-down downArrow"></i></button>
										<span class="iconSection search">
											<i class="icon fas fa-search searchForm" style="cursor: pointer;"></i>
											<input class="inputText" type="text" name="searchName" placeholder="Search Forms Here..." autocomplete="off"/>
										</span>
									</div>
									<div style="padding: 0 0 25px 25px;">
                                        <div class="iconContainer">
                                            <span class="iconSection selectAll"> 
                                                <input type="checkbox" name="selectAll" />
                                                <label>Select All</label>
                                            </span>
                                            <span class="iconSection refresh" style="cursor: pointer;">
                                                <i class="icon fas fa-sync-alt"></i>
                                                <label style="cursor: pointer;">Refresh</label>
                                            </span>
                                            <span class="iconSection filter" style="cursor: pointer;">
                                                <i class="icon fas fa-filter"></i>
                                                <div id="selectFilter" class="singleSelectDropdown selectDropdown" style="display: inline-block;width: 60px">
                                                    <div class="select">  
                                                        <label class="selectedItems inputText" data-default="Default" style="cursor: pointer;">
                                                            Filter
                                                        </label>  
                                                        <i class="fas fa-angle-down downArrow" style="float:right"></i>
                                                    </div>
                                                    <ul class="options" style="display:none;">
                                                        <li>
                                                            <label class="item">Shape</label>
                                                        </li>
                                                        <li>
                                                            <label class="item">Reminder</label>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </span>
                                        </div>
                                        <label class="hyperLink viewAll" style="float:right;">View All</label>
                                    </div>
									<div class="noRecordsMsg" style="display: none;">No forms Found...</div>
									<table id="formsTable" style="width:815px;">
										<thead>
											<tr>
												<th class="checkbox"></th>
												<th class="form">Forms</th>
												<th class="shape">Shape</th>
												<th class="clock"></th>
												<th class="reminder">Reminder</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td class="checkbox"><input type="checkbox" name="formCheck"/></td>
												<td class="form">AAA</td>
												<td class="shape">Point</td>
												<td class="clock"><i class="far fa-clock"></i></td>
												<td class="reminder">
													<div id="selectReminder" class="singleSelectDropdown selectDropdown">
														<div class="select">  
															<span class="selectedItems inputText" data-default="Default">
																Daily
															</span>  
															<i class="fas fa-angle-down downArrow"></i>
														</div>
														<ul class="options" style="display:none;">
															<li>
																<label class="item">Not Set</label>
															</li>
															<li>
																<label class="item">Daily</label>
															</li>
															<li>
																<label class="item">Weekly</label>
															</li>
														</ul>
													</div>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
								<div id="tabUsersView" class="tabContainer" style="display: none">USERS</div>
							</div>
						</div> 
						<!-- end of form list -->
					</div>
			</div>
			</div>
			<div id="createNewProject" class="navContainer">
				<div class="navSection">
					<h3 class="navHeader">Create Project</h3>
					<div id="addProject" class="navContent grid-container">
						<!-- name -->
						<div class="item1">
							<div class="fieldSection">
								<label class="labelText">Name</label>
								<input class="inputText" type="text" name="name" placeholder="Project School" autocomplete="off"/>
							     <span class="errorMsg nameErr">Enter valid project name.</span>
                            </div>
						</div>

						<div class="item2"><!-- 2 --></div> <!-- blank div -->

						<!-- description -->
						<div class="item3">
							<div class="fieldSection">
								<label class="labelText">Discription</label>
								<textarea class="inputText" name="description" rows="4" placeholder="Description (2000 characters)"></textarea>
							     <span class="errorMsg descriptionErr">Enter valid description.</span>
							</div>
						</div>  

						<!-- select forms -->
						<div class="item4">
							<div class="fieldSection">
								<label class="labelText">Select Form (s)</label>
								<div id="selectForms" class="mutliSelectDropdown selectDropdown">
									<div class="select">  
										<p class="selectedItems inputText" data-default="Choose one or multiple form(s)">
											Choose one or multiple form(s)
										</p>  
										<i class="fas fa-angle-down downArrow"></i>
									</div>
									<ul class="options" style="display:none;">
									<li>
										<input type="checkbox" value="1" />
										<label class="item">Form XYZ</label>
									</li>
									<li>
										<input type="checkbox" value="2" />
										<label class="item">Form MNO</label>

									</li>
									<li>
										<input type="checkbox" value="3" />
										<label class="item">Form XYW</label>

									</li>
									<li>
										<input type="checkbox" value="4" /> 
										<label class="item">Form PQR</label>

									</li>
									<li>
										<input type="checkbox" value="5" />
										<label class="item">Form ABC</label>

									</li>
									<li>
										<input type="checkbox" value="6" />
										<label class="item">Form QWERTY</label>
									</li>
								</ul>
								</div>
                                <div></div>
                                <span class="errorMsg formsErr">Select one or more valid option.</span>
							</div>
						</div>

						<!-- set reminder -->
						<div class="item5"> 
							<div class="fieldSection">
								<label class="labelText">Reminder</label>
								<div id="selectReminder" class="singleSelectDropdown selectDropdown">
									<div class="select">  
										<p class="selectedItems inputText" data-default="Default">
											Set Reminder
										</p>  
										<i class="fas fa-angle-down downArrow"></i>
									</div>
									<ul class="options" style="display:none;">
										<li>
											<label class="item">Not Set</label>
										</li>
										<li>
											<label class="item">Daily</label>
										</li>
										<li>
											<label class="item">Weekly</label>
										</li>
									</ul>
								</div>
                                <div></div>
                                <span class="errorMsg reminderErr">Select valid option.</span>

							</div>
						</div>

						<div class="item6"><!-- 6 --></div> <!-- blank div -->

						<!-- assign users -->
						<div class="item7">
							<div class="fieldSection">
								<label class="labelText">Assign User(s)</label>
								<div id="selectUsers" class="mutliSelectDropdown selectDropdown">
									<div class="select">  
										<p class="selectedItems inputText" data-default="Choose one or multiple form(s)">
											Choose one or multiple users(s)
										</p>  
										<i class="fas fa-angle-down downArrow"></i>
									</div>
									<ul class="options" style="display:none;">
									<li>
										<input type="checkbox" value="1" />
										<label class="item">Virat Kohli</label>
									</li>
									<li>
										<input type="checkbox" value="2" />
										<label class="item">Suresh Raina</label>
									</li>
									<li>
										<input type="checkbox" value="3" />
										<label class="item">Ajinkya Rahane</label>
									</li>
									<li>
										<input type="checkbox" value="4" /> 
										<label class="item">MS Dhoni</label>
									</li>
								</ul>
								</div>
                                <div></div>
                                <span class="errorMsg usersErr">Select one or more valid option.</span>

							</div>
						</div>

						<div class="item8"><!-- 8 --></div> <!-- blank div -->
						<div class="item9"><!-- 9 --></div> <!-- blank div -->

						<!-- select symbol -->
						<div class="item10">
							<div class="fieldSection">
								<label class="labelText">Symbol</label>
								<div id="selectSymbol" class="singleSelectDropdown selectDropdown">
									<div class="select">  
										<p class="selectedItems inputText" data-default="Default">
											Default
										</p>  
										<i class="fas fa-angle-down downArrow"></i>
									</div>
									<ul class="options" style="display:none;">
										<li>
											<label class="item">Point</label>
										</li>
										<li>
											<label class="item">Polygon</label>
										</li>
									</ul>
								</div>
                                <div></div>
                                <span class="errorMsg symbolErr">Select valid option.</span>

                            </div>
						</div>

						<div class="item11"><!--11--></div> <!-- blank div -->
						<div class="item12"><!--12--></div> <!-- blank div -->

						<div class="item13">
							<button class="cancel">Cancel</button>	
							<button class="createProject">Create Project</button>	
						</div> 
						<div class="item14">
							<span class="processingMsg" style="opacity:0;">Processing Please Wait...</span>
							<span class="successMsg" style="opacity:0;">New project is created Successfully.</span>
							<div class="iconContainer">
								<i class="faIcon fas fa-th"></i>
								<i class="faIcon fas fa-angle-down downArrow" style="margin-right: 15px; font-size: 0.6em;"></i>
								<span style="margin-right: 15px;">	
									<i class="faIcon far fa-comment"></i>
									<label>3 Comments </label>
								</span>	
								<i class="far fa-toggle-off" style="font-weight: bold;"></i>
								<label>off</label>
							</div>
						</div> 
					</div>
				</div>
			</div>
			<div id="formView" class="navContainer">
				<div class="navSection">
					<h3 class="navHeader">Forms</h3>
				</div>
			</div>
			<div id="settingView" class="navContainer">
				<div class="navSection">
					<h3 class="navHeader">Settings</h3>
				</div>
			</div>
			<div id="mapDataView" class="navContainer">
				<div class="navSection">
					<h3 class="navHeader">Map &amp; Data view</h3>
				</div>
			</div>
		</div>
    </div>	
	
	<div id="dummy" style="display:none;"></div>
</body>
</html>
