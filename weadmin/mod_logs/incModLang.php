<?
if($_SESSION[$valSiteManage."core_session_language"]=="Eng"){

}else{
		$langMod["txt:titleadd"] = "สร้างข้อมูล".getNameMenu($_REQUEST["menukeyid"]);
		$langMod["txt:titleedit"] = "แก้ไขข้อมูล".getNameMenu($_REQUEST["menukeyid"]);
		$langMod["txt:titleview"] = "แสดงผลข้อมูล".getNameMenu($_REQUEST["menukeyid"]);
		$langMod["txt:sortpermis"] = "จัดเรียงข้อมูล".getNameMenu($_REQUEST["menukeyid"]);

		$langMod["txt:subject"] = "ข้อมูล".getNameMenu($_REQUEST["menukeyid"]);
		$langMod["txt:subjectDe"] = "โปรดป้อนเชื่อหน่วยงานและรายละเอียดต่างๆ เพื่อใช้ในการแสดงผลเนื้อหาในหน้ารวมข้อมูลทั้งหมดของเมนูนี้บนเว็บไซต์ของคุณ";
		$langMod["txt:title"] = "ข้อมูลรายละเอียด".getNameMenu($_REQUEST["menukeyid"]);
		$langMod["txt:titleDe"] = "โปรดป้อนรายละเอียด เพื่อใช้ในการแสดงผลในหน้าเว็บไซต์ของคุณ";
		$langMod["txt:attfile"] = "ข้อมูลเอกสารแนบ";
		$langMod["txt:attfileDe"] = "ข้อมูลเอกสารแนบ เพื่อใช้ในการแสดงผลเอกสารแนบของเนื้อหานี้ ในรูปแบบของการดาวน์โหลดเอกสารเก็บไว้ในเครื่องคอมพิวเตอร์บนเว็บไซต์ของคุณ";
		$langMod["txt:seo"] = "ข้อมูลรองรับการค้นหาของ Search Engine";
		$langMod["txt:seoDe"] = "ข้อมูลนี้คือส่วนที่ใช้ในการรองรับการค้นหาของ Search Engine ไม่ว่าจะเป็น Google หรือ Yahoo เป็นต้น";
		$langMod["txt:date"] = "กำหนดวันที่ในการแสดงผล";
		$langMod["txt:dateDe"] = "ข้อมูลนี้คือส่วนที่ใช้ในการกำหนดวันที่ในการแสดงผล เพื่อใช้ในการแสดงผลในหน้าเว็บไซต์ของคุณ";
		$langMod["txt:old"] = "ข้อมูลการเชื่อมโยงเว็บำซต์เดิม";
		$langMod["txt:oldDe"] = "ข้อมูลนี้คือส่วนที่ใช้ในการกำหนดวันที่ในการแสดงผล เพื่อใช้ในการแสดงผลในหน้าเว็บไซต์ของคุณ";

		$langMod["txt:datec"] = "กำหนดวันที่สร้างในการแสดงผล";
		$langMod["txt:datecDe"] = "ข้อมูลนี้คือส่วนที่ใช้ในการกำหนดวันที่สร้างในการแสดงผล เพื่อใช้ในการแสดงผลในหน้าเว็บไซต์ของคุณ";

		$langMod["txt:titleTheme"] = "กำหนดรูปแบบในการแสดงผล";
		$langMod["txt:titleDeTheme"] = "ข้อมูลนี้คือส่วนที่ใช้ในการกำหนดรูปแบบในการแสดงผล เพื่อใช้ในการแสดงผลในหน้าเว็บไซต์ของคุณ";

		$langMod["txt:titleColor"] = "กำหนดสีในการแสดงผลเมนู";
		$langMod["txt:titleDeColor"] = "ข้อมูลนี้คือส่วนที่ใช้ในการกำหนดสีในการแสดงผลเมนู เพื่อใช้ในการแสดงผลในหน้าเว็บไซต์ของคุณ";

		$langMod["txt:album"] = "ข้อมูลอัลบั้มภาพ";
		$langMod["txt:albumDe"] = "ข้อมูลอัลบั้มภาพ เพื่อใช้ในการแสดงผลรูปภาพของเนื้อหานี้ ในรูปแบบภาพพสไลด์บนเว็บไซต์ของคุณ";
		$langMod["txt:video"] = "ข้อมูลวิดีโอ";
		$langMod["txt:videoDe"] = "ข้อมูลวิดีโอ เพื่อใช้ในการแสดงผลวิดีโอของเนื้อหานี้ ในรูปแบบเครื่องเล่นวิดีโอบนเว็บไซต์ของคุณ";
		$langMod["txt:pic"] = "รูปภาพโลโก้";
		$langMod["txt:picDe"] = "ข้อมูลรูปภาพโลโก้ เพื่อใช้ในการแสดงผลรูปภาพของเนื้อหานี้";


		$langMod["inp:seotitle"] ="Tag Title ";
		$langMod["inp:seotitlenote"] ="หมายเหตุ : เนื้อหาที่จะแสดงในส่วนของชื่อหน่วยงานของการค้นหาใน Search Engine(Google, Yahoo)";
		$langMod["inp:seodes"] ="Tag Description ";
		$langMod["inp:seodesnote"] ="หมายเหตุ : เนื้อหาที่จะแสดงในส่วนของรายละเอียดหัวข้อของการค้นหาใน Search Engine(Google, Yahoo)";
		$langMod["inp:seokey"] ="Tag Keywords ";
		$langMod["inp:seokeynote"] ="หมายเหตุ : คำหรือวลีที่ใช้ในการค้นหาใน Search Engine(Google, Yahoo)";

		$langMod["inp:album"] ="เลือกรูปภาพ";
		$langMod["inp:chfile"] ="เปลี่ยนชื่อเอกสารแนบ";
		$langMod["inp:sefile"] ="เลือกเอกสารแนบ";
		$langMod["inp:notefile"] ="หมายเหตุ : กรุณาเลือกอัพโหลดไฟล์ที่มีขนาดเหมาะสมไม่ใหญ่เกินไป เนื่องจากหากไฟล์ขนาดใหญ่จะส่งผลให้เกินความล่าช้าในการอัพโหลดไฟล์";
		$langMod["inp:notedate"] ="หมายเหตุ : กรณีไม่ต้องการระบุวันเริ่มต้น และวันสิ้นสุดของเนื้อหานี้ กรุณาเว้นไว้ไม่ต้องกรอกข้อมูลใดๆ";
		$langMod["inp:notepic"] ="หมายเหตุ : กรุณาอัพโหลดเฉพาะไฟล์ .jpg, .png และ .gif เท่านั้น, ขนาดของรูปภาพไม่เกิน 2 Mb และรูปภาพที่ให้ในการอัพโหลดควรมีสัดส่วนที่ ".$sizeWidthPic."x".$sizeHeightPic." พิกเซล";
		$langMod["inp:notealbum"] ="หมายเหตุ : กรุณาอัพโหลดเฉพาะไฟล์ .jpg, .png และ .gif เท่านั้น, ขนาดของรูปภาพไม่เกิน 2 Mb และรูปภาพที่ให้ในการอัพโหลดควรมีสัดส่วนที่ ".$sizeWidthAlbum."x".$sizeHeightAlbum." พิกเซล";

		$langMod["tit:subject"] ="ชื่อหน่วยงาน ";
		$langMod["tit:sdate"] ="วันเริ่มต้น";
		$langMod["tit:edate"] ="วันสิ้นสุด";
		$langMod["tit:title"] ="คำบรรยาย";
		$langMod["tit:typevdo"] ="ประเภทวิดีโอ";
		$langMod["tit:linkvdo"] ="ลิงค์ Youtube";
		$langMod["tit:uploadvdo"] ="อัพโหลดไฟล์";
		$langMod["tit:linkvdonote"] ="หมายเหตุ : ลิงค์ที่ใช่ คือ URL youtube.com เท่านั้น";
		$langMod["tit:uploadvdonote"] ="หมายเหตุ : กรุณาอัพโหลดเฉพาะไฟล์ .flv, .wmv, .mp3, .wav, .wma, .avi และ .mpeg เท่านั้น";
		$langMod["tit:noteg"] ="หมายเหตุ ";
		$langMod["tit:selectg"] ="เลือกกลุ่ม".getNameMenu($_REQUEST["menukeyid"]);
		$langMod["tit:selectgn"] ="กลุ่ม".getNameMenu($_REQUEST["menukeyid"]);
		$langMod["txt:subjectg"] = "ข้อมูล".getNameMenu($_REQUEST["menukeyid"]);
		$langMod["txt:subjectgDe"] = "โปรดป้อนชื่อหน่วยงาน เพื่อใช้ในการแสดงผลในหน้าเว็บไซต์ของคุณ";

		$langMod["file:type"] ="ประเภท";
		$langMod["file:size"] ="ขนาด";
		$langMod["file:download"] ="ดาวน์โหลด";

		$langMod["home:detail"] ="อ่านรายละเอียด";

		$langMod["tit:view"] ="เข้าชม";
		$langMod["tit:inpName"] = "ชื่อ".getNameMenu($_REQUEST["menukeyid"]);

		$langMod["mit:address"] ="ที่อยู่ ";
		$langMod["mit:tel"] ="โทรศัพท์ ";
		$langMod["mit:fax"] ="โทรสาร ";

		$langMod["mit:mapgoogle"] = "แผนที่ Google Map";
		$langMod["mit:mapgoogleDe"] = "ข้อมูลแผนที่ Google Map เพื่อใช้ในการแสดงผล Google Map ของเนื้อหานี้";

		$langMod["mit:map"] = "แผนที่";
		$langMod["mit:mapDe"] = "ข้อมูลแผนที่ เพื่อใช้ในการแสดงผลแผนที่ของเนื้อหานี้";

		$langMod["mit:qrcode"] = "QR Code";
		$langMod["mit:qrcodeDe"] = "ข้อมูล QR Code เพื่อใช้ในการแสดงผล QR Code ของเนื้อหานี้";

		$langMod["mit:notemap"] ="หมายเหตุ : กรุณาอัพโหลดเฉพาะไฟล์ .jpg, .png และ .gif เท่านั้น, ขนาดของรูปภาพไม่เกิน 2 Mb และรูปภาพที่ให้ในการอัพโหลดควรมีสัดส่วนที่ ".$sizeWidthMap."x".$sizeHeightMap." พิกเซล";

		$langMod["mit:noteQrcode"] ="หมายเหตุ : กรุณาอัพโหลดเฉพาะไฟล์ .jpg, .png และ .gif เท่านั้น, ขนาดของรูปภาพไม่เกิน 2 Mb และรูปภาพที่ให้ในการอัพโหลดควรมีสัดส่วนที่ ".$sizeWidthQrcode."x".$sizeHeightQrcode." พิกเซล";

		$langMod["mit:noteurl"] = "หมายเหตุ : กรุณา URL นำหน้าด้วย \"http://\" เช่น http://www.wewebplus.com เป็นต้น";

		$langMod["mit:Latitude"] = "ละติจูด ";
		$langMod["mit:Longitude"] = "ลองจิจูด ";

		$langMod["mit:minisite"] = "ข้อมูลการสร้างเว็บไซต์";
		$langMod["mit:minisiteDe"] = "ข้อมูลการสร้างเว็บไซต์ เพื่อใช้ในการรสร้างเว็บไซต์ของเนื้อหานี้";

		$langMod["mit:username"] = "ชื่อผู้ใช้งาน ";
		$langMod["mit:pass"] = "รหัสผ่าน ";
		$langMod["mit:urlminisite"] = "ชื่อเว็บไซต์ ";
		$langMod["txt:theme"]= "เลือกรูปแบบ ";
		$langMod["txt:color"]= "เลือกสี ";
 		$langMod["mit:noteurlminisite"] = "หมายเหตุ : กรุณาชื่อเว็บไซต์เป็นภาษาอังกฤษ ไม่มีจุด \".\" หรือตัวอักษรพิเศษ  เช่น \"itcenter\" เป็นต้น";
		$langMod["tit:subjectEn"]= "ชื่อหน่วยงาน(อังกฤษ) ";
		$langMod["mit:addressEn"] ="ที่อยู่(อังกฤษ) ";
		$langMod["mit:email"] = "อีเมล์ ";
		
		$langMod["mit:old"] = "เปิดเชื่อมโยงเว็บไซต์เดิม";
		$langMod["mit:oldUrl"] = "URL เว็บไซต์เดิม";
		
		$langMod["use:unit"] = "จำนวนข้อมูล";
		$langMod["use:new"] = "ข่าวสาร";
		$langMod["use:dov"] = "เอกสาร";
		$langMod["use:banner"] = "แบนเนอร์";
		$langMod["tit:no"]= "ลำดับ";
		$langMod["use:website"] = "กระทรวงทรัพยากรธรรมชาติและสิ่งแวดล้อม";
		
		$langMod["tit:sSedate"]= "วันที่เริ่มต้น";
		$langMod["tit:eSedate"]= "วันที่สิ้นสุด";
		$langMod["tit:sSearch"]= "คำค้นหา";
		$langMod["tit:typeAccessSle"]= "เลือกประเภทการใช้งานระบบ";
		$langMod["tit:typeAccess"]= "ประเภทใช้งาน";
}
?>
