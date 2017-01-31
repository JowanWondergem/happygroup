
	<?php
	//COMMON INFO

	$_SESSION['id_lan'] = 1;
	$lang = 1;
		
	//HEADER
	$l_title_panel = 'Admin Panel';
	$l_header_lang = 'Languages';
	$l_header_persondet ='Personal Details';
	$l_header_config ='Settings';
	
	
	//MENU
	
	$l_menu_home 		= 'Dashboard';
	$l_menu_admin 		= 'Admins';
	$l_menu_all 		= 'View All';
	$l_menu_new 		= 'Add New';
	$l_menu_partners 	= 'Partners';
	$l_menu_cards 		= 'Cards';
	$l_menu_flyers 		= 'Flyers';
	$l_menu_themes 		= 'Themes';
	$l_menu_web 		= 'Web';
	$l_menu_attr 		= 'Attributes';
	$l_menu_home 		= 'Home Page';
	$l_menu_newsflash 	= 'News Flash';
	$l_menu_aboutus 	= 'About Us';
	$l_menu_contact 	= 'Contacts';
	$l_menu_languages	= 'Languages';
	$l_menu_countries	= 'Countries';
	$l_menu_regions		= 'Regions';
	$l_menu_cities		= 'Cities';
	$l_menu_categories	= 'Categories';
	$l_menu_my_account	= 'My Profile';
	$l_menu_logout 		= 'Logout';
	
	// FORM
	
	$l_form_active 			= 'Active';
	$l_form_language 		= 'Language';
	$l_form_country 		= 'Country';
	$l_form_country_choice	= 'Choose a country';
	$l_form_name	 		= 'Name';
	$l_form_owner			= 'Owner';
	$l_form_tax_number		= 'Tax Number';
	$l_form_bank_account	= 'Bank Account';
	$l_form_first_name 		= 'First Name';
	$l_form_last_name 		= 'Last Name';
	$l_form_address 		= 'Address';
	$l_form_email			= 'Email';
	$l_form_email_private	= 'Email (Private)';
	$l_form_email_company	= 'Email (Company)';
	$l_form_contact			= 'Contacts';
	$l_form_phone	 		= 'Phone 1';
	$l_form_mobile_phone	= 'Phone 2';
	$l_form_zip_code		= "Zip Code";
	$l_form_fax	 			= 'Fax';
	$l_form_image	 		= 'Image';
	$l_form_price	 		= 'Price (in Euros)';
	$l_form_password 		= 'Password';
	$l_form_change			= 'Change';
	$l_form_password_old	= 'Old Password';
	$l_form_password_new	= 'New Password';
	$l_form_date_creation	= 'Creation';
	$l_form_options	 		= 'Options';
	$l_form_duration	 	= 'Duration';
	$l_form_description		= 'Description';
	$l_form_category	 	= 'Category';
	$l_form_category_choice	= 'Choose a category';
	$l_form_area		 	= 'Region';
	$l_form_area_choice		= 'Choose a region';
	$l_form_city		 	= 'City';
	$l_form_city_choice	    = 'Choose a city';
	$l_form_theme		    = 'Theme';
	$l_form_theme_choice    = 'Choose a Theme';
	$l_form_web			 	= 'Website';
	$l_form_no_web			= 'No Happygroup Website';
	$l_has_web_happy	 	= 'Has Website Happygroup';
	$l_form_url_web_happy	= 'Website (Happygroup)';
	$l_form_url_web_private	= 'Website (Private)';
	$l_form_discount		= 'Discount';
	$l_form_description_popup	= 'Popup Description';
	$l_form_title			= 'Title';
	$l_form_subtitle		= 'Subtitle';
	$l_form_flyer_type		= 'Type of Flyer';
	$l_form_flyer_type_choice = 'Choose type of flyer';
	$l_form_code 			= 'Code';
	$l_form_contract_start 	= 'Contract Start Date';
	$l_form_contract_renewal= 'Contract Renewal Date';
	$l_form_btn_save = 'Save';
	$l_form_btn_cancel = 'Cancel';
	 $l_form_expire = 'Expeiring';
	
	
	$l_tip_1_month = 'Expires in 1 Month';
	$l_tip_2_month = 'Expires in 2 Months';
	
	// DASHBOARD
	
	$l_dash_today 			= 'Today\'s date ';
	$l_dash_admin 			= 'Admin';
	$l_dash_email 			= 'Email';
	$l_dash_phone 			= 'Telephone';
	$l_dash_mobile_phone 	= 'Mobile Phone';
	$l_dash_web_tester	 	= 'Test Happygroup Website';
	$l_dash_nr_partners	 	= 'Number of Partners';
	$l_dash_nr_web		 	= 'Number of Happygroup Websites';		
	
	
	//MESSAGES
	
	$l_msg_first_country 	= "Choose a country first!";
	$l_msg_first_area 		= "Choose a region first!";
	$l_msg_exp_web 			= "Nome of Personal Happygroup Page ex. (www.happy-group.eu/your-company_name)";
	
	// ADMINS
	
	$l_admins_title_grid 	= 'Admins';
	$l_admins_new 			= 'Add New';
	$l_admins_edit 			= 'Edit';
	$l_admins_edit_password = 'Edit Password';
	$l_admins_step1 		= 'Commum';
	$l_admins_step2 		= 'Images';
	$l_admins_image_profile = 'Profile Image';
	
	
	// PARTNERS
	
	$l_partners_title_grid = "Partners";
	$l_partners_new 		= 'Add New';
	$l_partners_edit 		= 'Edit';
	$l_partners_step1 		= 'Commum';
	$l_partners_step2 		= 'Images';
	$l_partners_step3 		= 'Description';
	$l_partners_title_contact		= 'Contacts';
	$l_partners_title_website		= 'Happygroup Website';
	$l_partners_logo_image	= "Logo ";
	$l_partners_popup_image	= "Popup";
	
	
	// PARTNERS CONTRACTS
	
	$l_partners_contracts_title = "Partner Contracts";
	$l_partners_contracts_period = "Select remaining period";
	$l_partners_contracts_year = "Year";
	$l_partners_contracts_month = "Month";
	$l_partners_contracts_week = "Week";
	$l_partners_contracts_day = "Day";
	$l_partners_contracts_filter = "Filter";
	
	// CARDS
	
	$l_cards_title_grid = "Cards";
	$l_cards_new 		= 'Add New';
	$l_cards_edit 		= 'Edit';
	$l_cards_step1 		= 'Commum';
	$l_cards_step2 		= 'Images';
	$l_cards_step3 		= 'Description';
	$l_cards_image_home_page	= 'Homepage Image';
	$l_cards_image_register		= 'Register Image';
	
	
	// FLYERS
	
	$l_flyers_title_grid	= "Flyers"; 
	$l_flyers_new 			= 'Add New';
	$l_flyers_edit 			= 'Edit';
	$l_flyers_step1 		= 'Commum';
	$l_flyers_step2 		= 'Images'; 
	$l_flyers_image			= 'Image'; 
	
	
	// THEMES
	
	$l_themes_title_grid	= "Themes"; 
	$l_themes_new 			= 'Add New';
	$l_themes_edit 			= 'Edit';
	$l_themes_step1 		= 'Commum';
	
	
	// SLIDER
	
	$l_slider_title_grid = " Home Page Images";
	$l_slider_new 			= 'Add New';
	$l_slider_edit 			= 'Edit';
	$l_slider_step1 		= 'Commum';
	$l_slider_step2 		= 'Images';
	$l_slider_image_home	= 'Home Page Image';
	
	// NEWSFLASH
	
	$l_newsflash_title 	= "Newsflash";
	
	
	// ABOUT US
	
	$l_about_title	= "About Us";
	
	
	// CONTACTS
	
	$l_contact_title_grid	= "Contacts";
	$l_contact_new 			= 'Add New';
	$l_contact_edit 		= 'Edit';
	$l_contact_step1 		= 'Commum';
	
	// LANGUAGES
	
	$l_languages_title_grid = 'Languages';
	$l_languages_new 		= 'Add New';
	$l_languages_edit 		= 'Edit';
	$l_languages_step1 		= 'Commum';
	
	// COUNTRIES
	
	$l_countries_title_grid = 'Countries';
	
	// AREAS
	
	$l_areas_title_grid = 'Regions';
	
	// CITIES
	
	$l_cities_title_grid 	= 'Cities';
	$l_cities_new 			= 'Add New';
	$l_cities_edit 			= 'Edit';
	$l_cities_step1 		= 'Commum';
	$l_cities_step2 		= 'Translations';
	
	// CATEGORIES
	
	$l_categories_title_grid 	= 'Categories';
	$l_categories_new 			= 'Add New';
	$l_categories_edit 			= 'Edit';
	
	
	
	
	
	//////////////////////////////////////////////////////////////////////////////////////////////////////77
	

	
	
	?>