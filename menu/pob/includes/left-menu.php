<?php
function check_running_status($cab_tab,$cab_tab_no)
{
	$check_running_sql = "SELECT id FROM table_running_session WHERE cab_tab = '" .$cab_tab. "' AND cab_tab_no = '" .$cab_tab_no. "'";
	$check_running_res = mysql_query($check_running_sql);
	if(mysql_num_rows($check_running_res) > 0)
	{
		$status = 1;
	}
	else
	{
		$status = 0;
	}
	return $status;
}



function check_view_level($cab_tab,$cab_tab_no)
{
	$check_running_sql = "SELECT created_by FROM table_running_session WHERE cab_tab = '" .$cab_tab. "' AND cab_tab_no = '" .$cab_tab_no. "'";
	
	$check_running_res = mysql_query($check_running_sql);
	if(mysql_num_rows($check_running_res) > 0)
	{
		$check_running_row = mysql_fetch_array($check_running_res);
		$created_by = $check_running_row["created_by"];
	}
	else
	{
		$created_by = 0;
	}
	return $created_by;
}


?>
<div class="col-sm-2 col-lg-2">
            <div class="sidebar-nav">
                <div class="nav-canvas">
                    <div class="nav-sm nav nav-stacked">

                    </div>
                    <ul class="nav nav-pills nav-stacked main-menu">
                        
                        <li><a class="ajax-link" href="?go=home"><i class="glyphicon glyphicon-home"></i><span> Dashboard</span></a></li>
						<li><a class="ajax-link" href="?go=category"><i class="glyphicon glyphicon-list-alt"></i><span> Menu-SubMenu</span></a></li>
						
						
						<li class="accordion">
						<a href="#"><i class="glyphicon glyphicon-plus"></i><span> Tables/Cabins</span></a>
						<ul class="nav nav-pills nav-stacked">
						<?php
						for($c = 1; $c <= 3; $c++)
						{
							$cab_sess_stat = check_running_status(1,$c);
							$view_level = check_view_level(1,$c);
						?>
							<li>
							<?php 
							if($view_level == 0)
							{ 
							?>
								<a href="?go=create-bill&c=<?=$c?>"> Cabin <?=$c?>
								<?php if($cab_sess_stat == 1)
								{?>
									<span style="color:#ff0000;">Running..</span>
								<?php 
								} ?>
								</a>
							<?php 
							}
							else
							{ 
								if($created_by == 3)
								{
									if($created_by == $view_level)
									{
										?>
										<a href="?go=create-bill&c=<?=$c?>"> Cabin <?=$c?>
										<?php if($cab_sess_stat == 1)
										{?>
											<span style="color:#00ff00;">Running..</span>
										<?php 
										} ?>
										</a>
										<?php 
									}
									else
									{
										?>
										<a href="javascript:void(0)"> Cabin <?=$c?>
										<?php if($cab_sess_stat == 1)
										{?>
											<span style="color:#ff0000;">Running..</span>
										<?php 
										} ?>
										</a>
										<?php
									}
								}//end of == 3
								else
								{
									?>
									<a href="?go=create-bill&c=<?=$c?>"> Cabin <?=$c?>
									<?php if($cab_sess_stat == 1)
									{?>
										<span <?php if($view_level == 3){?>style="color:#ff0000;"<?php }else{?>style="color:#00ff00;"<?php } ?>>Running..</span>
									<?php 
									} ?>
									</a>
									<?php
								}//end else
							}//end else
							?>
							</li>
						<?php
						}
						?>
						<?php
						for($t = 1; $t <= 32; $t++)
						{
						$tab_sess_stat = check_running_status(2,$t);
						$view_level = check_view_level(2,$t,$created_by);
						?>
							<li>
							<?php 
							if($view_level == 0)
							{ 
							?>
								<a href="?go=create-bill&t=<?=$t?>"> Table <?=$t?>
								<?php if($cab_sess_stat == 1)
								{?>
									<span style="color:#ff0000;">Running..</span>
								<?php 
								} ?>
								</a>
							<?php 
							}
							else
							{ 
								if($created_by == 3)
								{
									if($created_by == $view_level)
									{
										?>
										<a href="?go=create-bill&t=<?=$t?>"> Table <?=$t?>
										<?php if($tab_sess_stat == 1)
										{?>
											<span style="color:#00ff00;">Running..</span>
										<?php 
										} ?>
										</a>
										<?php 
									}
									else
									{
										?>
										<a href="javascript:void(0)"> Table <?=$t?>
										<?php if($tab_sess_stat == 1)
										{?>
											<span style="color:#ff0000;">Running..</span>
										<?php 
										} ?>
										</a>
										<?php
									}
								}//end of == 3
								else
								{
									?>
									<a href="?go=create-bill&t=<?=$t?>"> Table <?=$t?>
									<?php if($tab_sess_stat == 1)
									{?>
										<span <?php if($view_level == 3){?>style="color:#ff0000;"<?php }else{?>style="color:#00ff00;"<?php } ?>>Running..</span>
									<?php 
									} ?>
									</a>
									<?php
								}//end else
							}//end else
							?>
							</li>
						<?php
						}
						?>
						</ul>								
						</li>
					
						<li><a class="ajax-link" href="?go=bill-summary"><i class="glyphicon glyphicon-list-alt"></i><span> Bill Summary</span></a></li>
						
                    </ul>
                </div>
            </div>
        </div>