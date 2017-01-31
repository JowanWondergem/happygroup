<?php include_once('ui/_html.php'); ?>
<head>
	<?php 
	$head_title= 'Termos';  
	include_once('ui/_head.php'); 
	?>
</head>
<body >


    <?php // include_once('ui/popups/_popup_login.php'); ?>




	<?php include_once('ui/_header.php'); ?>

<div class="h_spacer "> <img src="ui/images/img03.png" /> </div>

<div class="center content ">
	<?php include_once('ui/_news_flash.php'); ?>
    <div class="block_15 left">
           
          <?php include_once('ui/_menu.php'); ?>
        
     </div> <!--end lbock left-->
  	<div class="block_85 bg_brown left  rounded-corners ">
    
    
    	<div  class="block_95 content content_info left">
    
         	<h1><?php echo $head_title; ?> </h1>
            
<?php if($_SESSION['id_lan']==1): ?>

                <div class="block_95 block_contacts rounded-corners bordered">
                    <h2 class="text_green">1.	Limitation of liability</h2>
                   <p>
                   The contents of this website have been created with the utmost care. The supplier cannot however, accept any responsibility for the correctness, the completeness and the up-to-dateness of the content provided. Use of the website is at the own risk of the user. Contributions assigned by name to writers reflect the opinion of the respective writers and do not always reflect the provider's opinion. With the pure use of the website of the supplier no contractual relationship comes about between the user and the supplier.
                   </p>
                </div>
                <br />
                 <div class="block_95 block_contacts rounded-corners bordered">
                    <h2 class="text_green">2. External links</h2>
                   <p>
                  This web site contains connections to web sites of third parties (external links). These web sites are subject to the respective operator's liability. When including these external links for the first time, the operator of this site checked the external content for possible legal violations. No such violations were determined at the time. However, the provider has no influence over the current and future design and contents of these linked sites. The inclusion of external links does not mean that the provider has assumed as its own the contents to which the link or reference points. It is not possible for the provider to continually check external links without concrete information that indicates violations of the law. If knowledge of infringements is received, however, such external links will be deleted without delay.
                   </p>
                </div>
                 <br />
                 <div class="block_95 block_contacts rounded-corners bordered">
                    <h2 class="text_green">3. Copyright and ancillary rightso</h2>
                   <p>
                  The contents published on this website are subject to German copyright and ancillary copyright law. Any utilisation not permitted by German copyright and ancillary copyright law requires the prior written permission by the provider or the respective owner. This applies specifically to the duplication, processing, translation, storage, handling and reproduction of the content in databases or other electronic media and systems. Third-party contents and rights are identified as such in this regard. The display of this website in third party frames is only allowed with our written permission.
                   </p>
                </div>
                 <br />
                 <div class="block_95 block_contacts rounded-corners bordered">
                    <h2 class="text_green">4. Rights of use</h2>
                   <p>
                  All the published material on our website (e.g. images, photos, films, documents) may only be used by authorised users. These materials may only be used for legal purposes. We reserve the right to take legal action in the event of any infringement of these rights. We use technical means to protect ourselves against any possible infringement of our rights by any unauthorised user or users (e.g. watermarks or IP logging).
 

                   </p>
                </div>
<?php endif; ?>
<?php if($_SESSION['id_lan']==2): ?>

 <div class="block_95 block_contacts rounded-corners bordered">
                    <h2 class="text_green">1.	Limitação de responsabilidade</h2>
                   <p>
                 O conteúdo deste site foram criados com o máximo cuidado. O fornecedor não pode, no entanto, aceitar qualquer responsabilidade sobre a exatidão, a integralidade ea up-to-atualidade do conteúdo fornecido. O uso do site está no próprio risco do usuário. Contribuições atribuídas pelo nome de escritores refletem a opinião dos escritores respectivos e nem sempre refletem a opinião do provedor. Com a utilização pura do site do fornecedor nenhuma relação contratual se dá entre o usuário eo fornecedor.
                   </p>
                </div>
                <br />
                 <div class="block_95 block_contacts rounded-corners bordered">
                    <h2 class="text_green">2. Links externos</h2>
                   <p>
                 Este site contém ligações para sites de terceiros (links externos). Estes sites estão sujeitos à responsabilidade do operador respectivo. Ao incluir esses links externos, pela primeira vez, o operador deste site verifiquei o conteúdo externo para possíveis violações legais. Sem tais violações foram determinados no momento. No entanto, o provedor não tem influência sobre o design atual e futuro eo conteúdo desses sites. A inclusão de links externos não significa que o provedor assumiu como seus os conteúdos a que o link ou pontos de referência. Não é possível para o provedor para verificar continuamente ligações externas sem informações concretas que indica violações da lei. Se o conhecimento de infracções é recebido, no entanto, procuram ligações externas serão imediatamente apagados.
                   </p>
                </div>
                 <br />
                 <div class="block_95 block_contacts rounded-corners bordered">
                    <h2 class="text_green">3. Direitos de autor e direitos conexos</h2>
                   <p>
                  Os conteúdos publicados neste site estão sujeitos a direitos de autor alemão e lei de direitos autorais auxiliares. Qualquer utilização não permitida pela lei alemã de copyright e direitos autorais auxiliar requer autorização prévia por escrito pelo fornecedor ou o respectivo proprietário. Isto aplica-se especificamente para a duplicação, tradução manipulação, processamento, armazenamento e reprodução do conteúdo em bancos de dados ou outros meios eletrônicos e sistemas. De terceiros conteúdo e direitos são identificados como examinado a este respeito. A exibição deste website em quadros de terceiros só é permitido com a nossa permissão por escrito.
                   </p>
                </div>
                 <br />
                 <div class="block_95 block_contacts rounded-corners bordered">
                    <h2 class="text_green">4. Direitos de utilização</h2>
                   <p>
                 Todo material publicado em nosso site (por exemplo, imagens, fotografias, filmes, documentos) só pode ser utilizado por usuários autorizados. Estes materiais podem ser utilizados apenas para fins legais. Reservamo-nos o direito de tomar medidas legais em caso de qualquer violação desses direitos. Nós usamos meios técnicos para nos proteger contra qualquer possível violação de nossos direitos por qualquer usuário não autorizado ou usuários (por exemplo, marcas d'água ou madeireiras IP).
 

                   </p>
                </div>



<?php endif; ?>
         
       
    	</div>
    
    
 
  </div>
</div>

<div class=" center "> <div class=" block_85 right "> <img class="block_100" src="ui/images/img03.png" /> </div></div>

<div class="h_spacer "></div>

	<?php include_once('ui/_footer.php'); ?>
</body>
</html>
