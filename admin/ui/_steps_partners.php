<div id="step-holder">
			<?php 
			
			if(!isset($_GET['id']))
				{ $_GET['id']=0; }
			
			$path = $_SERVER['REQUEST_URI']; 
			$pages = explode("/", $path);
			$last_bar = end($pages);
			$steps = explode("_", $last_bar);
			$last_dot = end($steps);
			$last_step = explode(".", $last_dot);
			$step = $last_step[0]; 
			
			
			if($step!='step1')
			{
				if( $_GET['id']==0)
				{
					header('Location: partners_insert_step1.php?id='.$_GET['id']);
				}
			}
			
			
			function checkStep($current_step, $tab_step, $pos)
			{
				
				if($current_step == 'step'.$tab_step)
				{
					if($pos=='no')
						return  'step-no';
					else if($pos == 'left')
						return  'step-dark-left';
					else if ($pos == 'right')
						return  'step-dark-right';
				}
				else
				{
					if($pos=='no')
						return  'step-no-off';
					else if($pos == 'left')
						return  'step-light-left';
					else if ($pos == 'right')
						return  'step-light-right';
				}
				
			}
			
			
			
			
			
			?>
			<div class="<?php echo checkStep($step, 1, 'no')?>">1</div>
			<div class="<?php echo checkStep($step, 1, 'left')?>">
            <a href="<?php echo 'partners_'.$steps[1].'_step1.php?id='.$_GET['id'] ?>">
            <?php echo $l_partners_step1 ?>
            </a></div>
			<div class="<?php echo checkStep($step, 1, 'right')?>">&nbsp;</div>
			<div class="<?php echo checkStep($step, 2, 'no')?>">2</div>
			<div class="<?php echo checkStep($step, 2, 'left')?>">
            <a href="<?php echo 'partners_'.$steps[1].'_step2.php?id='.$_GET['id'] ?>">
             <?php echo $l_partners_step2 ?>
            </a></div>
			<div class="<?php echo checkStep($step, 2, 'right')?>">&nbsp;</div>
			<div class="<?php echo checkStep($step, 3, 'no')?>">3</div>
			<div class="<?php echo checkStep($step, 3, 'left')?>">
            <a href="<?php echo 'partners_'.$steps[1].'_step3.php?id='.$_GET['id'] ?>">
              <?php echo $l_partners_step3 ?>
            </a></div>
			<div class="<?php echo checkStep($step, 3, 'right')?>">&nbsp;</div>
			<div class="clear"></div>
		</div>