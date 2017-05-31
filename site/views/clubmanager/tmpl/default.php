<?php
defined('_JEXEC') or die;
?>

<table class="table table-striped" id="matchList">
      <thead>
        <tr>
          <th width="1%" class="hidden-phone">
            <input type="checkbox" name="checkall-toggle" value="" title="<?php echo JText::_('JGLOBAL_CHECK_ALL'); ?>" onclick="Joomla.checkAll(this)" />
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
            <?php echo JHtml::_('grid.sort', 'COM_CLUBMANAGER_matchesTATUS_TITLE', 'status', $listDirn, $listOrder); ?>
          </th>
		  
        </tr>
      </thead>
      <tbody>
      <?php 
	  $groupdate=null;
	  foreach ($this->items as $i => $item) :

	  if ($group_date !== substr($item->pushback, 0, 10)) {
        $group_date = substr($item->pushback, 0, 10);
        echo "<tr><td colspan=5><h1>$group_date</h1></td></tr>\n";
    }
    echo "${row['query']}<br>\n";
        ?>
        <tr class="row<?php echo $i % 2; ?>">
          <td class="center hidden-phone">
            <?php echo JHtml::_('grid.id', $i, $item->matchID); ?>
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