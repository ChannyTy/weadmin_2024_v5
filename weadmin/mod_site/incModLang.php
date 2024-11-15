<?php

if ($_SESSION[$valSiteManage . "core_session_language"] == "Eng") {
  $langMod["txt:attfile"] = "Attachment information";
  $langMod["txt:attfileDe"] = "Attachment information To use to display the attachment of this content. In the form of downloading documents stored on a computer on your website. ";
  $langMod["inp:notefile"] = "Note: Please select a file with a size that is not too large. This is because large files will result in delays in uploading files. ";

  $langMod["txt:titleadd"] = "" . getNameMenu($_REQUEST["menukeyid"]) . " New";
  $langMod["txt:titleedit"] = "" . getNameMenu($_REQUEST["menukeyid"]) . " Edit";
  $langMod["txt:titleview"] = "" . getNameMenu($_REQUEST["menukeyid"]) . " Display";
  $langMod["txt:sortpermis"] = "" . getNameMenu($_REQUEST["menukeyid"]) . " Sort";

  $langMod["txt:setOffice"] = "Site manager configuration information";
  $langMod["txt:setOfficeDe"] = "This information is used to set up the Site Manager";

  $langMod["txt:set"] = "Site settings information";
  $langMod["txt:setDe"] = "This information is the part of the site settings of your website.";

  $langMod["txt:about"] = "System Message Info";
  $langMod["txt:aboutDe"] = "This information is the part of the site settings of your website";

  $langMod["txt:seminar"] = "seminar information";
  $langMod["txt:seminarDe"] = "This information is the part of the site settings of your website";

  $langMod["txt:info"] = "Contact information";
  $langMod["txt:infoDe"] = "This information is the interface used to contact your website";

  // / * by nut 02-03-17 * /
  $langMod["txt:setSocial"] = "Social media info";
  $langMod["txt:setSocialDe"] = "This information is the part used to set up the website of your website";

  $langMod["social:link"] = "URL Name";
  $langMod["social:fb"] = "Facebook";
  $langMod["social:tw"] = "Twitter";
  $langMod["social:yt"] = "Youtube";
  $langMod["social:li"] = "Line";
  $langMod["social:ig"] = "Instagram";
  $langMod["social:lk"] = "Linkedin";
  $langMod["social:tel"] = "Tel";


  $langMod["social:note"] = "Note: Please enter the URL name, prefixed with \" http: // \". For example: http://www.google.com. Etc. " . " <br> "
    // ." If there is no URL name, add # "
  ;

  // / * by nut 27-03-17 * /

  $langMod['info:title'] = "General information";
  $langMod['info:titlede'] = "This information is the part of the website settings of your website.";

  $langMod['info:address'] = "Address";
  $langMod['info:tel'] = "Phone number";
  $langMod["info:telde"] = "Phone number input format:021234567 Do not contain any characters or characters";
  $langMod["info:telde2"] = "Phone number entry format:012-234-345 ext. 123 or 021234567";
  $langMod['info:fax'] = "Fax number";
  $langMod["info:faxde"] = "Phone number entry format:021234567 Do not contain any characters or characters";
  $langMod['info:email'] = "Email";

  $langMod['info:googlemap'] = "googlemap map";
  $langMod["info:googlemapde"] = "Please copy the latitude, longitude on the google map page to use for setting <a href = 'https: //www.google.com/maps/' target = '. _blank '> Google Map </a> ";
  $langMod['info:latiture'] = "Latitude";
  $langMod['info:longtiture'] = "Longitude";
  $langMod["info:picaddress"] = "Map image";

  $langMod["info:qr"] = "QR code";
  $langMod["info:pichotline"] = "Hotline icon";
  $langMod["info:pichotlineH"] = "Header hotline icon";
  $langMod['info:googleanalysis'] = "googleanalysis";
  $langMod["info:googleanalysisde"] = "Put the code received from google anlysis";
  $langMod["info:hotline"] = "Sales contact number";
  $langMod["info:hotlinede"] = "Input Format:021234567 Do not contain any characters or characters";

  $langMod["inp:notepic"] = "Note: Please upload only .jpg, .png and .gif files, the size of the image is no more than 2 Mb and the uploaded image should be 1280 x 600 px.";

  // / * end nut * /

  $langMod["tit:email"] = "Email";
  $langMod["tit:subject"] = "Thai system name";
  $langMod["tit:tel"] = "Phone number";
  $langMod["tit:by"] = "Contact person";
  $langMod["tit:mgs"] = "Text";
  $langMod["tit:address"] = "address";
  $langMod["tit:no"] = "rank";

  $langMod["ats:email"] = "the same email address that is already in the system";

  $langMod["txt:seo"] = "Search Engine support data";
  $langMod["txt:seoDe"] = "This information is used to support a Search Engine, whether it is Google or Yahoo, etc.";

  $langMod["inp:seotitle"] = "Tag Title";
  $langMod["inp:seotitlenote"] = "Note: The content will be displayed in the search topic section of Search Engine (Google, Yahoo)";
  $langMod["inp:seodes"] = "Tag Description";
  $langMod["inp:seodesnote"] = "Note: The content will be displayed in the search topic description on Search Engine (Google, Yahoo)";
  $langMod["inp:seokey"] = "Tag Keywords";
  $langMod["inp:seokeynote"] = "Note: Search word or phrase used in Search Engine (Google, Yahoo)";

  $langMod["ab:subject"] = "System name";
  $langMod["ab:title"] = "System name";
  $langMod["ab:titleEn"] = "English subtitles";
  $langMod["ab:titleNo"] = "Subtitle";

  $langMod["txt:subjectOffice"] = "System name";
  $langMod["txt:titleOffice"] = "System subtitles";

  $langMod["txt:app"] = "Application Info";
  $langMod["txt:appDe"] = "This section defines the application link on your website";
  $langMod["txt:apple"] = "App Store (iOS)";
  $langMod["txt:android"] = "Google Play Store (Android)";


  $langMod["ab:office"] = "Company name";

  $langMod["txt:slogan"] = "Slogan info";
  $langMod["txt:sloganDe"] = "This information is the part used to set up the tagline of your website.";
  $langMod["ab:slogan1"] = "Projects";
  $langMod["ab:slogan2"] = "News and promotion";
  $langMod["ab:slogan3"] = "Deland Family";
  $langMod["ab:slogan4"] = "Company Profile";
  $langMod["ab:slogan5"] = "CARE to inspire";
} else {
  $langMod["txt:titleadd"] = "สร้างข้อมูล" . getNameMenu($_REQUEST["menukeyid"]);
  $langMod["txt:titleedit"] = "แก้ไขข้อมูล" . getNameMenu($_REQUEST["menukeyid"]);
  $langMod["txt:titleview"] = "แสดงผลข้อมูล" . getNameMenu($_REQUEST["menukeyid"]);
  $langMod["txt:sortpermis"] = "จัดเรียงข้อมูล" . getNameMenu($_REQUEST["menukeyid"]);

  $langMod["txt:setOffice"] = "ข้อมูลการตั้งค่าระบบจัดการเว็บไซต์";
  $langMod["txt:setOfficeDe"] = "ข้อมูลนี้คือส่วนที่ใช้ในการตั้งค่าระบบจัดการเว็บไซต์";

  $langMod["txt:set"] = "ข้อมูลการตั้งค่าเว็บไซต์";
  $langMod["txt:setDe"] = "ข้อมูลนี้คือส่วนที่ใช้ในการตั้งค่าเว็บไซต์ในเว็บไซต์ของคุณ";

  $langMod["txt:about"] = "ข้อมูลข้อความของระบบ";
  $langMod["txt:aboutDe"] = "ข้อมูลนี้คือส่วนที่ใช้ในการตั้งค่าเว็บไซต์ในเว็บไซต์ของคุณ";

  $langMod["txt:seminar"] = "ข้อมูลข้อความสัมมนา";
  $langMod["txt:seminarDe"] = "ข้อมูลนี้คือส่วนที่ใช้ในการตั้งค่าเว็บไซต์ในเว็บไซต์ของคุณ";

  $langMod["txt:info"] = "ข้อมูลการติดต่อ";
  $langMod["txt:infoDe"] = "ข้อมูลนี้คือส่วนที่ใช้ในการติดต่อหน้าเว็บไซต์ของคุณ";

  /* by nut 02-03-17 */
  $langMod["txt:setSocial"] = "ข้อมูลโซเชียลมีเดีย";
  $langMod["txt:setSocialDe"] = "ข้อมูลนี้คือส่วนที่ใช้ในการตั้งค่าเว็บไซต์ในเว็บไซต์ของคุณ";

  $langMod["social:link"] = "URL Name";
  $langMod["social:fb"] = "Facebook";
  $langMod["social:tw"] = "Twitter";
  $langMod["social:yt"] = "Youtube";
  $langMod["social:li"] = "Line";
  $langMod["social:ig"] = "Instagram";
  $langMod["social:lk"] = "Linkedin";
  $langMod["social:tel"] = "Tel";


  $langMod["social:note"] = "หมายเหตุ : กรุณากรอกชื่อ URL นำหน้าด้วย \"http://\" เช่น http://www.google.com เป็นต้น" . "<br>" . "กรณีไม่มีชื่อ URL ให้ใส่เครื่องหมาย #";

  /* by nut 27-03-17 */

  $langMod['info:title'] = "ข้อมูลพื้นฐานทั่วไป";
  $langMod['info:titlede'] = "ข้อมูลนี้คือส่วนที่ใช้ในการตั้งค่าเว็บไซต์ในเว็บไซต์ของคุณ";

  $langMod['info:address'] = "ที่อยู่ ";
  $langMod['info:tel'] = "เบอร์โทรศัพท์ ";
  $langMod["info:telde"] = "รูปแบบในการกรอกเบอร์โทรศัพท์ : 021234567 ห้ามมีอักขระหรืออักษรใดๆ";
  $langMod["info:telde2"] = "รูปแบบในการกรอกเบอร์โทรศัพท์ : 012-234-345 ต่อ 123 หรือ 021234567";
  $langMod['info:fax'] = "เบอร์โทรสาร ";
  $langMod["info:faxde"] = "รูปแบบในการกรอกเบอร์โทรศัพท์ : 021234567 ห้ามมีอักขระหรืออักษรใดๆ";
  $langMod['info:email'] = "อีเมล์ ";

  $langMod['info:googlemap'] = "แผนที่ googlemap ";
  $langMod["info:googlemapde"] = "ให้ทำการ copy ละติจูด,ลองจิจูด ในหน้าของ google map มาใส่เพื่อใช้เป็นการตั้งค่า <a href='https://www.google.com/maps/' target='_blank'>Google Map</a>";
  $langMod['info:latiture'] = "ละติจูด";
  $langMod['info:longtiture'] = "ลองจิจูด";
  $langMod["info:picaddress"] = "รูปภาพแผนที ";

  $langMod["info:qr"] = "QR code";
  $langMod["info:pichotline"] = "ไอคอนสายด่วน";
  $langMod["info:pichotlineH"] = "ไอคอนสายด่วน Header";
  $langMod['info:googleanalysis'] = "googleanalysis";
  $langMod["info:googleanalysisde"] = "นำโค้ดที่ได้รับจาก google anlysis มาใส่";
  $langMod["info:hotline"] = "เบอร์โทรฝ่ายขาย ";
  $langMod["info:hotlinede"] = "รูปแบบในการกรอกเบอร์โทรศัพท์ : 021234567 ห้ามมีอักขระหรืออักษรใดๆ";

  $langMod["inp:notepic"] = "หมายเหตุ : กรุณาอัพโหลดเฉพาะไฟล์ .jpg, .png และ .gif เท่านั้น, ขนาดของรูปภาพไม่เกิน 2 Mb และรูปภาพที่ให้ในการอัพโหลดควรมีสัดส่วนที่ 1280 x 600 พิกเซล";

  /* end nut */

  $langMod["tit:email"] = "อีเมล์";
  $langMod["tit:subject"] = "ชื่อระบบไทย";
  $langMod["tit:tel"] = "เบอร์โทรศัพท์";
  $langMod["tit:by"] = "ผู้ติดต่อ";
  $langMod["tit:mgs"] = "ข้อความ";
  $langMod["tit:address"] = "ที่อยู่";
  $langMod["tit:no"] = "ลำดับ";

  $langMod["ats:email"] = "อีเมล์ซ้ำกับที่มีอยู่ในระบบแล้ว";

  $langMod["txt:seo"] = "ข้อมูลรองรับการค้นหาของ Search Engine";
  $langMod["txt:seoDe"] = "ข้อมูลนี้คือส่วนที่ใช้ในการรองรับการค้นหาของ Search Engine ไม่ว่าจะเป็น Google หรือ Yahoo เป็นต้น";

  $langMod["inp:seotitle"] = "Tag Title ";
  $langMod["inp:seotitlenote"] = "หมายเหตุ : เนื้อหาที่จะแสดงในส่วนของหัวข้อของการค้นหาใน Search Engine(Google, Yahoo)";
  $langMod["inp:seodes"] = "Tag Description ";
  $langMod["inp:seodesnote"] = "หมายเหตุ : เนื้อหาที่จะแสดงในส่วนของรายละเอียดหัวข้อของการค้นหาใน Search Engine(Google, Yahoo)";
  $langMod["inp:seokey"] = "Tag Keywords ";
  $langMod["inp:seokeynote"] = "หมายเหตุ : คำหรือวลีที่ใช้ในการค้นหาใน Search Engine(Google, Yahoo)";

  $langMod["ab:subject"] = "ชื่อระบบ ";
  $langMod["ab:title"] = "ชื่อระบบ ";
  $langMod["ab:titleEn"] = "คำบรรยายภาษาอังกฤษ";
  $langMod["ab:titleNo"] = "คำบรรยาย";

  $langMod["txt:subjectOffice"] = "ชื่อระบบ";
  $langMod["txt:titleOffice"] = "คำบรรยายระบบ";

  $langMod["txt:app"] = "ข้อมูลแอปพลิเคชัน";
  $langMod["txt:appDe"] = "ข้อมูลส่วนนี้คือส่วนกำหนดลิงค์แอปพลิเคชันในเว็บไซต์ของคุณ";
  $langMod["txt:apple"] = "App Store(iOS)";
  $langMod["txt:android"] = "Google Play Store(Android)";


  $langMod["ab:office"] = "ชื่อบริษัท";
  $langMod["txt:office"] = "ชื่อกระทรวง";

  $langMod["txt:slogan"] = "ข้อมูลสโลแกน";
  $langMod["txt:sloganDe"] = "ข้อมูลนี้คือส่วนที่ใช้ในการตั้งค่าสโลแกนในเว็บไซต์ของคุณ";
  $langMod["ab:slogan1"] = "โครงการ";
  $langMod["ab:slogan2"] = "ข่าวสารและโปรโมชั่น";
  $langMod["ab:slogan3"] = "ดีแลนด์ แฟมิลี่";
  $langMod["ab:slogan4"] = "ข้อมูลบริษัท";
  $langMod["ab:slogan5"] = "CARE to inspire";
  $langMod["ab:slogan6"] = "ร่วมงานกับเรา";
  $langMod["ab:slogan7"] = "ติดต่อเรา";

  $langMod["set:open"] = "เวลาเปิด/ปิดทำการ";
  $langMod["info:faction"] = "สำนักงาน / ฝ่าย";
  $langMod["info:factiontel"] = "เบอร์โทรศัพท์";

  $langMod["txt:info"] = "Information";
  $langMod["inp:information"] = "หมายเหตุ : ข้อมูลนี้จะแสดงในส่วน Information บนเว็บไซต์ของคุณ";
  $langMod["txt:rate"] = "ส่วนต่างเพิ่มเติม";
  $langMod["inp:rate"] = "*ระบุเพื่อเพิ่มส่วนต่างของอัตราแลกเปลี่ยน";

  // $langMod = checkpageText($langMod);
  $langMod["txt:attfile"] = "ข้อมูลเอกสารแนบ";
  $langMod["txt:attfileDe"] = "ข้อมูลเอกสารแนบ เพื่อใช้ในการแสดงผลเอกสารแนบของเนื้อหานี้ ในรูปแบบของการดาวน์โหลดเอกสารเก็บไว้ในเครื่องคอมพิวเตอร์บนเว็บไซต์ของคุณ";
  $langMod["inp:chfile"] = "เปลี่ยนชื่อเอกสารแนบ";
  $langMod["inp:sefile"] = "เลือกเอกสารแนบ";
  $langMod["inp:notefile"] = "หมายเหตุ : กรุณาเลือกอัพโหลดไฟล์ที่มีขนาดเหมาะสมไม่ใหญ่เกินไป เนื่องจากหากไฟล์ขนาดใหญ่จะส่งผลให้เกินความล่าช้าในการอัพโหลดไฟล์";
  $langMod["txt:picaddress"] = "ภาพโลโก้";
  $langMod["info:titlecallape"] = "กลุ่มบริษัทที่ปรึกษาในการดำเนินงาน";
  $langMod["info:titlecallapede"] = "ข้อมูลนี้คือส่วนที่ใช้ในการตั้งผล".$langMod["info:titlecallape"]."ในเว็บไซต์ของคุณ";
  $langMod["txt:duty"] = "ที่ปรึกษาด้าน";
  $langMod["info:tel"] = "เบอร์โทรศัพท์";
  $langMod["info:emailInfo"] = "เบอร์โทรศัพท์";
  $langMod["info:email"] = "อีเมล";
}
