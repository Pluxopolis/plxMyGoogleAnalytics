<?php
/**
 * Plugin plxMyGoogleAnalytics
 *
 * @author	Stephane F
 **/
class plxMyGoogleAnalytics extends plxPlugin {

	public function __construct($default_lang) {

		# appel du constructeur de la classe plxPlugin (obligatoire)
		parent::__construct($default_lang);

		# limite l'accè a l'écran d'administration du plugin
		$this->setConfigProfil(PROFIL_ADMIN);

		# Déclarations des hooks
		if(!isset($_GET['preview']) AND $this->getParam('accountId'))
			$this->addHook('ThemeEndHead', 'ThemeEndHead');
	}

	public function ThemeEndHead() {

		$string  = "\n\n<script type=\"text/javascript\">\n";
		$string .= "	var _gaq = _gaq || [];\n";
		$string .= "	_gaq.push(['_setAccount', '".$this->getParam('accountId')."']);\n";
		$string .= "	_gaq.push(['_trackPageview']);\n";
		$string .= "	(function() {\n";
		$string .= "		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;\n";
		$string .= "		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';\n";
		$string .= "		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);\n";
		$string .= "	})();\n";
		$string .= "</script>\n";
		echo $string;

	}
}
?>
