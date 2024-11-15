<?php

if ($_SESSION[$valSiteManage . 'core_session_id'] >= 1 || $_SESSION[$valSiteManage . "core_session_level"] == "SuperAdmin") {
    if (gettype($_SESSION[$valSiteManage . "core_session_multilang"]) != 'array' || count($_SESSION[$valSiteManage . "core_session_multilang"]) <= 0) {
        $sql = "SELECT 
		" . $core_tb_lang . "." . $core_tb_lang . "_id,
		" . $core_tb_lang . "." . $core_tb_lang . "_subject,
		" . $core_tb_lang . "." . $core_tb_lang . "_display,
		" . $core_tb_lang . "." . $core_tb_lang . "_status
		FROM " . $core_tb_lang . "";
        $querySubjectHead = wewebQueryDB($coreLanguageSQL, $sql);
        $count_recordHead = wewebNumRowsDB($coreLanguageSQL, $querySubjectHead);
        $core_lang_def_array = array();

        if ($count_recordHead >= 1) {
            foreach ($querySubjectHead as $key => $value) {
                array_push(
                    $core_lang_def_array,
                    array(
                        "id" =>     $value['0'],
                        "key" =>     $value['1']
                    )
                );
            }
        }
        $_SESSION[$valSiteManage . "core_session_multilang"] = $core_lang_def_array;
    }
}

