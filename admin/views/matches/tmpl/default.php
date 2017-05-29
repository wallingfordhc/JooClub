<?php
defined('_JEXEC') or die;

$listOrder = $this->escape($this->state->get('list.ordering'));
$listDirn = $this->escape($this->state->get('list.direction'));
?>

<form action="<?php echo JRoute::_('index.php?option=com_clubmanager&view=matches'); ?>" method="post" name="adminForm" id="adminForm">
  <div id="j-main-container" class="span10">

    <div class="clearfix"> </div>
    <table class="table table-striped" id="matchList">
      <thead>
        <tr>
          <th width="1%" class="hidden-phone">
            <input type="checkbox" name="checkall-toggle" value="" title="<?php echo JText::_('JGLOBAL_CHECK_ALL'); ?>" onclick="Joomla.checkAll(this)" />
          </th>
		  <th class="title">
            <?php echo JHtml::_('grid.sort', 'COM_CLUBMANAGER_PUSHBACK_TITLE', 'pushback', $listDirn, $listOrder); ?>
          </th>
          <th class="title">
            <?php echo JHtml::_('grid.sort', 'COM_CLUBMANAGER_HOMETEAM_TITLE', 'hometeamname', $listDirn, $listOrder); ?>
          </th>
		  <th class="title">
            <?php echo JHtml::_('grid.sort', 'COM_CLUBMANAGER_HOMETEAM_SCORE', 'homescore', $listDirn, $listOrder); ?>
          </th>
		  <th class="title">
            <?php echo JHtml::_('grid.sort', 'COM_CLUBMANAGER_AWAYTEAM_SCORE', 'awayscore', $listDirn, $listOrder); ?>
          </th>
		  <th class="title">
            <?php echo JHtml::_('grid.sort', 'COM_CLUBMANAGER_AWAYTEAM_TITLE', 'awayteamname', $listDirn, $listOrder); ?>
          </th>
		  <th class="title">
            <?php echo JHtml::_('grid.sort', 'COM_CLUBMANAGER_LOCATION_TITLE', 'location', $listDirn, $listOrder); ?>
          </th>
		  <th class="title">
            <?php echo JHtml::_('grid.sort', 'COM_CLUBMANAGER_MATCHSTATUS_TITLE', 'status', $listDirn, $listOrder); ?>
          </th>
		  
        </tr>
      </thead>
      <tbody>
      <?php foreach ($this->items as $i => $item) :
        ?>
        <tr class="row<?php echo $i % 2; ?>">
          <td class="center hidden-phone">
            <?php echo JHtml::_('grid.id', $i, $item->matchID); ?>
          </td>
		  <td class="nowrap has-context">
              <?php echo $this->escape($item->pushback); ?>
            </a>
          </td>
          <td class="nowrap has-context">
            <a href="<?php echo JRoute::_('index.php?option=com_clubmanager&task=match.edit&matchID='.(int) $item->matchID); ?>">
              <?php echo $this->escape($item->hometeamname); ?>
            </a>
          </td>
		  <td class="nowrap has-context">
              <?php echo $this->escape($item->homescore); ?>
            </a>
          </td>
		  <td class="nowrap has-context">
              <?php echo $this->escape($item->awayscore); ?>
            </a>
          </td>
		  <td class="nowrap has-context">
              <?php echo $this->escape($item->awayteamname); ?>
            </a>
          </td>
		  <td class="nowrap has-context">
              <?php echo $this->escape($item->location); ?>
            </a>
          </td>
		  <td class="nowrap has-context">
              <?php echo $this->escape($item->status); ?>
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