
<?php
	//$this -> load -> session();
	//session_start();
//print_r($this->session->userdata['logged_in']);
if (isset($this->session->userdata['logged_in'])) {
	$name = ($this->session->userdata['logged_in']['name']);
	$username = ($this->session->userdata['logged_in']['username']);
	$admin = ($this->session->userdata['logged_in']['admin']);
	} else {
	header("location: login");
	}

$res = $this->target_management->read_all_targets();
$id = $this->member_management->get_id_from_username($username);
//	echo $username;

?>

	<!-- begin #page-container -->
	<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
		<!-- begin #header -->
		<div id="header" class="header navbar navbar-default navbar-fixed-top">
			<!-- begin container-fluid -->
			<div class="container-fluid">
				<!-- begin mobile sidebar expand / collapse button -->
				<div class="navbar-header">
					<a href="<?=base_url()?>user_main" style="width:300px;" class="navbar-brand"><span class="navbar-logo"><i class="ion-ios-cloud"></i></span> <b>CSI-RAIT</b> SPONSORSHIP</a>
					<button type="button" class="navbar-toggle" data-click="sidebar-toggled">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<button type="button" class="navbar-toggle p-0 m-r-5" data-toggle="collapse" data-target="#top-navbar">
					    <span class="fa-stack fa-lg text-inverse">
                            <i class="fa fa-square-o fa-stack-2x m-t-2"></i>
                            
                        </span>
					</button>
				</div>
				<!-- end mobile sidebar expand / collapse button -->
				
				<!-- begin navbar-collapse -->
                
				<!-- end navbar-collapse -->
				
				<!-- begin header navigation right -->
				<ul class="nav navbar-nav navbar-right">
					
					
					<li class="dropdown navbar-user">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
							<span class="user-image online">
								<img src="assets/img/user-13.jpg" alt="" /> 
							</span>
							<span class="hidden-xs"><?=$name?></span> <b class="caret"></b>
						</a>
						<ul class="dropdown-menu animated fadeInLeft">
							<li class="arrow"></li>
							<li><a href="javascript:;">Setting</a></li>
							<li class="divider"></li>
							<li><a href="<?php echo base_url() ?>logout">Log Out</a></li>
						</ul>
					</li>
				</ul>
				<!-- end header navigation right -->
			</div>
			<!-- end container-fluid -->
		</div>
		<!-- end #header -->
        
		
		<!-- begin #sidebar -->
		<div id="sidebar" class="sidebar">
			<!-- begin sidebar scrollbar -->
			<div data-scrollbar="true" data-height="100%">
				<!-- begin sidebar user -->
				<ul class="nav">
					<li class="nav-profile">
						<div class="image">
							<a href="javascript:;"><img src="assets/img/user-13.jpg" alt="" /></a>
						</div>
						<div class="info">
							<?=$name?>
							<small><?=$username?></small>
						</div>
					</li>
                    <?php if($admin){ ?>
					<li>
						<a href="<?php echo base_url() ?>members">
						    <i class="ion-ios-pulse-strong"></i> 
						    <span>Member Management</span>
						</a>
					</li>
					
					<li>
						<a href="<?php echo base_url() ?>add_members">
						    <i class="ion-ios-pulse-strong"></i> 
						    <span>Add Members</span>
						</a>
					</li>
					<?php } ?>
					<li>
						<a href="<?php echo base_url() ?>user_main">
						    <i class="ion-ios-list-outline"></i> 
						    <span>Targets</span>
						</a>
					</li>
					<?php if($admin){ ?>
					<li>
						<a href="<?php echo base_url() ?>add_target">
						    <i class="ion-ios-list-outline"></i> 
						    <span>Add Target</span>
						</a>
					</li>
					<?php } ?>
					<li>
						<a href="<?php echo base_url() ?>add_feedback">
						    <i class="ion-ios-undo"></i> 
						    <span>Add Feedback</span>
						</a>
					</li>
					<?php if($admin){ ?>
					<li>
						<a href="<?php echo base_url() ?>deals">
						    <i class="ion-ios-undo"></i> 
						    <span>Closed Deals</span>
						</a>
					</li>
					<?php } ?>
					<li>
						<a href="<?php echo base_url() ?>add_claims">
						    <i class="ion-ios-undo"></i> 
						    <span>Add Claims</span>
						</a>
					</li>
					<?php if(!$admin){ ?>
					<li>
						<a href="<?php echo base_url() ?>Member/claims/<?=$id?>">
						    <i class="ion-ios-undo"></i> 
						    <span>View Claims</span>
						</a>
					</li>
                    <?php } ?>
				</ul>
				<!-- end sidebar user -->
	
			</div>
			<!-- end sidebar scrollbar -->
		</div>
		<div class="sidebar-bg"></div>
		<!-- end #sidebar -->
		<div id="content" padding class="content">
			<!-- begin breadcrumb -->
			
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Targets <small>view potential targets here...</small></h1>
			<!-- end page-header -->
			
			<!-- begin row -->
			<div class="row">
				<!-- begin col-6 -->
			<?php 
			
			if($res){
				
				if(!$admin){
				$res = $this->target_management->filter_from_targets($username,$res);
				}
				//print_r($res1);
				
				foreach($res as $row){ ?>
				
			    <div class="col-md-6">
			        <!-- begin panel -->
			        
			        <!-- end panel -->
			        <!-- begin panel -->
			        
			        <!-- end panel -->
			        <!-- begin panel -->
			        
			        <!-- end panel -->
			        <!-- begin panel -->
			        <div class="panel panel-inverse" >
                        <div style="height:50px;" class="panel-heading">
                            <div class="pull-right">
							<?php if($admin){ ?>
								<a href="<?=base_url()?>Target/edit/<?=$row->id?>" class="btn btn-info">Edit</a>
								<button onclick="close_deal(<?php echo $row->id; ?>)" style="color:black" class="btn btn-success">Close Deal</button>
							<?php } ?>
							</div>
                            <h2 style="font-size:20px;margin-top:5px;" class="panel-title"><?=$row->name?></h2>
                        </div>
                        <div class="panel-body">
							<div data-scrollbar="true" data-height="280px">
								<h6> Address</h6>
							<p>
							<?=str_replace('\n', "\n", $row->address)?>
			</p>	
							<h6> Contact Number </h6>
							<p> +91 <?=$row->mobile_number?></p>
							<br>
							<p> <?=$row->instructions?>
							<h3> Members Assigned <i>(Currently)</i></h3>
							<table class="table">
                                <thead>
                                    <tr>
                                        <th>Member Name</th>

										<?php if($admin){ ?>
                                        <th>Action</th>
										<?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
									<?php 
									$names = $this->target_management->get_names($row->id);
									if(count($names)>0){foreach($names as $name){ ?>
                                    <tr>
                                        <td><?=$name['name']?></td>
										<?php if($admin){ ?>
                                        <td><a href="javascript:;" onclick="remove_member_map('<?=$name['id']?>')" class="btn btn-xs btn-inverse"><i class="fa fa-times"></i></a></td>
										<?php } ?>
									</tr>
                                    <?php }}?>
                                </tbody>
							</table> 
							<?php if($admin){ ?>
							<h4> Add Members </h4>
							<?php
								
								$members = $this->target_management->get_member_list($row->id);
								//print_r($members);
								
							?>
							<div class="row">
								<div class="col-xs-8">
							<select  id="select<?=$row->id?>" style="width: 30px;" class="form-control selectpicker" data-size="20" data-live-search="true">
											<option  value="" selected>Select a Member</option>
											<?php foreach($members as $member){ ?>
                                            <option value="<?=$member->id?>"><?=$member->name?></option>
                                            <?php } ?>
										</select></div>
										
										<div class="col-xs-4"><button onclick="add_member_map('<?=$row->id?>')" class="btn btn-info">Add</button></div>
</div>
						</p>

							<?php } ?>
							
							
							
						<?php
										$feedbacks = $this->feedback_management->get_feedback_list($row->id);
									//	print_r($feedbacks);
										
									?>
							<h3> Feedbacks</h3>
							<ul class="media-list media-list-with-divider">
								<?php foreach($feedbacks as $feedback){ ?>
								<li class="media media-sm">
									
							<h5> Date Visited: <?=$feedback->date_visited?></h5>
							<h5> People Visited: <?php
							$numItems = count(json_decode($feedback->people_visited));
							$i = 0;
							foreach(json_decode($feedback->people_visited) as $key=>$id ){
								if(++$i === $numItems) {
									echo $this->feedback_management->get_name_from_id($id);	
								  }else{
									echo $this->feedback_management->get_name_from_id($id).", ";
								  }
								
								
							}
							?></h5>
							<h5> Submitted By: <?=$this->feedback_management->get_name_from_id($feedback->submitted_by);?> </h5>
							<p> <strong>Feedback:</strong> <?=$feedback->feedback_content?></p>
</li>

<?php } ?>

</ul>
							</div>
							
                        </div>
                    </div>
			        <!-- end panel -->
			        <!-- begin panel -->
			        
			        <!-- end panel -->
			        <!-- begin panel -->
			        
			        <!-- end panel -->
				</div>
			<?php }} ?>
			    <!-- end col-6 -->
			    <!-- begin col-6 -->
			    
			    <!-- end col-6 -->
			</div>
			<!-- end row -->
			
			
			<!-- end row -->
			

			<!-- begin row -->
			
			<!-- end row -->
		</div>

        <!-- end theme-panel -->
		
		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-primary btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
	<!-- end page container -->
	<script>
		function add_member_map(id){
			member_id = $('#select'+id).val();
			console.log(id,member_id);
			$.ajax({
                type: 'POST',
                url: 'Target/ajax_add_member_map',
                data:{
                    'target_id':id,
					'member_id':member_id
                },
                success: function(resp){
                    //console.log(resp);
                    if(resp == 'success'){
                       //sendDelivery(id);
                      window.location = '';
                     // window.location = '';

                    }

            }
        });
		}
		function remove_member_map(id){
			swal({
  title: "Are you sure?",
  text: "You will not be able to recover this data!",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "Yes, delete!",
  closeOnConfirm: false
},
function(){
    $.ajax({
                type: 'POST',
                url: 'Target/remove_member_map',
                data:{
                    'id':id
                },
                success: function(resp){
                    //console.log(resp);
                    if(resp == 'success'){
                       //sendDelivery(id);
                      window.location = '';
                     // window.location = '';

                    }

            }
});
			
		});
		}
		function close_deal(id){
			swal({
  title: "Are you sure?",
  text: "Enter the amount of deal",
  type: "input",
  showCancelButton: true,
  confirmButtonClass: "btn-success",
  confirmButtonText: "Confirm this deal.",
  closeOnConfirm: false
},
function(inputValue){
	if (inputValue === false) return false;
  if (inputValue === "") {
    swal.showInputError("You need to write something!");
    return false
  }
    $.ajax({
                type: 'POST',
                url: 'Target/confirm_deal',
                data:{
                    'id':id,
					'value':inputValue
                },
                success: function(resp){
                    //console.log(resp);
                    if(resp == 'success'){
                       //sendDelivery(id);
                      window.location = 'deals';
                     // window.location = '';

                    }

            }
});
			
		});
		}
		
												
	</script>
	

