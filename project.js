$(document).ready(function () {
        
    
		//click handlers for navigation menu bar 
		$('#sideNavBarMenu .menuItem').click(function () {
			var contendDivId = $(this).attr('data-show');
			$('#sideNavBarMenu .menuItem.active').removeClass('active');
			
			$(this).addClass('active');
            
			$('#sideNavBarContents .navContainer').hide();
			
            
            switch (contendDivId) {
                case 'projectView': 
                    $('#sideNavBarMenu .menuItem').addClass('disableElement');
                    $('#sideNavBarContents #preLoader').show();
                    getProjectData();
                    break;
                default: 
                    $('#sideNavBarContents #' + contendDivId).show();
            }
		});
		
		//on click of create new project, show create new project tab and hide project dashboard
		$('#projectView .showCreateProject').click(function () {
			$('#projectView').hide();
			$('#createNewProject').show();
		});
		
		$('#projectView .showCreateProject').click(function () {
			$('#projectView').hide();
			$('#createNewProject').show();
		});
		
		/* start of create new project click handlers */
		$('#createNewProject .cancel').click(function () {
			$('#createNewProject').hide();
			$('#projectView').show();
            resetCreateNewProjectForm();
		});
	
		$('#createNewProject button.createProject').click(function () {
			var isValid = true;
			var obj = {};
			//client side validation
			var name = $('#addProject [name=name]').val().trim();
            var nameRegExp = /^[a-zA-Z0-9 ]{1,30}$/;
			if (name == '' || !nameRegExp.test(name)) {
				$('#addProject .nameErr').animate({opacity:1});
				isValid = false;
			}
			else{
                $('#addProject .nameErr').animate({opacity:0});
                obj.name = name;
            }
            
			var description = $('#addProject [name=description]').val().trim();
            var descRegExp = /^[a-zA-Z0-9 ,.-_]{1,2000}$/;
            
			if (description == '' || !descRegExp.test(name)) {
				$('#addProject .descriptionErr').animate({opacity:1});
				isValid = false;
			}
			else {
                $('#addProject .descriptionErr').animate({opacity:0});
                obj.description = description;
            }
            
			if (typeof $('#selectForms .selectedItems').attr('data-valid') == 'undefined') {
				$('#addProject .formsErr').animate({opacity:1});
				isValid = false;
			}
			else {
                $('#addProject .formsErr').animate({opacity:0});
                obj.forms = $('#selectForms .selectedItems').text();
            }
            
			if (typeof $('#selectReminder .selectedItems').attr('data-valid') == 'undefined') {
				$('#addProject .reminderErr').animate({opacity:1});
				isValid = false;
			}
			else {
				$('#addProject .reminderErr').animate({opacity:0});
                obj.reminder = $('#selectReminder .selectedItems').text();
            }
            
			if (typeof $('#selectUsers .selectedItems').attr('data-valid') == 'undefined') {
				$('#addProject .usersErr').animate({opacity:1});
				isValid = false;
			}
			else {				
                $('#addProject .usersErr').animate({opacity:0});
                obj.users = $('#selectUsers .selectedItems').text();
            }
            
			if (typeof $('#selectSymbol .selectedItems').attr('data-valid') == 'undefined') {
				$('#addProject .symbolErr').animate({opacity:1});
				isValid = false;
			}
			else {
                $('#addProject .symbolErr').animate({opacity:0});
                obj.symbol = $('#selectSymbol .selectedItems').text();
            }
            
			if (!isValid)
				return;
			
			var d = new Date();
			var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
			var month = months[d.getMonth()];
			var date = d.getDate();
			var year = d.getFullYear();
			if (date < 10)
				date = "0" + date;
			
			obj.lastupdated = date + " " + month;
			obj.createdon = month + " " + date + ", " + year;
			
			obj.formsubmitted = '20';
			obj.total = '08';
			obj.count = '04';
			obj.profile = JSON.stringify([1, 2, 3]);
			
			//insert project record in the data base
			
            
            //show processing
            $('#addProject .processingMsg').animate({opacity:1});
            $('.screenDisabler').show();
			
			var dbParam = JSON.stringify(obj);
			
			var xmlhttp = new XMLHttpRequest();
			 xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					$('#dummy').append(this.responseText);
//					alert(this.responseText);
//					 myObj = JSON.parse(this.responseText);
//					for (x in myObj) {
//						 txt += myObj[x].name + "<br>";
//					}
//					document.getElementById("demo").innerHTML = txt;
				}
			};
			 xmlhttp.open("POST", "createNewProject.php", true);
			 xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			 xmlhttp.send("x=" + dbParam);
		});
		/* end of create new project click handlers */
		
		//on click of select show dropdown menu
		$(document).on('click', '.selectDropdown .select', function () {
            
            var selectDropdown = $(this).closest('.selectDropdown');
            
            
            
			var divId = '#' + $(selectDropdown).attr('id');
            
            
            //close any other open dropdown if any which is not the clicked one.
            $('.selectDropdown.active:not(' + divId + ') .options').slideUp();
            $('.selectDropdown.active:not(' + divId + ')').removeClass('active');
            
            if ($(selectDropdown).hasClass('active')) {
                $(selectDropdown).removeClass('active');
                $('.selectDropdown' + divId + ' .options').slideUp();
                return;
            }
            
            $(selectDropdown).addClass('active');
            $('.selectDropdown' + divId + ' .options').slideDown();

			//$('.selectDropdown' + divId + ' .options').slideToggle();
		});
    
        $(document).on('click', function(e) {
			var $clicked = $(e.target);
			if (!$clicked.parents().hasClass('selectDropdown active'))  {
				$('.selectDropdown.active .options').slideUp();
                $('.selectDropdown.active').removeClass('active');
            }
		});
       
	
		
		$(document).on('change', '.mutliSelectDropdown [type="checkbox"]', function(e) {
			var divId = '#' + $(this).closest('.mutliSelectDropdown').attr('id');
			
			var countChecked = $('.mutliSelectDropdown' + divId + ' [type="checkbox"]').filter(':checked').length;
			var countAll = $('.mutliSelectDropdown' + divId + ' [type="checkbox"]').length;
			
			var selectedOption = $(this).siblings('.item').text();
			
			if($(this).is(':checked')) {
				//if none of items are selected then set the selected box to empty and append selected items
				if (countChecked == 1) 
					$('.mutliSelectDropdown' + divId + ' .selectedItems').text('');
				
				if (countChecked < countAll)
					selectedOption += ', ';
				
				$('.mutliSelectDropdown' + divId + ' .selectedItems').append(selectedOption).attr('data-valid', true);
				return;
			}
			
			//remove the previously selected item
			var selectedItems = $('.mutliSelectDropdown' + divId + ' .selectedItems').text();
			var newOptions = selectedItems.replace(selectedOption + ', ', '');
			
			if (selectedItems == newOptions) 
				newOptions = selectedItems.replace(', ' + selectedOption, '');
			
			if(!countChecked) {
				newOptions = $('.mutliSelectDropdown' + divId + ' .selectedItems').attr('data-default');
				$('.mutliSelectDropdown' + divId + ' .selectedItems').removeAttr('data-valid');
			}
			
			$('.mutliSelectDropdown' + divId + ' .selectedItems').text(newOptions);
		});
		
		$(document).on('click', '.singleSelectDropdown li', function(e) {
			var divId = '#' + $(this).closest('.singleSelectDropdown').attr('id');
			
			var newOption = $(this).find('.item').text();
			$('.singleSelectDropdown' + divId + ' .selectedItems').text(newOption).attr('data-valid', true);
			$('.singleSelectDropdown' + divId + ' .options').slideUp();
		});

		
		
		
		/*Start of search project click handler*/
		$('#projectView .searchProject').click(function () {
			searchProject();
		});
    
        /*Start of search project click handler*/
		$('#projectView .search [name=name]').keyup(function () {
			searchProject();
		});
    
        function searchProject () {
            var searchStr = $('#projectView .search input[name=name]').val();
			
			if (searchStr == "") {
                $('#projectView .noRecordsFoundMsg').hide();
                $('#projectList .list .item').removeClass('hideForSearch');
				return;
            }
            
            var patt = new RegExp(searchStr, "i");
            //iterate the project list to show only these projects
            $('#projectList .list .item').each(function () {
                var name = $(this).find('.name').text();
                
                var pos = name.search(patt);
                if (pos == -1) {
                    $(this).addClass('hideForSearch');
                    var totalCount = $('#projectList .list .item').length;
                    var hiddenCount = $('#projectList .list .item.hideForSearch').length;
                    if (totalCount == hiddenCount)
                        $('#projectView .noRecordsFoundMsg').show();
                }
                else {
                    $(this).removeClass('hideForSearch');
                     $('#projectView .noRecordsFoundMsg').hide();
                }
            });
        }
        
        //show project info on click of card
        $(document).on('click', '#projectList .list .item', function () {
            var pid = $(this).attr('data-id');
            $('#projectList .list .item.active').removeClass('active');
            $(this).addClass('active');
            //project
            $('#projectDetails .projectName').text(__global__projects[pid].name);
            $('#projectDetails .lastUpdated').text(__global__projects[pid].lastupdated);
            $('#projectDetails .createdOn').text(__global__projects[pid].createdon);
            $('#projectDetails .description').text(__global__projects[pid].description);
        });
		/*End of search project click handler*/
		
		/* start of click hander for form user tabs*/
		$('#formList .tabMenuOption').click(function () {
			var contendDivId = $(this).attr('data-show');
			$('#formList .tabMenuOption.active').removeClass('active');
			$(this).addClass('active');
			$('#formList .tabContainer').hide();
			$('#formList #' + contendDivId).show();
		});	
		/* end of  click hander for form user tabs*/
	
		/* start of create new project form*/
        function getProjectData () {
            var obj = {};
            var dbParam = JSON.stringify(obj);
			var xmlhttp = new XMLHttpRequest();
			 xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
                    data = JSON.parse(this.responseText);
                    //console.log(data);
                    buildProjectList(data.projects, data.users);
                    buildFormsTable(data.forms);
                    
                    var contendDivId = $('#sideNavBarMenu .menuItem.active').attr('data-show');
                    $('#sideNavBarContents #preLoader').hide(function () {
                        $('#sideNavBarContents #' + contendDivId).show();
                        $('#sideNavBarMenu .menuItem').removeClass('disableElement');

                    });
                    
				}
			};
			 xmlhttp.open("POST", "getProjectData.php", true);
			 xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			 xmlhttp.send("x=" + dbParam);

        }
		
		/* end of create new project form*/
    
        function buildProjectList (projects, users) {
            var listHtml = '';
            __global__projects = {};
            //users = {};
            //show no records found msg
            if (projects.length == 0) {
                listHtml = "No Recods Found";
            }
            else for (var j = 0; j < projects.length; j++) {
                
                    __global__projects[projects[j].id] = {
                        name: projects[j].name,
                        description: projects[j].description,
                        createdon: projects[j].createdon,
                        lastupdated: projects[j].lastupdated,
                    }
                
                	var rowHtml = '<div class="item" data-id="' + projects[j].id + '">' + 
                                   '<div class="title">' +
                                   '<label class="name">' + projects[j].name + '</label>' + 
                                   '<i class="fas fa-ellipsis-v ellipseIcon"></i>' +
                                    '</div>';

                    rowHtml += '<div class="content">' +
                                '<div class="contentRow1">' +
                                '<label class="formCount">' + projects[j].formsubmitted + '</label>' +
                                '<label class="formLabel">Number of Forms</label>' +
                                '</div>' +
                                '<div class="contentRow2">' +
                                '<label class="userCount">' + projects[j].total + '</label>';

                    var imgGallaryHtml = '<div class="userImgGallery">';
                
                    var profile = JSON.parse(projects[j].profile);
                    var length  = profile.length;
                
                    if (length > 3)
                        length = 3;
                
                    for (var i = 0; i < length; i++) {
                        var alt = users[i].firstName + '' + users[i].lastName;
                        imgGallaryHtml += '<img class="userImg img' + i + '" src="' + users[i].imageURL +'" alt="' + alt  + '" >'
                    }

                    imgGallaryHtml += '<div class="userImg img3">' +
                                        '<p class="ImgCount" style="margin: 8px 7px;">+ ' + projects[j].count + '</p>' +
                                        '</div>' +
                                        '</div>'; //end of user img gallary

                    rowHtml += imgGallaryHtml;
                    rowHtml += '</div>' + //end of row 2
                                '</div>' + //end of content
                                '</div>'; //end of item
                        
                    listHtml += rowHtml;
            } //end of for Loop
            
            //append list div to project list div
            $('#projectList .list').html(listHtml);
            
            //project
            var pid = projects[0].id;
            $('#projectDetails .projectName').text(__global__projects[pid].name);
            $('#projectDetails .lastUpdated').text(__global__projects[pid].lastupdated);
            $('#projectDetails .createdOn').text(__global__projects[pid].createdon);
            $('#projectDetails .description').text(__global__projects[pid].description);
            $('#projectList .list .item[data-id=' + pid + ']').addClass('active');
        }
            
        function buildFormsTable (forms) {
            var tableHtml = '';
            for (var i = 0; i < forms.length; i++) {
                tableHtml += '<tr data-id="' + forms[i].id + '">' +
                                '<td class="checkbox"><input type="checkbox" name="formCheck"/></td>' +
                                '<td class="form">' + forms[i].name + '</td>' +
                                '<td class="shape">' + forms[i].shape + '</td>' +
                                '<td class="clock"><i class="far fa-clock"></i></td>' +
                                '<td class="reminder">' +
                                    '<div id="selectReminder' + i + '" class="singleSelectDropdown selectDropdown">' +
                                        '<div class="select">' + 
                                            '<span class="selectedItems inputText" data-default="Default">' +
                                                'Not set' +
                                            '</span>' +  
                                            '<i class="fas fa-angle-down downArrow" style="margin-left: 5px;"></i>' +
                                        '</div>' +
                                        '<ul class="options" style="display:none;">' +
                                            '<li><label class="item">Not Set</label></li>' +
                                            '<li><label class="item">Daily</label></li>' +
                                            '<li><label class="item">Weekly</label></li>' +
                                        '</ul>' +
                                    '</div>' +
                                '</td>' +
                            '</tr>';
            }
            
            //append table body html to formstable's body
            $('#formList #formsTable tbody').html(tableHtml);  
        }
    
        /*start form list click handlers*/
        $('#formList [name=selectAll]').on('change', function () {
            if($(this).is(':checked')) 
                $('#formList table [name=formCheck]').attr('checked', true);
            else
                $('#formList table [name=formCheck]').attr('checked', false);
        })
    
        //search in form listing 
        /*Start of search project click handler*/
        $('#formList .searchForm').click(function () {
            searchForm();
        });

        /*Start of search project click handler*/
        $('#formList .search [name=searchName]').keyup(function () {
            searchForm();
        });

        function searchForm () {
                var searchStr = $('#formList .search input[name=searchName]').val();

                if (searchStr == "") {
                    $('#formList #formsTable .NoRecordsFoundMsg').remove();
                    $('#formList #formsTable tbody tr').removeClass('hideForSearch');
                    return;
                }

                var patt = new RegExp(searchStr, "i");
                //iterate the project list to show only these projects
                $('#formList #formsTable tbody tr').each(function () {
                    var name = $(this).find('.form').text();

                    var pos = name.search(patt);
                    if (pos == -1) {
                        $(this).addClass('hideForSearch');
                        var totalCount = $('#formList #formsTable tbody tr').length;
                        var hiddenCount = $('#formList #formsTable tbody tr.hideForSearch').length;
                        if (totalCount == hiddenCount)
                            $('#formList #formsTable tbody').append('<tr class="NoRecordsFoundMsg"><td colspan="5" >No Forms Found matching search criteria<td></tr>');
                    }
                    else {
                        $('#formList #formsTable .NoRecordsFoundMsg').remove();
                        $(this).removeClass('hideForSearch');
                    }
                });
            }
    
        //reset create new project form on success of create new project
        resetCreateNewProjectForm = function  () {
            $('#addProject [name=name]').val('');

			$('#addProject [name=description]').val('');

			$('#selectForms .selectedItems, #selectReminder .selectedItems, #selectUsers .selectedItems, #selectUsers .selectedItems, #selectSymbol .selectedItems').removeAttr('data-valid');
            
            $('#selectForms .selectedItems').text($('#selectForms .selectedItems').attr('data-default'));
            $('#selectForms .options [type=checkbox]').prop('checked', false);
            $('#selectReminder .selectedItems').text($('#selectForms .selectedItems').attr('data-default'));
            $('#selectReminder .options [type=checkbox]').prop('checked', false);
            $('#selectUsers .selectedItems').text($('#selectForms .selectedItems').attr('data-default'));
            $('#selectUsers .options [type=checkbox]').prop('checked', false);
            $('#selectSymbol .selectedItems').text($('#selectForms .selectedItems').attr('data-default'));
            $('#selectSymbol .options [type=checkbox]').prop('checked', false);
          
            $('#addProject .errorMsg').animate({opacity:0});

        }
    
        /*end form list click handlers*/
	
	}); //end of document ready
	