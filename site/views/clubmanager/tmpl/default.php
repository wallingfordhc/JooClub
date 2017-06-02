<?php
defined('_JEXEC') or die;
?>

<table class="table table-striped" id="matchList">
      
      <tbody>
      <?php 
	  $groupdate=null;
	  foreach ($this->items as $i => $item) :
	  if ($group_date !== substr($item->pushback, 0, 10)) {
        $group_date = substr($item->pushback, 0, 10);
		$displaydate = date_create($group_date);
		
		echo "<tr><td colspan=5><h1 class='cbmatchdate'>" . date_format($displaydate, 'jS M') . "</h1></td></tr>\n";
    }
    echo "${row['query']}<br>\n";
        ?>
        <tr class="row<?php echo $i % 2; ?>">
		  
          <td class="nowrap has-context cmmatches_sides cmmatches__homeside ">
            <a href="<?php echo JRoute::_('index.php?option=com_clubmanager&view=match&matchID='.(int) $item->matchID); ?>">
              <?php echo $this->escape($item->hometeamname); ?>
            </a>
          </td>
		  <td class="nowrap has-context cmmatches__scores 

		  <?php
		  if (intval($item->homescore) > intval($item->awayscore)) {
		  	  echo "cmmatches_homewin ";
		  }
		  if (intval($item->homescore) < intval($item->awayscore)) {
		  	  echo "cmmatches_awaywin ";
		  }
		  if (intval($item->homescore) = intval($item->awayscore)) {
		  	  echo "cmmatches_draw ";
		  }
		  ?>

		  ">
		  <?php echo $this->escape($item->homescore); ?>
		
		-		
              <?php echo $this->escape($item->awayscore); ?>
            </a>
          </td>
		  <td class="nowrap has-context cmmatches__sides cmmatches__awayside">
              <?php echo $this->escape($item->awayteamname); ?>
            </a>
          </td>
		  <td class="nowrap has-context cmmatches__sides cmmatches__status">
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