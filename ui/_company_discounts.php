 <div class=" company_discounts offset1 span5 <?php echo $pos; ?>" >
        <h2 class="block_title color_header " ><?php echo $l_partner_title_discount; ?></h2> 
        <ul class="list_blocks  v_list row-fluid">
        <?php foreach($WebsitePartnerDiscounts as $discount): ?>
       		<li class=""  >
            	<span class="discount_perc"><?php echo $discount['discount_perc']; ?></span>&nbsp;
				<span><?php echo $discount['discount_text']; ?></span>
            </li>  
        <?php endforeach; ?>
        </ul>
    </div>