
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

    $id = $this->member_management->get_id_from_username($username);
    //print_r();
    if($id!=$member_info[0]->id && !$admin){
        header("location: ../../user_main");
    }
    
//$res=$this->claims_management->get_deals();


?>

	<!-- begin #page-container -->
	<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
		<!-- begin #header -->
		<div id="header" class="header navbar navbar-default navbar-fixed-top">
			<!-- begin container-fluid -->
			<div class="container-fluid">
				<!-- begin mobile sidebar expand / collapse button -->
				<div class="navbar-header">
					<a style="width:300px" href="<?=base_url()?>members" class="navbar-brand"><span class="navbar-logo"><i class="ion-ios-cloud"></i></span> <b>CSI-RAIT</b> SPONSORSHIP</a>
					<button type="button" class="navbar-toggle" data-click="sidebar-toggled">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<button type="button" class="navbar-toggle p-0 m-r-5" data-toggle="collapse" data-target="#top-navbar">
					    <span class="fa-stack fa-lg text-inverse">
                            <i class="fa fa-square-o fa-stack-2x m-t-2"></i>
                            <i class="ion-ios-gear fa-stack-1x"></i>
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
								<img src="<?php echo base_url() ?>assets/img/user-13.jpg" alt="" /> 
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
        <div style="padding-top:50px;" id="content" class="content">
			
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Claims <small>view all claims here...</small></h1>
			<!-- end page-header -->
			
			<!-- begin row -->
			<div class="row">
			    <!-- begin col-12 -->
			    <div class="col-md-12">
			        <!-- begin panel -->
                    <div class="panel panel-inverse">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                            <h4 class="panel-title">Deals Table - Default</h4>
                        </div>
                        <div class="panel-body">
                            <table id="data-table" class="table table-striped table-bordered">
                                <thead>
                               
                                <h4 class="text-center">Name:<?=$member_info[0]->name?><h4>
                                <h4 class="text-center">Roll Number:<?=$member_info[0]->roll_number?><h4>
                                <h4 class="text-center"> Phone Number:<?=$member_info[0]->mobile_number?><h4>
                                <br>
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>Reason</th>
                                        <th>Amount</th>
                                        <?php if($admin){?>
                                        <th>Handle</th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php if($claims){
                                 // print_r($claims);
                                    $i = 0;
                                    foreach($claims as $row){
                                        $i++;
                                         ?>
                                <tr>
                                   <td>
                                <?=$i?>
                                   </td>
                                   <td>
                                <?=$row->reason?>
                                   </td>
                                   <td>
                                <?=$row->value?>
                                   </td>
                                   <?php if($admin){ ?>
                                   <td>
                                   <button onclick="sealclaim('<?=$row->id?>')" class="btn btn-info">Done</button>

                                   </td>
                                   <?php } ?>
                                   </tr>
                                <?php }} ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- end panel -->
                </div>
                <!-- end col-12 -->
            </div>
            <!-- end row -->
		</div>
			        <!-- begin panel -->
                    
                    <!-- end panel -->
                

        <!-- end theme-panel -->
		
		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-primary btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
    <script>

    function sealclaim(id){    
        console.log(id);
        swal({
  title: "Are you sure?",
  text: "!",
  type: "success",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "Yes, seal!",
  closeOnConfirm: false
},
function(){
    $.ajax({
                type: 'POST',
                url: '../ajax_sealclaim',
                data:{
                    'id':id,
                },
                cache:false,
                
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


    function deleteUser(id){    
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
                url: 'Member/ajax_deleteuser',
                data:{
                    'id':id,
                },
                cache:false,
                
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
    
    
    </script>
	<!-- end page container -->
	

