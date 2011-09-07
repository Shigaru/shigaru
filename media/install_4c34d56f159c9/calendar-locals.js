// ** I18N

// Calendar zh_TW language
// Author: Which, <www.which.tw>
// Encoding: UTF-8
// Distributed under the same terms as the calendar itself.

// For translators: please use UTF-8 without BOM only.
// Also please include your contact information in the header, as can be seen above.

// full day names
Calendar._DN = new Array
("星期日",
 "星期一",
 "星期二",
 "星期三",
 "星期四",
 "星期五",
 "星期六",
 "星期日");

// Please note that the following array of short day names (and the same goes
// for short month names, _SMN) isn't absolutely necessary.  We give it here
// for exemplification on how one can customize the short day names, but if
// they are simply the first N letters of the full name you can simply say:
//
//   Calendar._SDN_len = N; // short day name length
//   Calendar._SMN_len = N; // short month name length
//
// If N = 3 then this is not needed either since we assume a value of 3 if not
// present, to be compatible with translation files that were written before
// this feature.

// short day names
Calendar._SDN = new Array
("Sun",
 "Mon",
 "Tue",
 "Wed",
 "Thu",
 "Fri",
 "Sat",
 "Sun");

// First day of the week. "0" means display Sunday first, "1" means display
// Monday first, etc.
Calendar._FD = 1;

// full month names
Calendar._MN = new Array
("一月",
 "二月",
 "三月",
 "四月",
 "五月",
 "六月",
 "七月",
 "八月",
 "九月",
 "十月",
 "十一月",
 "十二月");

// short month names
Calendar._SMN = new Array
("Jan",
 "Feb",
 "Mar",
 "Apr",
 "May",
 "Jun",
 "Jul",
 "Aug",
 "Sep",
 "Oct",
 "Nov",
 "Dec");

// tooltips
Calendar._TT = {};
Calendar._TT["INFO"] = "關於日曆";

Calendar._TT["ABOUT"] =
"DHTML Date/Time Selector\n" +
"(c) dynarch.com 2002-2005 / Author: Mihai Bazon\n" + // don't translate this this ;-)
"最新版本請拜訪: http://www.dynarch.com/projects/calendar/\n" +
"依照 GNU LGPL 傳播.  詳見 http://gnu.org/licenses/lgpl.html." +
"\n\n" +
"日期選擇:\n" +
"- 使用 \xab, \xbb 按鈕來選擇哪一年\n" +
"- 使用 " + String.fromCharCode(0x2039) + ", " + String.fromCharCode(0x203a) + " 按鈕來選擇月份\n" +
"- 在上面的按鈕按住滑鼠鍵不放可以快速選擇.";
Calendar._TT["ABOUT_TIME"] = "\n\n" +
"選擇時間:\n" +
"- 點擊時間的任一部分來增加\n" +
"- 或是按住 Shift 點擊來減少\n" +
"- 或是按住並且拖曳來快速選擇.";

Calendar._TT["PREV_YEAR"] = "前一年 (選單請按住)";
Calendar._TT["PREV_MONTH"] = "前一個月 (選單請按住)";
Calendar._TT["GO_TODAY"] = "到今天";
Calendar._TT["NEXT_MONTH"] = "下個月 (選單請按住)";
Calendar._TT["NEXT_YEAR"] = "下一年 (選單請按住)";
Calendar._TT["SEL_DATE"] = "選擇日期";
Calendar._TT["DRAG_TO_MOVE"] = "拖曳以移動";
Calendar._TT["PART_TODAY"] = " (今天)";

// the following is to inform that "%s" is to be the first day of week
// %s will be replaced with the day name.
Calendar._TT["DAY_FIRST"] = "先顯示 %s ";

// This may be locale-dependent.  It specifies the week-end days, as an array
// of comma-separated numbers.  The numbers are from 0 to 6: 0 means Sunday, 1
// means Monday, etc.
Calendar._TT["WEEKEND"] = "0,6";

Calendar._TT["CLOSE"] = "關閉";
Calendar._TT["TODAY"] = "今天";
Calendar._TT["TIME_PART"] = "(Shift鍵-)點擊或是拖曳來改變值";

// date formats
Calendar._TT["DEF_DATE_FORMAT"] = "%Y-%m-%d";
Calendar._TT["TT_DATE_FORMAT"] = "%a, %b %e";

Calendar._TT["WK"] = "週";
Calendar._TT["TIME"] = "時間:";
