<div class="block_35  company_contacts  <?php echo $pos; ?> block_start" >
    
    	<h2 class="color_header"><?php echo $WebsitePartnerTexts[1]['text']; ?></h2> 
        <ul class="list_blocks  v_list">
        
       
         		<?php  if ($WebsitePartnerInfo[0]['country']!=''): ?>
         			<li class="bg_gr_yellow"  ><span class="text_bold"><?php echo $WebsitePartnerTexts[2]['text']; ?>: </span><span><?php echo $WebsitePartnerInfo[0]['country'] ?></span></li>  
                <?php  endif;?> 
                <?php  if ($WebsitePartnerInfo[0]['area']!=''): ?>  
         			<li class="bg_gr_yellow"  ><span class="text_bold"><?php echo $WebsitePartnerTexts[3]['text']; ?>: </span><span><?php echo $WebsitePartnerInfo[0]['area'] ?></span></li>
                 <?php   endif;?>    
          		<?php if ($WebsitePartnerInfo[0]['address']!=''): ?>  
                	<li class="bg_gr_yellow"  ><span class="text_bold"><?php echo $WebsitePartnerTexts[4]['text']; ?>: </span><span><?php echo $WebsitePartnerInfo[0]['address'] ?></span></li>
                 <?php  endif;?>   
          		<?php if ($WebsitePartnerInfo[0]['phone']!=''): ?>  
                	<li class="bg_gr_yellow"  ><span class="text_bold"><?php echo $WebsitePartnerTexts[5]['text']; ?>: </span><span><?php echo $WebsitePartnerInfo[0]['phone'] ?></span></li>  
                 <?php  endif;?> 
          		<?php if ($WebsitePartnerInfo[0]['email']!=''): ?>  
                	<li class="bg_gr_yellow"  ><span class="text_bold"><?php echo $WebsitePartnerTexts[6]['text']; ?>: </span><span><a href="mailto:visitus@vila.pt"><?php echo $WebsitePartnerInfo[0]['email'] ?></a></span></li> 
                 <?php  endif;?> 
                <?php if ($WebsitePartnerInfo[0]['url_website_private']!=''): ?>  
               		 <li class="bg_gr_yellow"  ><span class="text_bold"><?php echo $WebsitePartnerTexts[7]['text']; ?>: </span><span><a href="http://<?php echo $WebsitePartnerInfo[0]['url_website_private'] ?>" target="_blank"><?php echo $WebsitePartnerInfo[0]['url_website_private'] ?></a></span></li>       
        		 <?php  endif;?> 
        </ul>
    </div>
    