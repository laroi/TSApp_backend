$(document).ready(function(){
	var storedProjects = [],
		newProjects = [];
	var storeProject = function(callback){
		var projects=[];
		$('.ex_proj_ind').each(function(){
			projects.push($(this).find('.proj_name').text().trim());
		});
		if(typeof(callback) === 'function'){
			callback(projects);
		}
	};
	
	var checkChange = function(inStoredProjects,callback){
		var deletedArray = [],
			addedArray   =[],
			project;
		if($('.exist').length !== inStoredProjects.length){
			deletedArray = inStoredProjects,
			$('.exist').each(function(){
				console.log(deletedArray.indexOf($(this).text().trim()));
				/*if(deletedArray.indexOf($(this).text().trim()) !== -1){
					deletedArray.pop(deletedArray.indexOf($(this).text().trim());
				}*/
			});
		}
		$('.new').each(function(){
			addedArray.push($(this).text().trim());
		});
		if(typeof(callback) === 'function'){
			callback({'deleted':deletedArray,'added':addedArray});
		}
	}
	storeProject(function(_storedProjects){
		storedProjects = _storedProjects;
		$('.btn_add_project').click(function(){
			if($('.project_name').val()!=''){
				var html = ''; 
					html += "<div class='ex_proj_ind'>";
					html +=	"<div class='proj_name new'>"+$('.project_name').val()+"</div>";
					html +=	"<div class='del_proj'></div>";
					html +="</div>";
				$('.ex_proj_cont').append(html);
				$('.project_name').val('');
			}
		});
		
		$('.del_proj').live('click', function(){
			$(this).parent().remove();
		});
		
		$('.btn_save_project').click(function(){
			console.log('stored projects =>',storedProjects);
			storeProject(function(_newProjects){
				newProjects = _newProjects;
				checkChange(storedProjects,function(_changedProjects){
					console.log("Deleted Projects =>",_changedProjects.deleted);
					console.log("Added Projects =>",_changedProjects.added);
				});
				
				
			});
			/*$.post(url,js,function(data){
				if(data.result>0){
					window.location="<?php echo Yii::app()->baseUrl?>/index.php/subscriber/subscriberIdeadetail/ideaId/<?php echo $details['idea_id']?>";
				}
			},"json");*/
		});
	});
});