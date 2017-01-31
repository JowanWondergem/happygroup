<div class="company_contacts  offset1 span5 <?php echo $pos; ?> " >
    
    	<h2 class="block_title color_header "><?php echo $l_partner_title_contacts; ?></h2> 
        <ul class="list_blocks v_list row-fluid">
        
       
         		<?php  if ($WebsitePartnerInfo['country']!=''): ?>
         			<li class=""  >
                        <span class="text_bold"><?php echo $l_partner_lbl_country; ?>: </span>
                        <span><?php echo $WebsitePartnerInfo['country'] ?></span>
                    </li>  
                <?php  endif;?> 
                <?php  if ($WebsitePartnerInfo['area']!=''): ?>  
         			<li class=""  >
                        <span class="text_bold"><?php echo $l_partner_lbl_area; ?>: </span>
                        <span><?php echo $WebsitePartnerInfo['area'] ?></span>
                    </li>
                 <?php   endif;?>    
          		<?php if ($WebsitePartnerInfo['address']!=''): ?>  
                	<li class=""  >
                        <span class="text_bold"><?php echo $l_partner_lbl_address; ?>: </span>
                        <span><?php echo $WebsitePartnerInfo['address'] ?></span>
                    </li>
                 <?php  endif;?>   
                 <?php if ($WebsitePartnerInfo['zip_code']!=''): ?>  
                	<li class=""  >
                        <span class="text_bold"><?php echo $l_partner_lbl_zip_code; ?>: </span>
                        <span><?php echo $WebsitePartnerInfo['zip_code'] ?></span>
                    </li>
                 <?php  endif;?>  
          		<?php if ($WebsitePartnerInfo['phone']!=''): ?>  
                	<li class=""  >
                        <span class="text_bold"><?php echo $l_partner_lbl_phone_1; ?>: </span>
                        <span><?php echo $WebsitePartnerInfo['phone'] ?></span>
                    </li>  
                 <?php  endif;?> 
                 <?php if ($WebsitePartnerInfo['mobile_phone']!=''): ?>  
                	<li class=""  >
                        <span class="text_bold"><?php echo $l_partner_lbl_phone_2; ?>: </span>
                        <span><?php echo $WebsitePartnerInfo['mobile_phone'] ?></span>
                    </li>  
                 <?php  endif;?> 
          		<?php if ($WebsitePartnerInfo['email']!=''): ?>  
                	<li class=""  >
                        <span class="text_bold"><?php echo $l_partner_lbl_email; ?>: </span>
                        <span><a href="javascript:$('#tab_list a:last').tab('show');"><?php echo $WebsitePartnerInfo['email'] ?></a></span>
                    </li> 
                 <?php  endif;?> 
                <?php if ($WebsitePartnerInfo['url_website_private']!=''): ?>  
               		 <li class=""  >
                         <span class="text_bold"><?php echo $l_partner_lbl_website; ?>: </span>
                         <span>
                         <a href="http://<?php echo $WebsitePartnerInfo['url_website_private'] ?>" target="_blank">
                         <?php echo $WebsitePartnerInfo['url_website_private'] ?>
                         </a>
                         </span>
                     </li>       
        		 <?php  endif;?> 
        </ul>
    </div>
    