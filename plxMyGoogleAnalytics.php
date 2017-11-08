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
		if(!isset($_GET['preview']) AND $this->getParam('accountId') AND $this->getParam('websiteUrl'))
			$this->addHook('ThemeEndHead', 'ThemeEndHead');
	}

	public function ThemeEndHead() {

		$string = "\n
<script><!-- code Google Analytics -->
var gaq; 
var _gaq = gaq || [];
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){ (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o), m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m) })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
ga('create', '".$this->getParam('accountId')."', '".$this->getParam('websiteUrl')."');
ga('send', 'pageview');\n";
		if($this->getParam('bounceRate')>0) {
			$rate = (int)$this->getParam('bounceRate') * 1000;
			$string .= "setTimeout(_gaq.push(['_trackEvent', '".$this->getParam('bounceRate')."_seconds', 'read']),".$rate.");";
		}
		$string .= "\n</script>\n";
		echo $string;
	}
}
?>
