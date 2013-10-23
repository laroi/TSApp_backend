<div class='left_cont'>
	<div class='inner_cont'>
	<div class='ex_proj_cont'>
		<?php foreach($projects as $project){ ?>
			<div class='ex_proj_ind'>
				<div class='proj_name exist' id='<?php echo $project->project_pk?>'><?php echo $project->name?></div>
				<div class='del_proj'></div>
			</div>
		<?php }?>
		</div>
		<div class="project_cont">
			<input type ='text' class='project_name'> 
			<div style="clear:both"></div>
		</div>
		<div style="clear:both"></div>
		<div class="btn_container">
			<div class ='btn_add_project main_btn'>Add Project</div>
			<div class ='btn_save_project main_btn'>Save</div>
		</div>
	</div>
</div>
<div class='right_cont'>
	<div class='inner_cont'>
		
	</div>
</div>
<script type="text/javascript">
	var url = "<?php echo Yii::app()->baseUrl?>/index.php/user/UpdateAllProjects";
</script>