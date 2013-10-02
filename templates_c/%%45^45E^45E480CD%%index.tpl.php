<?php /* Smarty version 2.6.6, created on 2012-06-04 19:56:55
         compiled from index.tpl */ ?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "zaglavlje_pocetna.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<div id="csadrzaj">

				<h1>POČETNA STRANICA</h1>
				<span class='pogreska'><?php echo $this->_tpl_vars['Prava'];  echo $this->_tpl_vars['ZabranjenPristup']; ?>
</span>
				<?php echo $this->_tpl_vars['registracija']; ?>

				<div id="slideshow-container">
				  <img src="Slike/MIT.jpg" alt="" />
				  <img src="Slike/FOI.jpg" alt="" />
				  <img src="Slike/Oxford.jpg" alt="" />
				</div>
				<ul class="tabs">
					<li>O stranici</li>
					<li>Zanimljivosti</li>
					<li>Zabava</li>
				</ul>

				<ul class="contents">
					<li><div>Stranica je aktivna od 2012. godine. Omogućava vam da se na jednostavan način prijavljujete na <br>
					  natječaje diplomskog i poslijediplomskog studija</div></li>
					<li> <div>
						Lorem Ipsum is simply dummy text of the printing and typesetting industry. <br>Lorem Ipsum has been the 
						industry's standard dummy text ever since the 1500s, when an unknown printer took a <br>galley of type and 
						scrambled it to make a type specimen book. It has survived not only five centuries,<br> but also the leap into 
						electronic typesetting, remaining essentially unchanged. It was popularised in <br>the 1960s with the release of
						Letraset sheets containing Lorem Ipsum passages, and more recently<br> with desktop publishing software like Aldus
						PageMaker including versions of Lorem Ipsum</div></li>
					<li><div><a href="Slike/zabava.jpg" target="_blank" > <img  src='Slike/zabava.jpg' height='150' width='150' alt='meme'/></a></div></li>
				</ul>
				<div style="height:100px;"></div>
		</div>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "podnozje.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>