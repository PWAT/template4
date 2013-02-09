<?php
class Meta{

   function metadata($ptitle){
	  $meta = '';
      // Formulate the description for each page.
      if(empty($ptitle)){
         $description = $this->description;
      } else {
         $description = "$ptitle - $this->description";
      }

      // Make the keywords of the title lower case
      $keywords = strtolower($ptitle);

      // Replace double spaces with single spaces
      $keywords = str_replace("  ", " ", $keywords);

      // Make string comma seperated
      $meta_words = str_replace(" ", ", ", $keywords);

      // If no Page Title, Use Alternative
      if(!$ptitle){
         $meta .= "<TITLE>$this->sitename - ".
         $meta .= "$this->slogan</TITLE>\n";
      } else {
         $meta .= "<TITLE>$this->sitename: ".
         $meta .= "$ptitle</TITLE>\n";
      }
     
      // Append META content to the $meta string for output
      $meta .= "<META NAME=\"KEYWORDS\"
       CONTENT=\"$meta_words, $this->keywords2\">\n";
      $meta .= "<META NAME=\"DESCRIPTION\"
       CONTENT=\"$this->description\">\n";
      $meta .= "<META NAME=\"ROBOTS\"
      CONTENT=\"INDEX,FOLLOW\">\n";
      $meta .= "<META NAME=\"GENERATOR\"
       CONTENT=\"$this->company_name\">\n";
      $meta .= "<META NAME=\"AUTHOR\"
       CONTENT=\"$this->company_name\">\n";
      $meta .= "<META NAME=\"REVISIT-AFTER\"
       CONTENT=\"2 DAYS\">\n";
      $meta .= "<META NAME=\"RESOURCE-TYPE\"
      CONTENT=\"document\">\n";
      $meta .= "<META NAME=\"COPYRIGHT\"
      CONTENT=\"Copyright (c) 2003
       $this->company_name\">\n";
      $meta .= "<META NAME=\"DISTRIBUTION\"
       CONTENT=\"Global\">\n";
      $meta .= "<META NAME=\"GENERATOR\"
       CONTENT=\"$this->generator\">\n";
      $meta .= "<META NAME=\"RATING\"
      CONTENT=\"GENERAL\">\n";
      $meta .= "<META HTTP-EQUIV=\"REPLY-TO\"
      CONTENT=\"webmaster@yourdomain.com\">\n";
      $meta .= "<META HTTP-EQUIV=\"Content-Type\"
      CONTENT=\"text/html;
       charset=iso-8859-1\">\n";

      return $meta;
   }
}
?>