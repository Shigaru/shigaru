<?php
// WARNING: No blank line or spaces before the "< ? p h p" above this.

// IMPORTANT: This file should be made in UTF-8 (without BOM) only.
// CB will automatically convert to site's local character set.

/**
* Joomla/Mambo Community Builder
* @version $Id: traditional_chinese.php 609 2006-12-13 17:30:15Z beat $
* @package Community Builder
* @subpackage traditional chinese CB-Team Plugins Language file (T-chinese)
* @author which
* @copyright (C) www.whichworkstation.com
* @license http://creativecommons.org/licenses/by-sa/2.5/tw/
*/

// ensure this file is being included by a parent file:
if ( ! ( defined( '_VALID_CB' ) || defined( '_JEXEC' ) || defined( '_VALID_MOS' ) ) ) { die( 'Direct Access to this location is not allowed.' ); }

// 1.2 Stable:
// ProfileBook plugin: (new method: UTF8 encoding here):
CBTxt::addStrings( array(
'Profile Book' => '個人資料通訊錄',
'Name' => '名稱',
'Entry' => '項目',
'Profile Book Description' => '個人資料通訊錄描述',
'Created On: %s' => '建立於: %s',
'Edited By %s On: %s' => '編輯由 %s 在: %s',
'<br /><strong>[注意: </strong><em>由網站版主最後編輯</em><strong>]</strong>' => '<br /><strong>[注意: </strong><em>由網站版主最後編輯</em><strong>]</strong>',
'Users Feedback:' => '使用者回饋:',
'Edited by Site Moderator' => '已經網站版主編輯',
'Comments' => '評論',
'Name' => '名稱',
'Email' => 'Email',
'Location' => '位置',
'This user currently doesn\'t have any posts.' => '此使用者目前沒有任何張貼.',
'User Rating' => '使用者評分',
'Web Address' => '網址',
'Submit Entry' => '提交項目',
'Update Entry' => '更新項目',
'Enable Profile Entries' => '啟用個人資料項目',
'Auto Publish' => '自動發佈',
'Notify Me' => '提醒我',
'Enable visitors to your profile to make comments about you and your profile.' => '讓訪客可以至您的個人資料評論關於您以及您的個人資料.',
'Enable Auto Publish if you want entries submitted to be automatically approved and displayed on your profile.' => '啟用自動發佈如果您要提交的項目可以自動核准並且顯示在您的個人資料.',
'Enable Notify Me if you would like to receive an email notification each time someone submits an entry.  This is recommended if you are not using the Auto Publish feature.' => '啟用提醒我如果您要每次某人提交項目時收到一封提醒的 email.  建議使用如果您沒有使用自動發佈功能.',
'Bold' => '粗體',
'Italic' => '斜體',
'Underline' => '底線',
'Quote' => '引號',
'Code' => '代碼',
'List' => '列出',
'List' => '清單',
'Image' => '影像',
'Link' => '連結',
'Close' => '關閉',
'Color' => '顏色',
'Size' => '大小',
'Item' => '項目',
'Bold text: [b]text[/b]' => '粗體文字: [b]文字[/b]',
'Italic text: [i]text[/i]' => '斜體文字: [i]文字[/i]',
'Underline text: [u]text[/u]' => '底線文字: [u]文字[/u]',
'Quoted text: [quote]text[/quote]' => '引號文字: [quote]文字[/quote]',
'Code display: [code]code[/code]' => '顯示代碼: [code]代碼[/code]',
'Unordered List: [ul] [li]text[/li] [/ul] - Hint: a list must contain List Items' => '未排序清單: [ul] [li]文字[/li] [/ul] - 提示: 一份清單必須包含清單項目',
'Ordered List: [ol] [li]text[/li] [/ol] - Hint: a list must contain List Items' => '排序的清單: [ol] [li]文字[/li] [/ol] - 提示: 一份清單必須包含清單項目',
'Image: [img size=(01-499)]http://www.google.com/images/web_logo_left.gif[/img]' => '影像: [img size=(01-499)]http://www.google.com/images/web_logo_left.gif[/img]',
'Link: [url=http://www.zzz.com/]This is a link[/url]' => '連結: [url=http://www.zzz.com/]這是一個連結[/url]',
'Close all open bbCode tags' => '關閉所有打開的 bbCode 標籤',
'Color: [color=#FF6600]text[/color]' => '顏色: [color=#FF6600]文字[/color]',
'Size: [size=1]text size[/size] - Hint: sizes range from 1 to 5' => '大小: [size=1]文字大小[/size] - 提示: 大小範圍從 1 到 5',
'List Item: [li] list item [/li] - Hint: a list item must be within a [ol] or [ul] List' => '列出項目: [li] 清單項目 [/li] - 提示: 清單項目必須包在 [ol] 或 [ul] 裏',
'Dimensions' => '維度',
'File Types' => '檔案類型',
'Submit' => '提交',
'Preview' => '預覽',
'Cancel' => '取消',
'User Comments' => '使用者評論',
'Your Feedback' => '您的回饋',
'Edit' => '編輯',
'Update' => '更新',
'Delete' => '刪除',
'Publish' => '發佈',
'Sign Profile Book' => '簽個人資料通訊錄',
'Give Feedback' => '給個回饋',
'Edit Feedback' => '編輯回饋',
'Un-Publish' => '不發佈',
'Not Published' => '不發佈',
'Color' => '顏色',
'Size' => '大小',
'Very Small' => '極小',
'Small' => '小',
'Normal' => '正常',
'Big' => '大',
'Very Big' => '極大',
'Close All Tags' => '關閉所有標籤',
'Standard' => '標準',
'Red' => '紅色',
'Purple' => '紫色',
'Blue' => '藍色',
'Green' => '綠色',
'Yellow' => '黃色',
'Orange' => '橘色',
'Darkblue' => '深藍',
'Gold' => '金色',
'Brown' => '咖啡',
'Silver' => '銀色',
'You have received a new entry in your %s' => '您收到一個新的項目在您的 %s',
'%s has just submitted a new entry in your %s.' => '%s 已提交一個新的項目在您的 %s.',
'An entry in your %s has just been updated' => '一個項目在您的 %s 已被更新',
'%s has just submitted an edited entry for %s in your %s.' => '%s 已提交一個編輯過的項目給 %s 在您的 %s.',
"\n\nYour current setting is that you need to review entries in your %1\$s. Please login, review the new entry and publish if you agree. Direct access to your %1\$s:\n%2\$s\n" => "\n\n您目前的設定為您需要在您的 %1\$s 先檢視新項目. 請登入, 檢視新項目並發佈如果您同意. 直接存取您的 %1\$s:\n%2\$s\n",
"\n\nYour current setting is that new entries in your %1\$s are automatically publihed. To see the new entry, please login. You can then see the new entry and take appropriate action if needed. Direct access to your %1\$s:\n%2\$s\n" => "\n\n您目前的設定為在您 %1\$s 的新項目會自動發佈. 觀看新項目, 請登入. 然後您可以觀看新項目並且採取相關行動如果需要的話. 直接存取您的 %1\$s:\n%2\$s\n",
'Name is Required!' => '名稱為必要的!',
'Email Address is Required!' => 'Email 地址為必要的!',
'Comment is Required!' => '評論為必要的!',
'User Rating is Required!' => '使用者評分為必要的!',
'You have not selected a User Rating. Do you really want to provide an Entry without User Rating ?' => '您尚未選擇使用者評分. 您確定要提供一個項目而不使用評分 ?',
'Return Gesture' => '返回手勢',
'Profile Rating' => '個人資料評分',
'You have not selected your User Rating.' => '您尚未選擇您的使用者評分.',
'Would you like to give a User Rating ?' => '您要給個使用者評分嗎 ?',
'Do you really want to delete permanently this Comment and associated User Rating ?' => '您要永遠地刪除這個評論以及相關的使用者評分 ?',
'You are about to edit somebody else\'s text as a site Moderator. This will be clearly noted. Proceed ?' => '您正以網站版主身分在編輯某人的文字. 在此鄭重告知. 繼續 ?',
'Hidden' => '隱藏',
'Feedback from %s: ' => '回饋從 %s: ',
'Poor' => '差勁',
'Best' => '最好',
// 1.2:
'Vote %s star' => '投下 %s 個星星',
'Vote %s stars' => '投下 %s 個星星',
'Cancel Rating' => '取消評分',
'Average Profile Rating by other users' => '由其他使用者投下的個人資料評分平均值'
) );

