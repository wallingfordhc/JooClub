
<?php
defined('_JEXEC') or die;
class clubmanagerControllerplayer extends JControllerForm
{
// overrides the standard save to include the file upload

function save($key = null, $urlVar = null){
    // ---------------------------- Uploading the file ---------------------
    // Neccesary libraries and variables
    jimport( 'joomla.filesystem.folder' );
    jimport('joomla.filesystem.file');

    $jinput = JFactory::getApplication()->input;
    $files = $jinput->files->get('jform');
    $filename = $files['profileimage_url']['name'];
    $folder =  "images" . "/" . "profileimages";

    // Create the folder if not exists in images folder
    if ( !JFolder::exists( $folder ) ) {
        JFolder::create( $folder, 0777 );
    }

    $src = $files['profileimage_url']['tmp_name'];
    
	$dest = $folder . "/" . $filename;
	$fulldest = JPATH_SITE."/". $dest;

    if (isset($files['profileimage_url'])) {
        JFile::upload( $src, $fulldest );
    }

    $db = JFactory::getDBO();
    $query = $db->getQuery(true);
    $cid =  $jinput->get('personID');

    $fields = array($db->quoteName('profileimage_url') . " = " . $db->quote($dest));
    $conditions = array($db->quoteName('personID') . " = " . $cid);

    $query
        ->update($db->quoteName('#__cmperson'))->set($fields)->where($conditions);

		$db->setQuery($query);
    $db->execute($query);

    return parent::save($key = null, $urlVar = null);
   }
}
