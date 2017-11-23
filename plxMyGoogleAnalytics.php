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

		echo '
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id='.$this->getParam('accountId').'"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag("js", new Date());
  gtag("config", "'.$this->getParam('accountId').'");
</script>
';

	}
}
?>
