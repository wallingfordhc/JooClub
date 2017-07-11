<?php
defined('_JEXEC') or die;
class clubmanagerControllerplayer extends JControllerForm
{
// overrides the standard save to include the file upload of profile image

function save($key = null, $urlVar = null){
    // save the profile image file if one has been included
    // Neccesary libraries and variables


    jimport( 'joomla.filesystem.folder' );
    jimport('joomla.filesystem.file');

    $jinput = JFactory::getApplication()->input;
    $files = $jinput->files->get('jform');
    $filename = $files['profileimage_url']['name'];
	$folder = "images" . "/" . "profileimages";
	$newprofileimage_url = $folder . "/" . $filename;
	$oldprofileimage_url = $jinput->get('oldprofileimage_url');

    // if no filename is specified set new location == old file name
    if (empty($filename))
    {
    	$newprofileimage_url = $jinput->get('oldprofileimage_url');
    }

    // if delete image checkbox is set then set new location to blank
// @TODO include default avatar image
	if ($jinput->get('deleteimage')=="on")
	{
		$newprofileimage_url = "";
	}

    // if we have a new location for the profile image...
	if ($newprofileimage_url != $oldprofileimage_url)
	{


		// Create the folder if not exists in images folder
		if (!JFolder::exists($folder))
		{
			JFolder::create($folder, 0777);
		}

		$src = $files['profileimage_url']['tmp_name'];

		$dest     = $folder . "/" . $filename;
		$fulldest = JPATH_SITE . "/" . $dest;

		// if there is a file to move and a set place to move it to ...
		if ( isset($files['profileimage_url']) && !empty($newprofileimage_url) )
		{
			JFile::upload($src, $fulldest);
		}

		$db    = JFactory::getDBO();
		$query = $db->getQuery(true);
		$cid   = $jinput->get('personID');

		$fields     = array($db->quoteName('profileimage_url') . " = " . $db->quote($newprofileimage_url));
		$conditions = array($db->quoteName('personID') . " = " . $cid);

		$query
			->update($db->quoteName('#__cmperson'))->set($fields)->where($conditions);

		$db->setQuery($query);
		$db->execute($query);
	}
    return parent::save($key = null, $urlVar = null);
   }

}

