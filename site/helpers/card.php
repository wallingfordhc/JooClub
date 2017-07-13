<?php
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
         
         //get player info
         
         $player = new person($personID);

	 // Add age group
	 imagettftext( $outputimage,60,0,600,100,$black,$fontfile,$player->agegroup);

	 // Add photo or avatar

	 // Add name
	 imagettftext( $outputimage,50,0,400,250,$black,$fontfile,$player->firstname);


	 // Add emergency contact
	 imagettftext( $outputimage,50,0,400,380,$black,$fontfile,$player->icenumber);

	 // Add emergency contact name and relationship
	 imagettftext( $outputimage,20,0,450,410,$black,$fontfile,$player->icename." - ".$player->icerelationship);

	 // Add membership number
	 $fontfile = $fontfolder."CODE39U.TTF";
	 imagettftext( $outputimage,80,0,400,600,$black,$fontfile,$player->membershipnumber);
         // Add QR code
         
         QRcode::png('Wildcats forever', 'test.png', 'L', 4, 2);
         $qrimage = imagecreatefrompng('test.png');

	 // Add badges



	 //save image
	 imagepng($outputimage, JPATH_SITE.$ouputimagepath);

	 // echo image to html0
	 echo ("<img src=".JURI::base().$ouputimagepath.">");

	 // release the memory
	 imagedestroy($outputimage);
 }
}
