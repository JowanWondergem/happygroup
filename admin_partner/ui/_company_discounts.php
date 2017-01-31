 <div class="block_35 company_discounts  <?php echo $pos; ?>" >
        <h2 class="color_header"><?php echo $WebsitePartnerTexts[0]['text']; ?></h2> 
        <ul class="list_blocks  v_list">
        <?php foreach($WebsitePartnerDiscounts as $discount): ?>
       		<li class="bg_gr_yellow"  ><span class="discount_perc"><?php echo $discount['discount_perc']; ?></span>&nbsp;<?php echo $discount['discount_text']; ?></li>  
        <?php endforeach; ?>
        </ul>
    </div>