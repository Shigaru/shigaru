DELETE FROM `#__components` WHERE admin_menu_link LIKE 'com_acesef';

DROP TABLE IF EXISTS `#__acesef_bookmarks_backup`;
RENAME TABLE `#__acesef_bookmarks` TO `#__acesef_bookmarks_backup`;

DROP TABLE IF EXISTS `#__acesef_ilinks_backup`;
RENAME TABLE `#__acesef_ilinks` TO `#__acesef_ilinks_backup`;

DROP TABLE IF EXISTS `#__acesef_metadata_backup`;
RENAME TABLE `#__acesef_metadata` TO `#__acesef_metadata_backup`;

DROP TABLE IF EXISTS `#__acesef_sitemap_backup`;
RENAME TABLE `#__acesef_sitemap` TO `#__acesef_sitemap_backup`;

DROP TABLE IF EXISTS `#__acesef_tags_backup`;
RENAME TABLE `#__acesef_tags` TO `#__acesef_tags_backup`;

DROP TABLE IF EXISTS `#__acesef_tags_map_backup`;
RENAME TABLE `#__acesef_tags_map` TO `#__acesef_tags_map_backup`;

DROP TABLE IF EXISTS `#__acesef_urls_backup`;
RENAME TABLE `#__acesef_urls` TO `#__acesef_urls_backup`;

DROP TABLE IF EXISTS `#__acesef_urls_moved_backup`;
RENAME TABLE `#__acesef_urls_moved` TO `#__acesef_urls_moved_backup`;