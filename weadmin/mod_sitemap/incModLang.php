<?php
if ($_SESSION[$valSiteManage . "core_session_language"] == "Eng") {
} else {
	$langMod["meu:group"] = "กลุ่ม" . getNameMenu($_REQUEST["menukeyid"]);
	$langMod["meu:subgroup"] = "กลุ่มย่อย" . getNameMenu($_REQUEST["menukeyid"]);
	$langMod["meu:contant"] = getNameMenu($_REQUEST["menukeyid"]);
	$langMod["txt:titleadd"] = "สร้างข้อมูล" . getNameMenu($_REQUEST["menukeyid"]);
	$langMod["txt:titleedit"] = "แก้ไขข้อมูล" . getNameMenu($_REQUEST["menukeyid"]);
	$langMod["txt:titleview"] = "แสดงผลข้อมูล" . getNameMenu($_REQUEST["menukeyid"]);
	$langMod["txt:sortpermis"] = "จัดเรียงข้อมูล" . getNameMenu($_REQUEST["menukeyid"]);
	$langMod["txt:subject"] = "ข้อมูล" . getNameMenu($_REQUEST["menukeyid"]);
	$langMod["txt:subjectDe"] = "โปรดป้อนชื่อ เพื่อใช้ในการแสดงผลในหน้าเว็บไซต์ของคุณ";
	$langMod["txt:titleaddg"] = "สร้างข้อมูล" . $langMod["meu:group"];
	$langMod["txt:titleeditg"] = "แก้ไขข้อมูล" . $langMod["meu:group"];
	$langMod["txt:titleviewg"] = "แสดงผลข้อมูล" . $langMod["meu:group"];
	$langMod["txt:sortpermisg"] = "จัดเรียงข้อมูล" . $langMod["meu:group"];
	$langMod["txt:subjectg"] = "ข้อมูล" . $langMod["meu:group"];
	$langMod["txt:subjectgDe"] = "โปรดป้อนชื่อ เพื่อใช้ในการแสดงผลในหน้าเว็บไซต์ของคุณ";
	$langMod["txt:titleaddsg"] = "สร้างข้อมูล" . $langMod["meu:subgroup"];
	$langMod["txt:titleeditsg"] = "แก้ไขข้อมูล" . $langMod["meu:subgroup"];
	$langMod["txt:titleviewsg"] = "แสดงผลข้อมูล" . $langMod["meu:subgroup"];
	$langMod["txt:sortpermissg"] = "จัดเรียงข้อมูล" . $langMod["meu:subgroup"];
	$langMod["txt:subjectsg"] = "ข้อมูล" . $langMod["meu:subgroup"];
	$langMod["txt:subjectsgDe"] = "โปรดป้อนชื่อ เพื่อใช้ในการแสดงผลในหน้าเว็บไซต์ของคุณ";
	$langMod["txt:title"] = "ข้อมูลรายละเอียด" . getNameMenu($_REQUEST["menukeyid"]);
	$langMod["txt:titleDe"] = "โปรดป้อนรายละเอียด เพื่อใช้ในการแสดงผลในหน้าเว็บไซต์ของคุณ";
	$langMod["txt:pic"] = "รูปภาพประกอบ";
	$langMod["txt:picDe"] = "ข้อมูลรูปภาพประกอบ เพื่อใช้ในการแสดงผลรูปภาพของเนื้อหานี้";
	$langMod["txt:seo"] = "กำหนดวันที่ในการแสดงผล";
	$langMod["txt:seoDe"] = "ข้อมูลนี้คือส่วนที่ใช้ในการกำหนดวันที่ในการแสดงผล เพื่อใช้ในการแสดงผลในหน้าเว็บไซต์ของคุณ";
	$langMod["inp:notedate"] = "หมายเหตุ : กรณีไม่ต้องการระบุวันเริ่มต้น และวันสิ้นสุดของเนื้อหานี้ กรุณาเว้นไว้ไม่ต้องกรอกข้อมูลใดๆ";
	$langMod["edit:linknote"] = "หมายเหตุ : กรุณา URL นำหน้าด้วย \"http://\" เช่น http://www.wewebplus.com เป็นต้น";
	$langMod["inp:album"] = "เลือกรูปภาพ";
	$langMod["tit:subject"] = "ชื่อ" . getNameMenu($_REQUEST["menukeyid"]);
	$langMod["tit:subjectg"] = "ชื่อ" . $langMod["meu:group"];
	$langMod["tit:subjectsg"] = "ชื่อ" . $langMod["meu:subgroup"];
	$langMod["tit:sdate"] = "วันเริ่มต้น";
	$langMod["tit:edate"] = "วันสิ้นสุด";
	$langMod["file:type"] = "ประเภท";
	$langMod["file:size"] = "ขนาด";
	$langMod["file:download"] = "ดาวน์โหลด";
	$langMod["tit:linkvdo"] = "ลิงก์";
	$langMod["home:detail"] = "อ่านรายละเอียด";
	$langMod["tit:typevdo"] = "การแสดงผล";
	$langMod["inp:notepic"] = "หมายเหตุ : กรุณาอัพโหลดเฉพาะไฟล์ .jpg, .png และ .gif เท่านั้น, ขนาดของรูปภาพไม่เกิน 2 Mb และรูปภาพที่ให้ในการอัพโหลดควรมีสัดส่วนที่ " . $sizeWidthReal . "x" . $sizeHeightReal . " พิกเซล";

	$langMod["tit:selectg"] = "เลือก" . $langMod["meu:group"];
	$langMod["tit:selectgn"] = $langMod["meu:group"];
	$langMod["tit:selectsg"] = "เลือก" . $langMod["meu:subgroup"];
	$langMod["tit:selectsgn"] = $langMod["meu:subgroup"];


	$langMod["tit:inpName"] = "ชื่อ" . getNameMenu($_REQUEST["menukeyid"]);
}
