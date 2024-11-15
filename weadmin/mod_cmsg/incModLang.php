<?php
if ($_SESSION[$valSiteManage . "core_session_language"] == "Eng") {
	$langMod["meu:group"] = "group " . getNameMenu($_REQUEST["menukeyid"]);
	$langMod["meu:contant"] = getNameMenu($_REQUEST["menukeyid"]);

	$langMod["txt:titleadd"] = "" . getNameMenu($_REQUEST["menukeyid"]) . " New";
	$langMod["txt:titleedit"] = "" . getNameMenu($_REQUEST["menukeyid"]) . " Edit";
	$langMod["txt:titleview"] = "" . getNameMenu($_REQUEST["menukeyid"]) . " Display";
	$langMod["txt:sortpermis"] = "" . getNameMenu($_REQUEST["menukeyid"]) . " Sort";

	$langMod["txt:titleaddg"] = "" . $langMod["meu:group"] . " New";
	$langMod["txt:titleeditg"] = "" . $langMod["meu:group"] . " Edit";
	$langMod["txt:titleviewg"] = "" . $langMod["meu:group"] . " Display";
	$langMod["txt:sortpermisg"] = "" . $langMod["meu:group"] . " Sort";


	$langMod["txt:subject"] = "" . getNameMenu($_REQUEST["menukeyid"]) . " Info";
	$langMod["txt:subjectDe"] = "Please enter a selection, group, title and subtitle. To use to display content on the page, include all of this menu information on your site. ";
	$langMod["txt:title"] = "Detailed information " . getNameMenu($_REQUEST["menukeyid"]);
	$langMod["txt:titleDe"] = "Please enter details. For use in display on your website. ";
	$langMod["txt:attfile"] = "Attachment information";
	$langMod["txt:attfileDe"] = "Attachment information To use to display the attachment of this content. In the form of downloading documents stored on a computer on your website. ";
	$langMod["txt:seo"] = "Support for Search Engine Search";
	$langMod["txt:seoDe"] = "This information is used to support search engines such as Google or Yahoo.";
	$langMod["txt:date"] = "Set display date";
	$langMod["txt:dateDe"] = "This is the section used to set the display date. For use in display on your website. ";

	$langMod["txt:datec"] = "Set creation date on display";
	$langMod["txt:datecDe"] = "This is the section used to set the creation date. For use in display on your website. ";

	$langMod["txt:album"] = "Photo album information";
	$langMod["txt:albumDe"] = "Photo album information To use to display this image of the content. In slideshows format on your website ";
	$langMod["txt:video"] = "Video Info";
	$langMod["txt:videoDe"] = "Video information For use in video rendering of this content. In video player format on your website. ";
	$langMod["txt:pic"] = "Image Gallery";
	$langMod["txt:picDe"] = "Image data includes For use in displaying images of this content. ";


	$langMod["inp:seotitle"] = "Title Tag";
	$langMod["inp:seotitlenote"] = "Note: Content will be displayed in the Search Topics section of the Search Engine (Google, Yahoo).";
	$langMod["inp:seodes"] = "Tag Description";
	$langMod["inp:seodesnote"] = "Note: Content will be displayed in the Search Topics section of the Search Engine (Google, Yahoo)";
	$langMod["inp:seokey"] = "Tag Keywords";
	$langMod["inp:seokeynote"] = "Note: Search words or phrases in Search Engine (Google, Yahoo)";

	$langMod["inp:album"] = "Select photo";
	$langMod["inp:chfile"] = "Rename attachment";
	$langMod["inp:sefile"] = "Select attachment";
	$langMod["inp:notefile"] = "Note: Please select a file with a size that is not too large. This is because large files will result in delays in uploading files. ";
	$langMod["inp:notedate"] = "Note: If you do not want to specify a start date And the end date of this content. Please do not fill out any information. ";
	$langMod["inp:notepic"] = "Note: Please upload only .jpg, .png and .gif files, the size of the image should not exceed 2 Mb and the image provided in the upload should have a proportional " . $sizeWidthPic . " X " . $sizeHeightPic . " Pixels ";
	$langMod["inp:notealbum"] = "Note: Please upload only .jpg, .png and .gif files, the image size should not exceed 2 Mb. " . $sizeWidthAlbum . " X " . $sizeHeightAlbum . " Pixels ";

	$langMod["tit:subject"] = "Name " . getNameMenu($_REQUEST["menukeyid"]);
	$langMod["tit:subjectg"] = "Name " . $langMod["meu:group"];
	$langMod["tit:sdate"] = "Start date";
	$langMod["tit:edate"] = "End date";
	$langMod["tit:title"] = "Subtitle";
	$langMod["tit:typevdo"] = "Video type";
	$langMod["tit:linkvdo"] = "Youtube link";
	$langMod["tit:uploadvdo"] = "Upload a file";
	$langMod["tit:linkvdonote"] = "Note: The only link is the youtube.com URL.";
	$langMod["tit:uploadvdonote"] = "Note: Please upload only .flv, .wmv, .mp3, .wav, .wma, .avi, and .mpeg files.";
	$langMod["tit:noteg"] = "Note";
	$langMod["tit:selectg"] = "Select " . $langMod["meu:group"];
	$langMod["tit:selectgn"] = $langMod["meu:group"];
	$langMod["txt:subjectg"] = "" . $langMod["meu:group"] . " Info";
	$langMod["txt:subjectgDe"] = "Please enter a name " . $langMod["meu:group"] . "To be used for display on your site.";

	$langMod["file: type"] = "Type";
	$langMod["file: size"] = "Size";
	$langMod["file: download"] = "Download";

	$langMod["home: detail"] = "Read details";

	$langMod["tit:view"] = "Visit";
	$langMod["tit:inpName"] = "Name " . getNameMenu($_REQUEST["menukeyid"]);
} else {

	$langMod["meu:group"] = "กลุ่ม" . getNameMenu($_REQUEST["menukeyid"]);
	$langMod["meu:subgroup"] = "กลุ่มย่อย" . getNameMenu($_REQUEST["menukeyid"]);
	$langMod["meu:contant"] = getNameMenu($_REQUEST["menukeyid"]);

	$langMod["txt:titleadd"] = "สร้างข้อมูล" . getNameMenu($_REQUEST["menukeyid"]);
	$langMod["txt:titleedit"] = "แก้ไขข้อมูล" . getNameMenu($_REQUEST["menukeyid"]);
	$langMod["txt:titleview"] = "แสดงผลข้อมูล" . getNameMenu($_REQUEST["menukeyid"]);
	$langMod["txt:sortpermis"] = "จัดเรียงข้อมูล" . getNameMenu($_REQUEST["menukeyid"]);
	$langMod["tit:setting"] = "ตั้งค่า";
	$langMod["txt:titleaddg"] = "สร้างข้อมูล" . $langMod["meu:group"];
	$langMod["txt:titleeditg"] = "แก้ไขข้อมูล" . $langMod["meu:group"];
	$langMod["txt:titleviewg"] = "แสดงผลข้อมูล" . $langMod["meu:group"];
	$langMod["txt:sortpermisg"] = "จัดเรียงข้อมูล" . $langMod["meu:group"];

	$langMod["txt:titleaddsg"] = "สร้างข้อมูล" . $langMod["meu:subgroup"];
	$langMod["txt:titleeditsg"] = "แก้ไขข้อมูล" . $langMod["meu:subgroup"];
	$langMod["txt:titleviewsg"] = "แสดงผลข้อมูล" . $langMod["meu:subgroup"];
	$langMod["txt:sortpermissg"] = "จัดเรียงข้อมูล" . $langMod["meu:subgroup"];


	$langMod["txt:subject"] = "ข้อมูล" . getNameMenu($_REQUEST["menukeyid"]);
	$langMod["txt:subjectDe"] = "โปรดป้อนเลือกกลุ่ม, ชื่อและคำบรรยาย เพื่อใช้ในการแสดงผลเนื้อหาในหน้ารวมข้อมูลทั้งหมดของเมนูนี้บนเว็บไซต์ของคุณ";
	$langMod["txt:title"] = "ข้อมูลรายละเอียด" . getNameMenu($_REQUEST["menukeyid"]);
	$langMod["txt:titleDe"] = "โปรดป้อนรายละเอียด เพื่อใช้ในการแสดงผลในหน้าเว็บไซต์ของคุณ";
	$langMod["txt:attfile"] = "ข้อมูลเอกสารแนบ";
	$langMod["txt:attfileDe"] = "ข้อมูลเอกสารแนบ เพื่อใช้ในการแสดงผลเอกสารแนบของเนื้อหานี้ ในรูปแบบของการดาวน์โหลดเอกสารเก็บไว้ในเครื่องคอมพิวเตอร์บนเว็บไซต์ของคุณ";
	$langMod["txt:seo"] = "ข้อมูลรองรับการค้นหาของ Search Engine";
	$langMod["txt:seoDe"] = "ข้อมูลนี้คือส่วนที่ใช้ในการรองรับการค้นหาของ Search Engine ไม่ว่าจะเป็น Google หรือ Yahoo เป็นต้น";
	$langMod["txt:date"] = "กำหนดวันที่ในการแสดงผล";
	$langMod["txt:dateDe"] = "ข้อมูลนี้คือส่วนที่ใช้ในการกำหนดวันที่ในการแสดงผล เพื่อใช้ในการแสดงผลในหน้าเว็บไซต์ของคุณ";

	$langMod["txt:dateTime"] = "กำหนดวันที่ในการแจ้งเตือน";
	$langMod["txt:dateTimeDe"] = "ข้อมูลนี้คือส่วนที่ใช้ในการกำหนดวันที่ในการแจ้งเตือน เพื่อใช้ในการแสดงผลในหน้าเว็บไซต์ของคุณ";

	$langMod["txt:datec"] = "กำหนดวันที่สร้างในการแสดงผล";
	$langMod["txt:datecDe"] = "ข้อมูลนี้คือส่วนที่ใช้ในการกำหนดวันที่สร้างในการแสดงผล เพื่อใช้ในการแสดงผลในหน้าเว็บไซต์ของคุณ";

	$langMod["txt:album"] = "ข้อมูลอัลบั้มภาพ";
	$langMod["txt:albumDe"] = "ข้อมูลอัลบั้มภาพ เพื่อใช้ในการแสดงผลรูปภาพของเนื้อหานี้ ในรูปแบบภาพสไลด์บนเว็บไซต์ของคุณ";
	$langMod["txt:video"] = "ข้อมูลวิดีโอ";
	$langMod["txt:videoDe"] = "ข้อมูลวิดีโอ เพื่อใช้ในการแสดงผลวิดีโอของเนื้อหานี้ ในรูปแบบเครื่องเล่นวิดีโอบนเว็บไซต์ของคุณ";
	$langMod["txt:pic"] = "รูปภาพประกอบ";
	$langMod["txt:picDe"] = "ข้อมูลรูปภาพประกอบ เพื่อใช้ในการแสดงผลรูปภาพของเนื้อหานี้";

	$langMod["txt:typevideo"] = "ข้อมูลวิดีโอ";
	$langMod["tit:typevideo1"] = "มี";
	$langMod["tit:typevideo2"] = "ไม่มี";



	$langMod["inp:seotitle"] = "Tag Title";
	$langMod["inp:seotitlenote"] = "หมายเหตุ : เนื้อหาที่จะแสดงในส่วนของหัวข้อของการค้นหาใน Search Engine(Google, Yahoo)";
	$langMod["inp:seodes"] = "Tag Description";
	$langMod["inp:seodesnote"] = "หมายเหตุ : เนื้อหาที่จะแสดงในส่วนของรายละเอียดหัวข้อของการค้นหาใน Search Engine(Google, Yahoo)";
	$langMod["inp:seokey"] = "Tag Keywords";
	$langMod["inp:seokeynote"] = "หมายเหตุ : คำหรือวลีที่ใช้ในการค้นหาใน Search Engine(Google, Yahoo)";

	$langMod["inp:album"] = "เลือกรูปภาพ";
	$langMod["inp:chfile"] = "เปลี่ยนชื่อเอกสารแนบ";
	$langMod["inp:sefile"] = "เลือกเอกสารแนบ";
	$langMod["inp:notefile"] = "หมายเหตุ : กรุณาเลือกอัพโหลดไฟล์ที่มีขนาดเหมาะสมไม่ใหญ่เกินไป เนื่องจากหากไฟล์ขนาดใหญ่จะส่งผลให้เกินความล่าช้าในการอัพโหลดไฟล์";
	$langMod["inp:notedate"] = "หมายเหตุ : กรณีไม่ต้องการระบุวันเริ่มต้น และวันสิ้นสุดของเนื้อหานี้ กรุณาเว้นไว้ไม่ต้องกรอกข้อมูลใดๆ";
	$langMod["inp:notepic"] = "หมายเหตุ : กรุณาอัพโหลดเฉพาะไฟล์ .jpg, .png และ .gif เท่านั้น, ขนาดของรูปภาพไม่เกิน 2 Mb และรูปภาพที่ให้ในการอัพโหลดควรมีสัดส่วนที่ " . $sizeWidthPic . "x" . $sizeHeightPic . " พิกเซล";
	$langMod["inp:notealbum"] = "หมายเหตุ : กรุณาอัพโหลดเฉพาะไฟล์ .jpg, .jpeg, .png และ .gif เท่านั้น, ขนาดของรูปภาพไม่เกิน 2 Mb และรูปภาพที่ให้ในการอัพโหลดควรมีสัดส่วนที่ " . $sizeWidthAlbum . "x" . $sizeHeightAlbum . " พิกเซล";

	$langMod["tit:subject"] = "ชื่อ" . getNameMenu($_REQUEST["menukeyid"]);
	$langMod["tit:subjectg"] = "ชื่อ" . $langMod["meu:group"];
	$langMod["tit:subjectsg"] = "ชื่อ" . $langMod["meu:subgroup"];
	$langMod["tit:sdate"] = "ละติจูด";
	$langMod["tit:edate"] = "ลองจิจูด";
	$langMod["tit:sdate2"] = "วันเริ่มต้น";
	$langMod["tit:edate2"] = "วันสิ้นสุด";
	$langMod["tit:date"] = "ประจำวันที่";
	$langMod["tit:title"] = "คำบรรยาย";
	$langMod["tit:typevdo"] = "ประเภทวิดีโอ";
	$langMod["tit:linkvdo"] = "ลิงค์ Youtube";
	$langMod["tit:uploadvdo"] = "อัพโหลดไฟล์";
	$langMod["tit:linkvdonote"] = "หมายเหตุ : ลิงค์ที่ใช่ คือ URL youtube.com เท่านั้น";
	$langMod["tit:uploadvdonote"] = "หมายเหตุ : กรุณาอัพโหลดเฉพาะไฟล์ .flv, .wmv, .mp3, .wav, .wma, .avi และ .mpeg เท่านั้น";
	$langMod["tit:noteg"] = "หมายเหตุ";
	$langMod["tit:selectg"] = "เลือก" . $langMod["meu:group"];
	$langMod["tit:selectsg"] = "เลือก" . $langMod["meu:subgroup"];
	// $langMod["tit:selectgn"] =$langMod["meu:group"];
	$langMod["tit:selectgn"] = 'ประเภทสถานการณ์';
	$langMod["tit:selectsgn"] = $langMod["meu:subgroup"];
	$langMod["tit:gmap"] = "แผนที่ทางทะเล";
	$langMod["tit:titlegmap"] = "ข้อมูล" . $langMod["tit:gmap"];
	$langMod["txt:gmapDe"] = "ข้อมูล" . $langMod["tit:gmap"] . " เพื่อใช้ในการแสดงผลแผนที่ทางทะเลของเนื้อหานี้";


	$langMod["txt:subjectg"] = "ข้อมูล" . $langMod["meu:group"];
	$langMod["txt:subjectgDe"] = "โปรดป้อนชื่อ" . $langMod["meu:group"] . " เพื่อใช้ในการแสดงผลในหน้าเว็บไซต์ของคุณ";
	$langMod["txt:subjectsg"] = "ข้อมูล" . $langMod["meu:subgroup"];
	$langMod["txt:subjectsgDe"] = "โปรดป้อนชื่อ" . $langMod["meu:subgroup"] . " เพื่อใช้ในการแสดงผลในหน้าเว็บไซต์ของคุณ";
	$langMod["tit:event"] = "เหตุการณ์ด้าน";
	$langMod["tit:selectevent"] = "เลือก" . $langMod["tit:event"];
	$langMod["event:positive"] = "ด้านบวก";
	$langMod["event:negative"] = "ด้านลบ";


	$langMod["file:type"] = "ประเภท";
	$langMod["file:size"] = "ขนาด";
	$langMod["file:download"] = "ดาวน์โหลด";
	$langMod["txt:color"] = "ข้อมูลสีพื้นหลัง";
	$langMod["txt:colorDe"] = "ข้อมูลนี้คือส่วนที่ใช้ในการกำหนดสีพื้นหลังในการแสดงผลส่วนนี้ เพื่อใช้ในการแสดงผลในหน้าเว็บไซต์ของคุณ";

	$langMod["home:detail"] = "อ่านรายละเอียด";

	$langMod["tit:view"] = "เข้าชม";
	$langMod["tit:inpName"] = "ชื่อ" . getNameMenu($_REQUEST["menukeyid"]);

	$langTxt["mg:pin"] = "Pin";

	$langTxt["mg:ribbon"] = "Ribbon";
	$langTxt["vote:status"] = "ตั้งค่าการแสดงโหวต";
	$langTxt["vote:statussl"] = "สถานะการแสดงผล";
	$langTxt["vote:statusde"] = "ข้อมูลส่วนนี้ใช้เพื่อตั้งค่าการแสดงผลหน้าต่างโหวตในหน้าเว็บไซต์";
	$langTxt["vote:off"] = "ไม่แสดง";
	$langTxt["vote:on"] = "แสดง";

	$langMod["tit:color"] = "สีพื้นหลัง";
	$langMod["tit:viewconf"] = "จำนวนผู้เข้าชม";
	$langMod["edit:linknote"] = "หมายเหตุ : กรุณากรอกชื่อ URL นำหน้าด้วย \"http://\" เช่น http://www.wewebplus.com เป็นต้น" . "<br>" . "กรณีไม่มีชื่อ URL ให้ใส่เครื่องหมาย #";

	$langMod["tit:selectgtype"] = "เลือกประเภทสถานการณ์";
	$langMod["dev0821:date"] = "ประจำวันที่";
	$langMod["tit:hashtag"] = "ข้อมูลแท็กเชื่อมโยง";
	$langMod["tit:hashtagDes"] = "ข้อมูลนี้คือส่วนที่ใช้ในการกำหนดแท็กเชื่อมโยงในการแสดงผลส่วนนี้ เพื่อใช้ในการแสดงผลในหน้าเว็บไซต์ของคุณ";
	$langMod["inp:hashtag"] = "แท็กเชื่อมโยง";
	$langMod["tit:selectghasg"] = "เลือก" . $langMod["inp:hashtag"];
	$langMod["tit:selectstatus"] = "เลือก" . $langTxt["mg:status"];

	$langMod["dev22:presdate"] = "วันเริ่มต้น";
	$langMod["dev22:preedate"] = "วันสิ้นสุด";
	$langMod["dev22:search"] = "คำค้นหา";

	$langMod["tit:subjectGtype"] = "ประเภทจุดอันตรายและพื้นที่เสี่ยง";
	$langMod["tit:subjectGtypeSel"] = "เลือกประเภทจุดอันตรายและพื้นที่เสี่ยง";
	$langMod["tit:timeKm"] = "ระยะแจ้งเตือน (กิโลเมตร)";

	$langMod["dev22:moneyyear"] = "ปีงบประมาณ";
	$langMod["dev22:moneyyearSel"] = "เลือกปีงบประมาณ";
	$langMod["tit:linkvdoc"] = "ลิงก์";
	$langMod["tit:typevdoc"] = "การแสดงผล";
	$langMod["txt:subjectLink"] = "ข้อมูลเชื่อมโยงภายนอก";
	$langMod["txt:subjectLinkDe"] = "โปรดป้อนข้อมูลลิงค์และการแสดงผล เพื่อใช้ในการแสดงผลเนื้อหาในหน้ารวมข้อมูลทั้งหมดของเมนูนี้บนเว็บไซต์ของคุณ";
	$langMod["tit:picdefault"] = "รูปเริ่มต้น";
}
