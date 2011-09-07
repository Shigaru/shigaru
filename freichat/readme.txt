				|---------------------------------|
 				|--     FreiChatX[eXtended] 	--|
                		|---------------------------------|


How is FreiChatX different from the earlier versions?

FreiChatx is derived from the latest version of FreiChatPure,but its almost a complete rewrite

Please check the To_Do_list.txt file! its what i personally use!

Major bugs such as when the user opened multiple tabs is solved

1. faster loading of js files
2. themes support (no more boring colors)
3. different versions such as FreiChat,FreiChatPure,FreiChatSocial is integrated into one FreiChatX (this is ment to eliminate the confusion)
4. FreiChatX is meant to work with desktop and mobile apps (these are under development)
5. FreichatX is 10x faster since it wont depend on joomla anymore... it will work on any site supporting PHP and any database management system.this means it will work on joomla,drupal,wordpress,phpbb etc etc etc seamlessly.(however this comes at a price, installations wont be out of the box)

=========================================================================================================================

1. INSTALLATION

=========================================================================================================================

a) PreRequisites
   * PHP 5.0
   * MySql or any other additional database installed

b) Procedure
   * Unzip the downloaded archive freichatx.
   * Place the freichat folder in your CMS installed directory.

    For Example, If you have installed joomla , freichat folder should be placed in
    /your/joomla/installed/directory/freichat

   * Enter the following path  for installation
     http://your/cms/installed/directory/freichat/installation/index.php

   * Fill in the required details and after installation your settings will be
     saved in /freichat/arg.php
     You can change your password in that file.

     Please Note By default the password will be "adminpass"

c) Parameters
   * For customizing freichat you can edit all its parameters
     by entering the following path
     http://your/cms/installed/directory/freichat/administrator

     Or you can directly edit the file as well as change database settings in
     /your/joomla/installed/directory/freichat/arg.php
=========================================================================================================================

2.  Theming in FreiChatX

=========================================================================================================================

a) Themes may be found in ~/freichat/client/jquery/freichat_themes/

b) These themes are created such that they may not match with your web site
   design (This is done to encourage people to create their own themes)

c) To make a theme just copy any default theme folder and rename it with
   any name of your choice
   Note:Do not create theme from scratch because freichat wont recognize
   your images ,always start by copying the default theme folder and then
   modifying it.

d) The default theme folder consists of images a css file(css.php)
   and argument.php(includes arguments for theme)that can be edited according to your needs

e) If you change the names of any images don't forget to edit argument.php in
   the theme folder

f) you can switch the themes via 'arg.php'  or from parameters as mentioned in 1.C



=========================================================================================================================

3.  Language Packs in FreiChatX

=========================================================================================================================

a) There are language files with extension .php in folder lang and by default, currently
   freichat only supports english language (I know only english!)

b) You are free to  create your own language pack with the name of your language and with
   extension .php for example greek.php (Preferrably use full names of languages)
   and placing them in lang folder

c) you can switch the languages via 'arg.php'  or from parameters as mentioned in 1.C

d) While creating language file, please copy the default file and change only the text ,
   in double inverted commas, and do not change any variable names and please see to it
   that the top comments are in every language file

=========================================================================================================================

2.  TroubleShooting in FreiChatX

=========================================================================================================================

-------------------------------------------------------------------------------------------------------------------------
NOTE::Before resolving any errors,
      Make sure your password and other details are correct in ~/freichat/arg.php
-------------------------------------------------------------------------------------------------------------------------

a) Note anyone wanting cyrillic characters or having issues with languages in chat must disable wordwrap.
   One can do that by going to
   ~/freichat/server/freichat.php
   Search and comment the following line:
   $message=mywordwrap($message);
   It should look this way:
   //$message=mywordwrap($message);

b) The chatbox shows no one is online [Even when they are online]

 * Make sure your password and other details are correct in ~/freichat/arg.php
 * Download firebug for firefox and see if all the requests are going without
   errors, If you get any errors please report me
   In firebug if there are errors, freichat may log notices regarding errors
   so keep a watch for that

c) Messages are not appended on the other chat window or there is no sound.
    Try Deleting your browser cookies then close the browser and then check again
    if the problem persists.

d) Getting Permission denied errors in freichat/administrator
   Make sure the file ~/freichat/arg.php is writable


=========================================================================================================================

4.  Debugging in FreiChatX

=========================================================================================================================

a) To start debugging , go to ~/freichat/arg.php and change the parameter of $debug as
   $debug=true;

b) Once debugging is enabled freichat will create a log named freix.log in ~freichat/ ,
   you can then  check for any errors in that file.

c) Afterwards please do not forget to disable debugging in ~/freichat/arg.php and also
   delete freix.log file


=========================================================================================================================

5.  Our Expectations from the users/community:

=========================================================================================================================

1. if you have created your own theme you may submit it back to the community
2. we need language packs, if anyone is interested let me know(evnix.com@gmail.com)
