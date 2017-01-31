
<?php 
 include_once('bz/Category.php'); ?>
<?php   $Categories = Category::getAllCategories($_SESSION['id_lan']); ?>
<div id="dialog-activity" style="display:none;" title="<?php echo $l_popup_activity_title; ?>">
	
	<form>
    	<input class="hidden" id="location" type="text" hidden value=""/>
		<select class="block_100" size="<?php echo count($Categories)?>" >
    <!--    	<option value="-1" selected="selected"><?php echo $l_popup_category_choice ?></option>-->
         <?php foreach ($Categories as $category): ?>
        	<option value="<?php echo $category['id_category'] ?>"><?php echo $category['category'] ?></option>
         <?php endforeach; ?>
        </select>
	</form>
</div>


