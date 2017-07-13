class card
{
 function creatememcard($personID = null)
 {
     // set folder paths for the membership card images
	 // set location to find the blank card
     $templatefolder = "/media/com_clubmanager/membershipcards/";
	 $templatefile = "blank/Membershipcardfront-Blank_FrontFace.png";
	 // set location to save the updated card
	 $ouputimagepath = $templatefolder . "memcard" . $personID . ".png";
	 // set location of the font files
	 $fontfolder = JPATH_SITE."/media/com_clubmanager/fonts/";


	 //get blank card
	 $outputimage = imagecreatefrompng(JPATH_SITE.$templatefolder.$templatefile);
	// set the default color
	 $black = imagecolorallocate($outputimage, 0, 0, 0);
	 // set the default font
	 $fontfile = $fontfolder."ERASDEMI.TTF";


	 // Add age group
	 imagettftext( $outputimage,60,0,600,100,$black,$fontfile,"U12");

	 // Add photo or avatar

	 // Add name
	 imagettftext( $outputimage,50,0,400,250,$black,$fontfile,"lucy Shannon");


	 // Add emergency contact
	 imagettftext( $outputimage,50,0,400,380,$black,$fontfile,"07771 973872");

	 // Add emergency contact name and relationship
	 imagettftext( $outputimage,20,0,450,410,$black,$fontfile,"Freddy Shannon - mum");

	 // Add membership number
	 $fontfile = $fontfolder."CODE39U.TTF";
	 imagettftext( $outputimage,80,0,400,600,$black,$fontfile,"10023456");

	 // Add badges



	 //save image
	 imagepng($outputimage, JPATH_SITE.$ouputimagepath);

	 // echo image to html0
	 echo ("<img src=".JURI::base().$ouputimagepath.">");

	 // release the memory
	 imagedestroy($outputimage);
 }
}