// Profile Gallery plugin: (new method: UTF8 encoding here):
CBTxt::addStrings( array(
'CB Profile Gallery' => 'CB 個人資料圖庫',
'This tab contains a basic no-frills image Gallery for CB profiles' => '此標籤包含一個給 CB 個人資料使用的基本無邊框的影像圖庫',
'Current Items' => '目前項目',
'Keeps track of number of stored items' => '記下儲存的項目數量',
'Date of last update to Gallery items in this profile' => '此個人資料圖庫項目的最後更新日期',
'Last Update' => '最後更新',
'Enable Gallery' => '啟用圖庫',
'Select Yes or No to turn-on or off the Gallery Tab' => '選擇 是 或 否 來啟用或關閉圖庫標籤',
'Short Greeting' => '簡短問候語',
'Enter a short greeting for your gallery viewers' => '輸入一段簡短問候語給您的圖庫瀏覽者',
'Item Quota' => '項目限額',
'The admin may use this to over-ride the default value of allowable items for each profile owner' => '管理員可以利用此來取代給每位個人資料擁有者所允許項目數量預設的值',
'No Items published in this profile gallery' => '此個人資料圖庫沒有項目發佈',
'Title:' => '標題:',
'Description:' => '描述:',
'Image File:' => '影像檔案:',
'Submit New Gallery Entry' => '提交新的圖庫項目',
'Submit Gallery Entry' => '提交圖庫項目',
'A file must be selected via the Browse button' => '檔案必須由瀏覽按鈕來選擇',
'A gallery item title must be entered' => '必須輸入圖庫項目的標題',
'Autopublish items' => '自動發佈項目',
'Select Yes or No to autopublish or not newly uploaded gallery items' => '選擇 是 或 否 來自動或不自動發佈新上傳的圖庫項目',
'Current Storage' => '目前儲存',
'This field keeps track of the total size of all uploaded gallery items - like a quota usage field. Value is in bytes.' => '此欄位記錄著所有上傳圖庫項目的總計大小 - 類似總量限額欄位. 以位元組顯示.',
'Greetings - connections only viewing enabled' => '您好 - 瀏覽僅限連線啟用',
'Sorry - connections only viewing enabled for this gallery that currently has %1$d items in it.' => '抱歉 - 瀏覽此 %1$d 個項目的圖庫僅限連線 已啟用.',
'Automatically approve' => '自動核准',
'This value can be set by the admin to over-ride the gallery plugin backend default approval parameter' => '管理員可以更改圖庫外掛後台預設核准的值',
'Storage Quota (KB)' => '儲存額度 (KB)',
'This value can be set by the admin to over-ride the gallery plugin backend default user quota' => '管理員可以更改圖庫外掛後台預設的使用者額度',
'Maximum allowable single upload size exceeded - gallery item rejected' => '超過單一最大允許上傳大小 - 圖庫項目已駁回',
'File extension not authorized' => '檔案副檔名未認可',
/**
 * Parameters available for use in _pg_QuotaMessage language string
 * %1$d ~ Total count of items uploaded
 * %2$d ~ Maximum uploaded items allowed
 * %3$d ~ Total KB of uploaded items
 * %4$d ~ Maximum KB of uploaded items allowed
 * %5$d ~ Consumed storage percentage of uploaded items
 * %6$d ~ Free storage percentage of uploaded items
 * %7$d ~ Maximum single upload size
 */
' [Your current quota marks: %1$d/%2$d items %3$d/%4$d Kbytes (%5$d%% consumed - %6$d%% free)]' => ' [您目前的額度: %1$d/%2$d 個項目 %3$d/%4$d Kbytes (%5$d%% 已使用 - %6$d%% 可用)]',
'This file would cause you to exceed you quota - gallery item rejected' => '此檔案將會讓您的額度超過 - 圖庫項目已駁回',
'Access Mode' => '存取模式',
'Select desirable access mode: Public access, Registered users only, Connected users only, REG-S for Registered-stealth, CON-S for Connections-stealth' => '選擇存取模式: 公開存取, 只限註冊使用者, 只限連線使用者, REG-S 給 註冊-暗中地, CON-S 給 連線-暗中地',
'Allow Public Access' => '允許公開存取',
'Allow Registered Access' => '允許已註冊存取',
'Allow Connections Access' => '允許連線存取',
'Registered Stealth Access' => '已註冊隱形存取',
'Connections Stealth Access' => '連線隱形存取',
'Display Format' => '顯示格式',
'Select Display Format to apply for gallery viewing.' => '選擇瀏覽圖庫的顯示格式.',
'Pictures gallery list format' => '圖片圖庫清單格式',
'File list format' => '檔案清單格式',
'Picture gallery list lightbox format' => '圖片圖庫清單lightbox格式',
'Gallery repository successfully created!' => '圖庫貯藏室已建立成功!',
'Gallery repository could not be created! Please notify system admin!' => '圖庫貯藏室無法建立! 請通知系統管理員!',
'Image ToolBox failure! - Please notify system admin - ' => '影像工具列失效! - 請通知系統管理員 - ',
'The file upload has failed! - Please notify your system admin!' => '檔案上傳失敗! - 請通知系統管理員!',
/**
 * Parameters available for use in _pg_FileUploadSucceeded and _pg_FileUploadAndTnSucceeded language strings
 * %1$s ~ Name of uploaded file in user repository
 */
'The file %1$s has been successfully uploaded!' => '檔案 %1$s 已成功上傳!',
'The file %1$s has been successfully uploaded and tn%1$s thumbnail created!' => '檔案 %1$s 已成功上傳並且建立 tn%1$s 縮圖!',
'Only Registered Members Allowed to view the %1$d items in this Gallery!' => '只限註冊的會員瀏覽此圖庫的 %1$d 個項目!',
'Delete' => '刪除',
'Publish' => '發佈',
'Unpublish' => '不發佈',
'Approve' => '核准',
'Revoke' => '撤銷',
'Default setting' => '預設設定',
'Are you sure you want to delete selected item ? The selected item will be deleted and cannot be undone!' => '您確定要刪除所選的項目 ? 所選的項目將被刪除且不能救回!',
'Max single upload (KB)' => '單一最大上傳 (KB)',
'This value can be set by the admin to over-ride the gallery plugin backend default maximum single upload size' => '管理員可以更改圖庫外掛後台預設單一檔案最大上傳的值',
'Updated' => '已更新',
'Title' => '標題',
'Description' => '描述',
'Download' => '下載',
'Actions' => '動作',
'Never' => '從不',
'Gallery Moderation' => '圖庫版面管理',
'This tab contains all pending autorization gallery items' => '此標籤包含所有等待核准的圖庫項目',
'New Gallery Item just uploaded' => '新圖庫項目已上傳',
/**
 * Parameters available for use in _pg_MSGBODY_NEW language string
 * %1\$s ~ item type
 * %2\$s ~ item title
 * %3\$s ~ item description
 * %4\$s ~ username
 * %5\$s ~ profile link
 */
"A new Gallery item has just been uploaded and may require approval.\n"
."This email contains the item details\n\n"
."Gallery Item Type - %1\$s\n"
."Gallery Item Title - %2\$s\n"
."Gallery Item Description - %3\$s\n\n"
."Username - %4\$s\n"
."Profile Link - %5\$s \n\n\n"
."Please do not respond to this message as it is automatically generated and is for information purposes only\n"
=>
"一個新的圖庫項目已被上傳並需要核准.\n"
."此 email 包含項目細節\n\n"
."圖庫項目類型 - %1\$s\n"
."圖庫項目標題 - %2\$s\n"
."圖庫項目描述 - %3\$s\n\n"
."使用者名稱 - %4\$s\n"
."個人資料連結 - %5\$s \n\n\n"
."請勿回此自動產生用來通知的訊息\n",

'Your Gallery Item has been approved!' => '您的圖庫項目已被核准!',

"A Gallery item in your Gallery Tab has just been approved by a moderator.\n\n\n"
."Please do not respond to this message as it is automatically generated and is for information purposes only\n"
=>
"您圖庫標籤中的項目已由版主核准.\n\n\n"
."請勿回此自動產生用來通知的訊息\n",

'Your Gallery Item has been revoked!' => '您的圖庫項目已被撤銷!',

"A Gallery item in your Gallery Tab has just been revoked by a moderator.\n\n\n"
."If you feel that this action is unjustified please contact one of our moderators.\n"
."Please do not respond to this message as it is automatically generated and is for information purposes only\n"
=>
"您圖庫標籤中的項目已被版主撤銷.\n\n\n"
."如果您覺得這並不公正請聯絡我們其中一位板主.\n"
."請勿回此自動產生用來通知的訊息\n",

'Your Gallery Item has been deleted!' => '您的圖庫項目已被刪除!',

"A Gallery item in your Gallery Tab has just been deleted by a moderator.\n\n\n"
."If you feel that this action is unjustified please contact one of our moderators.\n"
."Please do not respond to this message as it is automatically generated and is for information purposes only\n"
=>
"您圖庫標籤中的項目已被版主刪除.\n\n\n"
."如果您覺得這並不公正請聯絡我們其中一位板主.\n"
."請勿回此自動產生用來通知的訊息\n",

'Your Gallery item is pending approval by a site moderator.' => '您的圖庫項目正等待版主核准.',
'Your Gallery item quota has been reached. You must delete an item in order to upload a new one or you may contact the admin to increase your quota.' => '您的圖庫項目已到達限額. 您必須刪除一個項目才能上傳一個新的或是聯絡管理員增加您的限額.',
'Failed to be add index.html to the plugin gallery - please contact administrator!' => '增加 index.html 至圖庫外掛失敗 - 請聯絡管理員!',
'No item uploaded!' => '無項目上傳!',
/**
 * Parameters available for use in _pgModeratorViewMessage
 * %1$d ~ Total count of items uploaded
 * %2$d ~ Maximum uploaded items allowed
 * %3$d ~ Total KB of uploaded items
 * %4$d ~ Maximum KB of uploaded items allowed
 * %5$s ~ access mode setting
 * %6$s ~ display format setting
 */
'<font color=red>Moderator data:<br />'
.'Items - %1$d<br />'
.'Item Quota - %2$d<br />'
.'Storage - %3$d<br />'
.'Storage Quota - %4$d<br />'
.'Access Mode - %5$s<br />'
.'Display Mode - %6$s<br /></font>'
=>
'<font color=red>Moderator data:<br />'
.'Items - %1$d<br />'
.'Item Quota - %2$d<br />'
.'Storage - %3$d<br />'
.'Storage Quota - %4$d<br />'
.'Access Mode - %5$s<br />'
.'Display Mode - %6$s<br /></font>',

'Image ' => 'Image ',
' of ' => ' of ',
'Image {x} of {y}' => 'Image {x} of {y}',
/**
 * Following section defines language strings used in CB Gallery Module
 */
'No Viewable Items' => 'No Viewable Items',
'No items rendered' => 'No items rendered',

'Edit Gallery Item' => 'Edit Gallery Item',
'Edit' => 'Edit',
'Update' => 'Update',

'Bad File - Item rejected' => 'Bad File - Item rejected'
) );

