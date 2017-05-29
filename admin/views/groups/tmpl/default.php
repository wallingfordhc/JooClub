<?php
defined('_JEXEC') or die;

$listOrder  = '';
$listDirn  = '';
?>

<form action="<?php echo JRoute::_('index.php?option=com_clubmanager&view=groups'); ?>" method="post" name="adminForm" id="adminForm">
  <div id="j-main-container" class="span10">

    <div class="clearfix"> </div>
    <table class="table table-striped" id="groupList">
      <thead>
        <tr>
          <th width="1%" class="hidden-phone">
            <input type="checkbox" name="checkall-toggle" value="" title="<?php echo JText::_('JGLOBAL_CHECK_ALL'); ?>" onclick="Joomla.checkAll(this)" />
          </th>
		  <th class="title">
            <?php echo JHtml::_('grid.sort', 'COM_CLUBMANAGER_GROUPNAME_TITLE', 'groupname', $listDirn, $listOrder); ?>
          </th>
          <th class="title">
            <?php echo JHtml::_('grid.sort', 'COM_CLUBMANAGER_GROUPLOGO_TITLE', 'grouplogo', $listDirn, $listOrder); ?>
          </th>
		  <th class="title">
            <?php echo JHtml::_('grid.sort', 'COM_CLUBMANAGER_DESCRIPTION_TITLE', 'description', $listDirn, $listOrder); ?>
          </th>
		  
		  
        </tr>
      </thead>
      <tbody>
      <?php foreach ($this->items as $i => $item) :
        ?>
        <tr class="row<?php echo $i % 2; ?>">
          <td class="center hidden-phone">
            <?php echo JHtml::_('grid.id', $i, $item->groupID); ?>
          </td>
		
          <td class="nowrap has-context">
            <a href="<?php echo JRoute::_('index.php?option=com_clubmanager&task=match.edit&groupID='.(int) $item->groupID); ?>">
              <?php echo $this->escape($item->groupname); ?>
            </a>
          </td>
		  <td class="nowrap has-context">
		    <img src="<?php echo JURI::root(); echo $this->escape($item->grouplogo); ?>" alt = "logo for <?php echo $this->escape($item->groupname); ?>" width=100>
              
            </a>
          </td>
		  
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    <input type="hidden" name="task" value="" />
    <input type="hidden" name="boxchecked" value="0" />
    <input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>" />
    <input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>" />
    <?php echo JHtml::_('form.token'); ?>
  </div>
</form>