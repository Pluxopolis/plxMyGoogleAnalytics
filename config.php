<?php if(!defined('PLX_ROOT')) exit; ?>

<?php

# Control du token du formulaire
plxToken::validateFormToken($_POST);

if(!empty($_POST)) {
	$plxPlugin->setParam('accountId', $_POST['accountId'], 'string');
	$plxPlugin->setParam('websiteUrl', $_POST['websiteUrl'], 'string');
	$plxPlugin->setParam('bounceRate', $_POST['bounceRate'], 'numeric');
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
		<p class="field"><label for="websiteUrl"><?php $plxPlugin->lang('L_WEBSITE_URL'); ?> : </label></p>
		<input type="text" name="websiteUrl" value="<?php echo plxUtils::strCheck($plxPlugin->getParam('websiteUrl')) ?>" />
		&nbsp;ex:&nbsp;mywebsite.com
		<p class="field"><label for="bounceRate"><?php $plxPlugin->lang('L_BOUNCE_RATE'); ?> : </label></p>
		<input type="text" name="bounceRate" value="<?php echo plxUtils::strCheck($plxPlugin->getParam('bounceRate')) ?>" />
		&nbsp;<?php $plxPlugin->lang('L_BOUNCE_RATE_HELP1'); ?>
		<a class="help" title="<?php $plxPlugin->lang('L_BOUNCE_RATE_HELP2'); ?>">&nbsp;</a>
		<p>
			<?php echo plxToken::getTokenPostMethod() ?>
			<input type="submit" name="submit" value="<?php $plxPlugin->lang('L_SAVE'); ?>" />
		</p>
	</fieldset>
</form>