// Privacy plugin: (new method: UTF8 encoding here):
CBTxt::addStrings( array(
'Visible on profile'					=>	'在個人資料可見',
'Only to logged-in users'				=>	'只限已登入使用者',
'Only for direct connections'			=>	'只限直接連線',
'Only for %s'							=>	'只給 %s',
'Also for connections\' connections'	=>	'也給連線的連線',
'Invisible on profile'					=>	'在個人資料隱藏',
'Access only to logged-in users. Please login.'					=>	'只限已登入使用者存取. 請登入.',
'Access only to logged-in users. Please login or %s.'				=>	'只限已登入使用者存取. 請登入或是 %s.',
'register'															=>	'註冊',
'Access only with login'											=>	'只限登入存取',
'Access only to directly connected users'							=>	'只限直接連線的使用者存取',
'Access only to directly connected users and friends of friends'	=>	'只限直接連線的使用者以及朋友的朋友存取',
));

// Activity plugin: (new method: UTF8 encoding here):
CBTxt::addStrings( array(
'updated his profile'					=>	'更新他的個人資料',
'is now'								=>	'現在',
'%s is now %s'							=>	'%s 現在 %s',
'%s and %s are now %s'					=>	'%s 跟 %s 現在 %s',
'connected'								=>	'已連線',
'%s and %s'								=>	'%s 跟 %s',
'%s, %s and %s'							=>	'%s, %s 跟 %s'	,
'%s, %s, %s and %s more'				=>	'%s, %s, %s 跟 %s 更多',
'%s added a new %s'						=>	'%s 新增一個新的 %s'	,
'%s added new %s'						=>	'%s 新增新的 %s',
'picture'								=>	'圖片',
'pictures'								=>	'圖片',
'profile book'							=>	'個人資料通訊錄',
'profile gallery'						=>	'個人資料圖庫',
'wall'									=>	'牆',
'%s added a new %s in %s'				=>	'%s 新增一個新的 %s 在 %s',
'%s added a new %s in %s\'s %s'		=>	'%s 新增一個新的 %s 在 %s的 %s',
'%s added a new %s in the %s'			=>	'%s 新增一個新的 %s 在 %s 裏',
'%s updated a %s in %s'				=>	'%s 更新一個 %s 在 %s',
'%s updated a %s in %s\'s %s'			=>	'%s 更新一個 %s 在 %s的 %s',
'%s updated a %s in the %s'			=>	'%s 更新一個 %s 在 %s 裏',
'comment'								=>	'評論',
'note'									=>	'註解',
'tag'									=>	'標籤',
'profile'								=>	'個人資料',
'rating'								=>	'評分',
'%s commented on %s\'s %s'				=>	'%s 評論在 %s的 %s',
'%s commented on own %s'				=>	'%s 評論在擁有的 %s',
'%s has joined'							=>	'%s 已加入',
'%s has posted on %s'					=>	'%s 已張貼在 %s',
'%s joined the %s %s'					=>	'%s 加入了 %s %s',
'group'									=>	'群組',
));
// Ratings fields plugin: (new method: UTF8 encoding here):
CBTxt::addStrings( array(
'Thank you for rating!'				=>	'感謝您的評分!',
'Click on a star to rate!'				=>	'點擊星星來評分!',
// Rate 1 Star:
'Rate %s %s'							=>	'評分 %s %s',
'Cancel Rating'							=>	'取消評分',
// following rating strings can be used/changed in field's param
'Self'									=>	'自己',
'Visitor'								=>	'訪客',
'Rating'								=>	'評分',
'Star'									=>	'星星',
'Stars'									=>	'星星',
'Poorest'								=>	'極差',
'Poor'									=>	'差勁',
'Average'								=>	'一般',
'Good'									=>	'不錯',
'Better'								=>	'很好',
'Best'									=>	'極好',
));

// IMPORTANT WARNING: The closing tag, "?" and ">" has been intentionally omitted - CB works fine without it.
// This was done to avoid errors caused by custom strings being added after the closing tag. ]
// With such tags, always watchout to NOT add any line or space or anything after the "?" and the ">".
