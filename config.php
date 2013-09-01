<?php if(!defined('PLX_ROOT')) exit; ?>

<?php

# Control du token du formulaire
plxToken::validateFormToken($_POST);

if(!empty($_POST)) {
	$plxPlugin->setParam('accountId', $_POST['accountId'], 'string');
	$plxPlugin->saveParams();
	header('Location: parametres_plugin.php?p=plxMyGoogleAnalytics');
	exit;
}
?>

<h2><?php echo $plxPlugin->getInfo('title') ?></h2>
<p><?php $plxPlugin->lang('L_DESCRIPTION'); ?></p>

<form action="parametres_plugin.php?p=plxMyGoogleAnalytics" method="post">
	<fieldset>
		<p class="field"><label for="accountId"><?php $plxPlugin->lang('L_ACCOUNT_ID'); ?> : </label></p>
		<input type="text" name="accountId" value="<?php echo plxUtils::strCheck($plxPlugin->getParam('accountId')) ?>" />
		&nbsp;ex:&nbsp;XX-XXXXXXXX-X
		<p>
			<?php echo plxToken::getTokenPostMethod() ?>
			<input type="submit" name="submit" value="<?php $plxPlugin->lang('L_SAVE'); ?>" />
		</p>
	</fieldset>
</form>