if ($_SESSION[$valSiteManage . "core_session_language"] == "Eng") {
    $langTxt["nav:setting"] = "Setting System";
    $langTxt["nav:home1"] = "Welcome Sign";
    $langTxt["nav:detail"] = "The system is built to be used to manage the site. Sign in with your account.";
    $langTxt["nav:home2"] = "Home";
    $langTxt["nav:menuManage2"] = "Use menu";

    $langTxt["login:user"] = "Username";
    $langTxt["login:pass"] = "Password";
    $langTxt["login:btn"] = "Log in";
    $langTxt["login:permis"] = "Permission Management";
    $langTxt["login:permisDe"] = "You can manage licenses. To manage the site each menu. Without necessarily just you alone. Or just use only.";
    $langTxt["login:time"] = "Shorten";
    $langTxt["login:timeDe"] = "You can change the information on the website immediately. Shortens time to design content. It also can display the content on the fly by yourself.";
    $langTxt["login:price"] = "Save cost";
    $langTxt["login:priceDe"] = "You can change the information on the website itself. The user does not have to cost more in the long run. Whether it is the design of the meat. Add the meat to the site etc.";
    $langTxt["login:alert"] = "You enter your user name / password is incorrect.";
    $langTxt["login:footecopy"] = "&copy; 2015 WEWEBPLUS";
    $langTxt["login:footecontact"] = "Email: support@wewebplus.com Tel.: 02-570-1266, 086-920-7736";

    $langTxt["menu:logout"] = "Log out";
    $langTxt["menu:topmenu"] = "Menu System";


    $langTxt["mg:subject"] = "Name Menu";
    $langTxt["mg:type"] = "Type";
    $langTxt["mg:status"] = "Status";
    $langTxt["mg:manage"] = "Manage";
    $langTxt["mg:nodate"] = "No Data";
    $langTxt["mg:crepermis"] = "Create menus to use the new system.";
    $langTxt["mg:editpermis"] = "Using the Edit menu";
    $langTxt["mg:viewpermis"] = "Display menu system applications.";
    $langTxt["mg:sortpermis"] = "Sort menu to use the new system.";
    $langTxt["mg:delpermis"] = "Are you sure to delete this record?";

    $langTxt["mg:mgrestore"] = "Are you sure to restore this record?";

    $langTxt["mg:selpermis"] = "Please checked 1 or more item to delete record.";
    $langTxt["mg:selpermiscopy"] = "Please checked 1 or more item to copy record.";
    $langTxt["mg:copypermis"] = "Are you sure to copy this record?";

    $langTxt["mg:inptype"] = "Type menu";
    $langTxt["mg:inpfile"] = "Run the file";
    $langTxt["mg:inpfileAd"] = "Select the file";
    $langTxt["mg:inpurl"] = "URL";
    $langTxt["mg:inpkey"] = "Control Code";
    $langTxt["mg:inpshow"] = "Impressions";
    $langTxt["mg:inpwindows"] = "Open the window";
    $langTxt["mg:inpwindowsnew"] = "Open a new window";
    $langTxt["mg:inpicon"] = "Icon";
    $langTxt["mg:inpiconAd"] = "Select Icon";
    $langTxt["mg:inpnthai"] = "Thailand Name Menu";
    $langTxt["mg:inpneng"] = "English Name Menu";




    $langTxt["mg:titleset"] = "Menu settings to use.";
    $langTxt["mg:titlesetDe"] = "Please enter the setup menu to use. To use the display menu to manage your website.";
    $langTxt["mg:titleicon"] = "Use menu icons";
    $langTxt["mg:titleiconDe"] = "Please select an icon to use. To use the display menu to manage your website.";
    $langTxt["mg:title"] = "Title Use menu";
    $langTxt["mg:titleDe"] = "Please enter the Thailand and the United Kingdom. To use the display menu to manage your website.";

    $langTxt["nav:perManage2"] = "Permission System";
    $langTxt["pr:subject"] = "Name Permission";
    $langTxt["pr:crepermis"] = "Create a new permission system.";
    $langTxt["pr:editpermis"] = "Edit permission system";
    $langTxt["pr:viewpermis"] = "Showing the permission system.";
    $langTxt["pr:sortpermis"] = "Sort permission system";

    $langTxt["pr:select"] = "Select permission";
    $langTxt["pr:select1"] = "Administrative management (Accessible to all parts of the system: Administrator).";
    $langTxt["pr:select2"] = "Site Administrator (Accessible part of the system: Webmaster).";
    $langTxt["pr:select3"] = "Minisite";

    $langTxt["pr:all"] = "All ";
    $langTxt["pr:permission"] = "Requiring the permission system ";
    $langTxt["pr:cre"] = "Create a new permission system.";
    $langTxt["pr:read"] = "Read Only";
    $langTxt["pr:manage"] = "Management";
    $langTxt["pr:noaccess"] = "Inaccessible";

    $langTxt["pr:All"] = "Total";
    $langTxt["pr:record"] = "List";
    $langTxt["pr:of"] = "From";
    $langTxt["pr:page"] = "Page";
    $langTxt["pr:pretype"] = "Permission type";
    $langTxt["pr:pername"] = "Name";

    $langTxt["pr:title"] = "Topic Permission System";
    $langTxt["pr:titleDe"] = "Please enter the permission type and name. In order to determine the feasibility of managing your website.";
    $langTxt["pr:titlePer"] = "Given access to the system.";
    $langTxt["pr:titlePerDe"] = "Please select privileges on the system menu. In order to manage your site.";


    $langTxt["nav:userManage2"] = "User Login";
    $langTxt["us:subject"] = "Username";
    $langTxt["us:crepermis"] = "Users create a new system";
    $langTxt["us:editpermis"] = "Edit User Login";
    $langTxt["us:viewpermis"] = "Display User Login";
    $langTxt["us:sortpermis"] = "Sort users the new system.";
    $langTxt["us:permission"] = "Permission System";
    $langTxt["us:selectpermission"] = "Select Permission System";

    $langTxt["us:nameuser"] = "Username";
    $langTxt["us:pass"] = "Password";
    $langTxt["us:repass"] = "Confirm password";
    $langTxt["us:antecedent"] = "Antecedent";
    $langTxt["us:sex"] = "Sec";
    $langTxt["us:firstnamet"] = "Thailand first name";
    $langTxt["us:lastnamet"] = "Thailand last name";
    $langTxt["us:firstnamete"] = "English first name";
    $langTxt["us:lastnamee"] = "English last name";
    $langTxt["us:email"] = "E-mail";
    $langTxt["us:position"] = "Position";
    $langTxt["us:address"] = "Adddress ";
    $langTxt["us:tel"] = "Tel. ";
    $langTxt["us:mobile"] = "Mobile";
    $langTxt["us:other"] = "Other";
    $langTxt["us:mr"] = "Mr.";
    $langTxt["us:miss"] = "Ms.";
    $langTxt["us:mrs"] = "Mrs.";
    $langTxt["us:male"] = "Male";
    $langTxt["us:female"] = "Female";
    $langTxt["us:titleuser"] = "Title User Login";
    $langTxt["us:titleuserDe"] = "Please type in the user interface. In order to control the user interface to manage your website.";
    $langTxt["us:titlepic"] = "Image User Login";
    $langTxt["us:titlepicDe"] = "Add a user's system. Display pictures for use in next generation user interface for managing your site.";
    $langTxt["us:titleinfo"] = "The data is stored in the system";
    $langTxt["us:titleinfoDe"] = "The data is stored in the system In order to check the history of use in managing your website.";
    $langTxt["us:titlesystem"] = "A guide who use the system.";
    $langTxt["us:titlesystemDe"] = "Please enter a guide who use the system. In order to control the user interface to manage your website.";

    $langTxt["us:inputpic"] = "Image User Login";
    $langTxt["us:inputpicselect"] = "Select files to upload";

    $langTxt["us:credate"] = "Create Date";
    $langTxt["us:lastdate"] = "Update Date";
    $langTxt["us:creby"] = "By";

    $langTxt["st:title"] = "Information system settings";
    $langTxt["st:titleDe"] = "Please login in order to set the language used on the site.";
    $langTxt["st:lang"] = "Language";
    $langTxt["st:type"] = "Number of Languages";
    $langTxt["st:edit"] = "Edit Settings";
    $langTxt["st:editlang"] = "Edit Setting Languages";
    $langTxt["st:thai"] = "Thailand";
    $langTxt["st:eng"] = "English";
    $langTxt["st:1"] = "One language";
    $langTxt["st:2"] = "Multi language";
    $langTxt["st:3"] = "Tree language";

    $langTxt["home:login"] = "Web Site Management System";
    $langTxt["home:box"] = "My Menu";
    $langTxt["home:login"] = "Login Login";
    $langTxt["home:userDe"] = "You can manage user interface. To manage the site each menu. Without necessarily just you alone. Or just use only.";
    $langTxt["home:premisDe"] = "You are able to manage the license system. To manage the site each menu without restrictions just the right one. Manage your site";
    $langTxt["home:used"] = "Info System";
    $langTxt["home:access"] = "Access";
    $langTxt["home:date"] = "Date";
    $langTxt["home:app"] = "No increase in the Application Menu, press.";
    $langTxt["home:appLast"] = "Top to select Menu";

    $langTxt["btn:export2"] = "Word";
    $langTxt["btn:export"] = "Export";
    $langTxt["btn:close"] = "Close";
    $langTxt["btn:gototop"] = "Goto Top";
    $langTxt["btn:back"] = "Back";
    $langTxt["btn:add"] = "Add";
    $langTxt["btn:del"] = "Delete";
    $langTxt["btn:copy"] = "Copy";
    $langTxt["btn:edit"] = "Edit";
    $langTxt["btn:top"] = "Top";
    $langTxt["btn:save"] = "Save";
    $langTxt["btn:sortting"] = "Sort";
    $langTxt["btn:sort"] = "Order";
    $langTxt["btn:export"] = "Export";

    $langTxt["lg:thai"] = "TH";
    $langTxt["lg:eng"] = "EN";
    $langTxt["lg:chi"] = "CN";
    $langTxt["lg:all"] = "All";

    $langTxt["lgFull:thai"] = "Thai";
    $langTxt["lgFull:eng"] = "English";
    $langTxt["lgFull:chi"] = "Chinese";

    $langTxt["txt:about"] = "Text information of the system";
    $langTxt["txt:aboutDe"] = "This information is used to set up a website to your website";
    $langTxt["ab:subject"] = "Name system";
    $langTxt["ab:title"] = "Name system(EN)";
    $langTxt["ab:titleback"] = "The title is the system";

    $langTxt["txt:pic"] = "Logo";
    $langTxt["txt:picDe"] = "The image logo, for use in the picture display of content";
    $langTxt["inp:album"] = "Select image";
    $langTxt["inp:notepic"] = "หมายเหตุ : กรุณาอัพโหลดเฉพาะไฟล์ .jpg, .png และ .gif เท่านั้น, ขนาดของรูปภาพไม่เกิน 2 Mb และรูปภาพที่ให้ในการอัพโหลดควรมีสัดส่วนที่ 150x150 พิกเซล";
} else {
    $langTxt["nav:setting"] = "ตั้งค่าระบบ";
    $langTxt["nav:home1"] = "ยินดีต้อนรับเข้าสู่ระบบ";
    $langTxt["nav:detail"] = "ระบบนี้สร้างขึ้นมาเพื่อใช้ในการบริการจัดการเว็บไซต์. ลงชื่อเข้าใช้ด้วยบัญชีของคุณ";
    $langTxt["nav:home2"] = "หน้าหลัก";
    $langTxt["nav:sign"] = ">";
    $langTxt["nav:menuManage2"] = "เมนูการใช้งาน";

    $langTxt["login:user"] = "ชื่อผู้ใช้งาน";
    $langTxt["login:pass"] = "รหัสผ่าน";
    $langTxt["login:btn"] = "เข้าสู่ระบบ";
    $langTxt["login:permis"] = "จัดการสิทธิการใช้งาน";
    $langTxt["login:permisDe"] = "คุณสามารถที่จะจัดการสิทธิการใช้งาน ในการจัดการเว็บไซต์ในแต่ละเมนู
ได้โดยไม่จำเป็นต้องเป็นแค่คุณคนเดียว หรือแค่ผู้ใช้งานเพียงคนเดียว";
    $langTxt["login:time"] = "ลดระยะเวลา";
    $langTxt["login:timeDe"] = "คุณสามารถเปลี่ยนแปลงข้อมูลบนเว็บไซต์ได้ทันทีที่ต้องการ ทำให้ลดระยะเวลาในการดำเนินการออกแบบเนื้อหา
พร้อมทั้งยังสามารถเปิดแสดงผลเนื้อหาได้ทันทีโดยตัวคุณเอง";
    $langTxt["login:price"] = "ประหยัดค่าใช้จ่าย";
    $langTxt["login:priceDe"] = "คุณสามารถเปลี่ยนข้อมูลบนเว็บไซตเองได้ โดยใช้ไม่ต้องมีค่าใช้จ่ายเพิ่มเติมในระยะยาว ไม่ว่าจะเป็นค่าออกแบบเนื้อ ค่าเพิ่มเนื้อในเว็บไซต์ ฯลฯ";
    $langTxt["login:alert"] = "คุณกรอกชื่อผู้ใช้งาน/รหัสผ่านไม่ถูกต้อง";
    $langTxt["login:footecopy"] = "&copy; " . date('Y') . " Department of Medical Sciences Ministry of Public Health ";
    $langTxt["login:footecontact"] = "Copyright &copy; DMSC All rights reserved.";

    $langTxt["menu:logout"] = "ออกจากระบบ";
    $langTxt["menu:topmenu"] = "เมนูผู้ใช้งานระบบ";


    $langTxt["mg:subject"] = "ชื่อเมนู";
    $langTxt["mg:type"] = "ประเภท";
    $langTxt["mg:status"] = "สถานะ";
    $langTxt["mg:manage"] = "จัดการ";
    $langTxt["mg:nodate"] = "ไม่พบข้อมูล";
    $langTxt["mg:crepermis"] = "สร้างเมนูการใช้งานระบบใหม่";
    $langTxt["mg:editpermis"] = "แก้ไขเมนูการใช้งานระบบ";
    $langTxt["mg:viewpermis"] = "แสดงผลเมนูการใช้งานระบบ";
    $langTxt["mg:sortpermis"] = "จัดเรียงเมนูการใช้งานระบบใหม่";
    $langTxt["mg:delpermis"] = "Are you sure to delete this record?";
    $langTxt["mg:selpermis"] = "Please checked 1 or more item to delete record.";
    $langTxt["mg:selpermiscopy"] = "Please checked 1 or more item to copy record.";
    $langTxt["mg:copypermis"] = "Are you sure to copy this record?";

    $langTxt["mg:inptype"] = "ประเภทเมนู";
    $langTxt["mg:inpfile"] = "ไฟล์ที่เรียกใช้";
    $langTxt["mg:inpfileAd"] = "เลือกที่อยู่ไฟล์";
    $langTxt["mg:inpurl"] = "URL";
    $langTxt["mg:inpkey"] = "รหัสควบคุม";
    $langTxt["mg:inpshow"] = "การแสดงผล";
    $langTxt["mg:inpwindows"] = "เปิดหน้าต่างเดิม";
    $langTxt["mg:inpwindowsnew"] = "เปิดหน้าต่างใหม่";
    $langTxt["mg:inpicon"] = "ไอคอน";
    $langTxt["mg:inpiconAd"] = "เลือกไอคอน";
    $langTxt["mg:inpnthai"] = "ชื่อเมนูไทย";
    $langTxt["mg:inpneng"] = "ชื่อเมนูอังกฤษ";
    $langTxt["mg:inpwindows1"] = "Home";
    $langTxt["mg:inpwindows2"] = "Portfolio";
    $langTxt["mg:inpwindows3"] = "Client";
    $langTxt["mg:inpwindows4"] = "Services";
    $langTxt["mg:inpwindows5"] = "About us";
    $langTxt["mg:inpwindows6"] = "Contact us";





    $langTxt["mg:titleset"] = "การตั้งค่าเมนูการใช้งาน";
    $langTxt["mg:titlesetDe"] = "โปรดป้อนการตั้งค่าเมนูการใช้งาน เพื่อใช้ในการแสดงผลเมนูในการจัดการเว็บไซต์ของคุณ";
    $langTxt["mg:titleicon"] = "ไอคอนเมนูการใช้งาน";
    $langTxt["mg:titleiconDe"] = "โปรดเลือกไอคอนเมนูการใช้งาน เพื่อใช้ในการแสดงผลเมนูในการจัดการเว็บไซต์ของคุณ";
    $langTxt["mg:title"] = "หัวข้อเมนูการใช้งาน";
    $langTxt["mg:titleDe"] = "โปรดป้อนชื่อเมนูไทยและเมนูอังกฤษ เพื่อใช้ในการแสดงผลเมนูในการจัดการเว็บไซต์ของคุณ";

    $langTxt["nav:perManage2"] = "สิทธิ์การใช้งานระบบ";
    $langTxt["pr:subject"] = "ชื่อสิทธิ์การใช้งานระบบ";
    $langTxt["pr:crepermis"] = "สร้างสิทธิ์การใช้งานระบบใหม่";
    $langTxt["pr:editpermis"] = "แก้ไขสิทธิ์การใช้งานระบบ";
    $langTxt["pr:viewpermis"] = "แสดงผลสิทธิ์การใช้งานระบบ";
    $langTxt["pr:sortpermis"] = "จัดเรียงสิทธิ์การใช้งานระบบใหม่";

    $langTxt["pr:select"] = "เลือกสิทธิ์การใช้งาน";
    $langTxt["pr:select1"] = "ผู้ดูแลระบบบริหารจัดการ (สามารถเข้าถึงได้ทุกส่วนของระบบ : Administrator)";
    $langTxt["pr:select2"] = "ผู้บริหารจัดการเว็บไซต์ (สามารถเข้าถึงได้บางส่วนของระบบ : Webmaster)";
    $langTxt["pr:select3"] = "เว็บไซต์หน่วยงาน";
    $langTxt["pr:all"] = "เลือกทั้งหมด ";
    $langTxt["pr:permission"] = "กำหนดสิทธิ์การใช้งานระบบ ";
    $langTxt["pr:cre"] = "สร้างสิทธิ์การใช้งานระบบใหม่";
    $langTxt["pr:read"] = "อ่านอย่างเดียว";
    $langTxt["pr:manage"] = "บริหารจัดการ";
    $langTxt["pr:noaccess"] = "ไม่สามารถเข้าถึง";

    $langTxt["pr:All"] = "จำนวนทั้งหมด";
    $langTxt["pr:record"] = "รายการ";
    $langTxt["pr:of"] = "จาก";
    $langTxt["pr:page"] = "หน้า";
    $langTxt["pr:pretype"] = "ประเภทสิทธิ์การใช้งาน";
    $langTxt["pr:pername"] = "ชื่อ";

    $langTxt["pr:title"] = "หัวข้อสิทธิ์การใช้งานระบบ";
    $langTxt["pr:titleDe"] = "โปรดป้อนประเภทและชื่อสิทธิ์การใช้งาน เพื่อใช้ในการกำหนดสิทธิ์ในการจัดการเว็บไซต์ของคุณ";
    $langTxt["pr:titlePer"] = "กำหนดสิทธิ์การเข้าใช้งานระบบ";
    $langTxt["pr:titlePerDe"] = "โปรดเลือกสิทธิ์การเข้าใช้งานระบบแต่ละเมนู เพื่อใช้ในการจัดการเว็บไซต์ของคุณ";


    $langTxt["nav:userManage2"] = "ผู้ใช้งานระบบ";
    $langTxt["us:subject"] = "ชื่อผู้ใช้งานระบบ";
    $langTxt["us:crepermis"] = "สร้างผู้ใช้งานระบบใหม่";
    $langTxt["us:editpermis"] = "แก้ไขผู้ใช้งานระบบ";
    $langTxt["us:viewpermis"] = "แสดงผลผู้ใช้งานระบบ";
    $langTxt["us:sortpermis"] = "จัดเรียงผู้ใช้งานระบบใหม่";
    $langTxt["us:permission"] = "สิทธิ์การใช้งานระบบ";
    $langTxt["us:selectpermission"] = "เลือกสิทธิ์การใช้งานระบบ";

    $langTxt["us:nameuser"] = "ชื่อผู้ใช้งาน";
    $langTxt["us:pass"] = "รหัสผ่าน";
    $langTxt["us:repass"] = "ยืนยันรหัสผ่าน";
    $langTxt["us:antecedent"] = "คำนำหน้า";
    $langTxt["us:sex"] = "เพศ";
    $langTxt["us:firstnamet"] = "ชื่อ ภาษาไทย";
    $langTxt["us:lastnamet"] = "นามสกุล ภาษาไทย";
    $langTxt["us:firstnamete"] = "ชื่อ อังกฤษ	";
    $langTxt["us:lastnamee"] = "นามสกุล อังกฤษ";
    $langTxt["us:email"] = "อีเมล์";
    $langTxt["us:position"] = "ตำแหน่ง";
    $langTxt["us:address"] = "ที่อยู่ ";
    $langTxt["us:tel"] = "เบอร์โทรศัพท์ ";
    $langTxt["us:mobile"] = "เบอร์โทรศัพท์มือถือ";
    $langTxt["us:other"] = "อื่นๆ";
    $langTxt["us:mr"] = "นาย";
    $langTxt["us:miss"] = "นางสาว";
    $langTxt["us:mrs"] = "นาง";
    $langTxt["us:male"] = "ชาย";
    $langTxt["us:female"] = "หญิง";
    $langTxt["us:titleuser"] = "หัวข้อผู้ใช้งานระบบ";
    $langTxt["us:titleuserDe"] = "โปรดป้อนการตั้งค่าผู้ใช้งานระบบ เพื่อใช้ในการควบคุมผู้ใช้งานระบบในการจัดการเว็บไซต์ของคุณ";
    $langTxt["us:titlepic"] = "รูปภาพผู้ใช้งานระบบ";
    $langTxt["us:titlepicDe"] = "เพิ่มรูปภาพของผู้ใช้งานระบบ เพื่อใช้ในแสดงผลรูปภาพผู้ใช้งานระบบในการจัดการเว็บไซต์ของคุณ";
    $langTxt["us:titleinfo"] = "ข้อมูลจัดเก็บในระบบ";
    $langTxt["us:titleinfoDe"] = "ข้อมูลจัดเก็บในระบบ เพื่อใช้ในการตรวจสอบประวัติการใช้งานในการจัดการเว็บไซต์ของคุณ";
    $langTxt["us:titlesystem"] = "ข้อมูลเบื้อต้นผู้ใช้งานระบบ";
    $langTxt["us:titlesystemDe"] = "โปรดป้อนข้อมูลเบื้อต้นผู้ใช้งานระบบ เพื่อใช้ในการควบคุมผู้ใช้งานระบบในการจัดการเว็บไซต์ของคุณ";

    $langTxt["us:titleper"] = "สาขารถยนต์มือสอง";
    $langTxt["us:titleperDe"] = "โปรดเลือกสาขารถยนต์มือสองเพิ่มกำหนดสิทธิ์การเข้าถึงข้อมูล หากต้องการให้แสดงผลข้อมูลรถยนต์มือสองทั้งหมดไม่ต้องเลือกสาขารถยนต์มือสอง";

    $langTxt["us:inputpic"] = "รูปภาพผู้ใช้งานระบบ";
    $langTxt["us:inputpicselect"] = "เลือกไฟล์ที่ต้องการอัพโหลด";

    $langTxt["us:credate"] = "วันที่สร้าง";
    $langTxt["us:lastdate"] = "วันที่ปรับปรุง";
    $langTxt["us:creby"] = "โดย";

    $langTxt["st:title"] = "ข้อมูลการตั้งค่าระบบ";
    $langTxt["st:titleDe"] = "โปรดระบบภาษา เพื่อใช้ในการตั้งค่าระบบภาษาที่ใช้ในระบบจัดการเว็บไซต์";

    $langTxt["st:titleLang"] = "ข้อมูลการตั้งค่าภาษา";
    $langTxt["st:titleLangDisplay"] = "ข้อมูลการตั้งค่าการแสดงผลภาษา";
    $langTxt["st:titleDeLang"] = "โปรดระบุภาษา เพื่อใช้ในการตั้งค่าระบบภาษาที่ใช้ในระบบจัดการเนื้อหาเว็บไซต์";

    $langTxt["st:lang"] = "ภาษา";
    $langTxt["st:type"] = "จำนวนภาษา";
    $langTxt["st:edit"] = "แก้ไขการตั้งค่าระบบ";
    $langTxt["st:editlang"] = "แก้ไขการตั้งค่าระบบภาษา";
    $langTxt["st:thai"] = "ภาษาไทย";
    $langTxt["st:eng"] = "ภาษาอังกฤษ";
    $langTxt["st:1"] = "ภาษาเดียว";
    $langTxt["st:2"] = "หลายภาษา";
    $langTxt["st:3"] = "สามภาษา";

    $langTxt["home:login"] = "ระบบบริการจัดการเว็บไซต์";
    $langTxt["home:box"] = "เมนูส่วนตัว";
    $langTxt["home:login"] = "เข้าสู่ระบบล่าสุด";
    $langTxt["home:userDe"] = "คุณสามารถที่จะจัดการผู้ใช้งานระบบ ในการจัดการเว็บไซต์ในแต่ละเมนู ได้โดยไม่จำเป็นต้องเป็นแค่คุณคนเดียว หรือแค่ผู้ใช้งานเพียงคนเดียว";
    $langTxt["home:premisDe"] = "คุณสามารถที่จะจัดการสิทธิ์การใช้งานระบบ ในการจัดการเว็บไซต์ในแต่ละเมนูได้โดยไม่จำกัดสิทธิ์เพียงสิทธิ์เดียว ในการจัดการเว็บไซต์ของคุณ";
    $langTxt["home:used"] = "ข้อมูลการใช้งานระบบล่าสุด";
    $langTxt["home:access"] = "การเข้าถึง";
    $langTxt["home:date"] = "วันที่";
    $langTxt["home:app"] = "คุณยังไม่ได้เพิ่ม Application ในเมนูส่วนตัว กรุณากด";
    $langTxt["home:appLast"] = "ด้านบนเพื่อเลือกเมนูส่วนตัว";

    $langTxt["btn:export2"] = "Word";
    $langTxt["btn:export"] = "ส่งออก";
    $langTxt["btn:close"] = "ปิด";
    $langTxt["btn:gototop"] = "กลับด้านบน";
    $langTxt["btn:back"] = "กลับ";
    $langTxt["btn:add"] = "เพิ่ม";
    $langTxt["btn:del"] = "ลบ";
    $langTxt["btn:copy"] = "คัดลอก";
    $langTxt["btn:edit"] = "แก้ไข";
    $langTxt["btn:top"] = "Top";
    $langTxt["btn:save"] = "บันทึก";
    $langTxt["btn:sortting"] = "จัดเรียง";
    $langTxt["btn:sort"] = "เรียง";
    $langTxt["btn:export"] = "ส่งออก";

    $langTxt["us:usercar"] = "สาขารถยนต์มือสอง";
    $langTxt["us:usercarSt"] = "เลือกสาขารถยนต์มือสอง";
    $langTxt["us:titleusercar"] = "หมายเหตุ: หากต้องการให้แสดงผลข้อมูลรถยนต์มือสองทั้งหมดไม่ต้องเลือกสาขารถยนต์มือสอง";


    $langTxt["lg:thai"] = "TH";
    $langTxt["lg:eng"] = "EN";
    //$langTxt["lg:chi"] = "CN";
    $langTxt["lg:all"] = "All";

    $langTxt["lgFull:thai"] = "Thai";
    $langTxt["lgFull:eng"] = "English";
    //   $langTxt["lgFull:chi"] = "Chinese";

    $langTxt["txt:about"] = "ข้อมูลข้อความของระบบ";
    $langTxt["txt:aboutDe"] = "ข้อมูลนี้คือส่วนที่ใช้ในการตั้งค่าเว็บไซต์ในเว็บไซต์ของคุณ";
    $langTxt["ab:subject"] = "ชื่อระบบ";
    $langTxt["ab:title"] = "ชื่อระบบอังกฤษ";
    $langTxt["ab:titleback"] = "ชื่อหัวข้อระบบ";

    $langTxt["txt:pic"] = "รูปภาพ LOGO";
    $langTxt["txt:picDe"] = "ข้อมูลรูปภาพ LOGO เพื่อใช้ในการแสดงผลรูปภาพของเนื้อหานี้";
    $langTxt["inp:album"] = "เลือกรูปภาพ";
    $langTxt["inp:notepic"] = "หมายเหตุ : กรุณาอัพโหลดเฉพาะไฟล์ .jpg, .png และ .gif เท่านั้น, ขนาดของรูปภาพไม่เกิน 2 Mb และรูปภาพที่ให้ในการอัพโหลดควรมีสัดส่วนที่ 150x150 พิกเซล";
    $langTxt["mg:show"] = "การแสดงผล";
    $langTxt["inp:logo"] = "รูปภาพ LOGO";
    $langTxt["inp:mainimg"] = "รูปภาพ Main image";
    $langTxt["inp:Rightimg"] = "รูปภาพ Right image";
    $langTxt["inp:Leftimg"] = "รูปภาพ Left image";
    $langTxt["inp:Coverimg"] = "รูปภาพ Cover Image";
    $langTxt["inp:imgno"] = "รูปภาพที่";


    $langTxt["txt:pic2"] = "รูปภาพ Header";
    $langTxt["txt:pic2De"] = "ข้อมูลรูปภาพ Header เพื่อใช้ในการแสดงผลรูปภาพของเนื้อหานี้";
    $langTxt["inp:notepic2"] = "หมายเหตุ : กรุณาอัพโหลดเฉพาะไฟล์ .jpg, .png และ .gif เท่านั้น, ขนาดของรูปภาพไม่เกิน 2 Mb และรูปภาพที่ให้ในการอัพโหลดควรมีสัดส่วนที่ 500x180 พิกเซล";


    $langTxt["txt:pic3"] = "รูปภาพ Background";
    $langTxt["txt:pic3De"] = "ข้อมูลรูปภาพ Background เพื่อใช้ในการแสดงผลรูปภาพของเนื้อหานี้";
    $langTxt["inp:notepic3"] = "หมายเหตุ : กรุณาอัพโหลดเฉพาะไฟล์ .jpg, .png และ .gif เท่านั้น, ขนาดของรูปภาพไม่เกิน 2 Mb และรูปภาพที่ให้ในการอัพโหลดควรมีสัดส่วนที่ 1920x840 พิกเซล";


    $langTxt["mini:siteth"] = "ชื่อ URL (TH)";
    $langTxt["mini:siteen"] = "ชื่อ URL (EN)";

    $langMod["tit:typevdo"] = "การแสดงผล ";

    $langTxt["us:position"] = "ตำแหน่ง";

    $langTxt["txt:typeuser"] = "ประเภทผู้ใช้งาน";
    $langTxt["txt:typeuserSel"] = "เลือกประเภทผู้ใช้งาน";


    $langTxt["us:selectUnitMain"] = "เลือกหน่วยงานหลัก";
    $langTxt["us:unitMain"] = "หน่วยงานหลัก";
    $langTxt["us:selectUnitSub"] = "เลือกหน่วยงานย่อย";
    $langTxt["us:unitSub"] = "หน่วยงานย่อย";

    $langTxt["tit:selectlang"] = "เลือกภาษา";
}
