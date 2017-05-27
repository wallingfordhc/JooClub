<?php
defined('_JEXEC') or die;

?>

<form action="<?php echo JRoute::_('index.php?option=com_clubmanager&layout=edit&matchID='.(int) $this->item->matchID); ?>" method="post" name="adminForm" id="adminForm" class="form-validate">
  <div class="row-fluid">
    <div class="span10 form-horizontal">

  <fieldset>
    <?php echo JHtml::_('bootstrap.startPane', 'myTab', array('active' => 'details')); ?>

      <?php echo JHtml::_('bootstrap.addPanel', 'myTab', 'details', empty($this->item->matchID) ? JText::_('COM_CLUBMANAGER_NEW_MATCH', true) : JText::sprintf('COM_CLUBMANAGER_EDIT_MATCH', $this->item->matchID, true)); ?>
        <div class="control-group">
          <div class="control-label"><?php echo $this->form->getLabel('hometeamID'); ?></div>
          <div class="controls"><?php echo $this->form->getInput('hometeamID'); ?></div>
        </div>
		<div class="control-group">
          <div class="control-label"><?php echo $this->form->getLabel('awayteamID'); ?></div>
          <div class="controls"><?php echo $this->form->getInput('awayteamID'); ?></div>
        </div>
      <?php echo JHtml::_('bootstrap.endPanel'); ?>

      <input type="hidden" name="task" value="" />
      <?php echo JHtml::_('form.token'); ?>

    <?php echo JHtml::_('bootstrap.endPane'); ?>
    </fieldset>
    </div>
  </div>
</form>