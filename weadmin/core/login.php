<?
$check_login_status = 1;
include("../lib/session.php");
include("../lib/config.php");
include("../lib/connect.php");
include("../lib/function.php");
include("../core/incLang.php");

$inputUser = trim($_POST["inputUser"]);
$inputPass = trim($_POST["inputPass"]);


$inputUserMaster = changeQuot($inputUser);
$inputPassMaster = encodeStr($inputPass);


$sqlMaster = "SELECT " . $core_tb_staff . "_id FROM " . $core_tb_staff . " WHERE " . $core_tb_staff . "_username='" . encodeStr($inputUserMaster) . "' AND " . $core_tb_staff . "_password='" . $inputPassMaster . "'  AND " . $core_tb_staff . "_status='Superadmin'    ";
$queryMaster = wewebQueryDB($coreLanguageSQL, $sqlMaster);
$recordMaster = wewebNumRowsDB($coreLanguageSQL, $queryMaster);

if ($recordMaster >= 1) {
	$_SESSION[$valSiteManage . "core_session_logout"] = 1;
	$_SESSION[$valSiteManage . "core_session_id"] = 0;
	$_SESSION[$valSiteManage . "core_session_name"] = "Private Member";
	$_SESSION[$valSiteManage . "core_session_level"] = "SuperAdmin";
	$_SESSION[$valSiteManage . "core_session_language"] = "Thai";
	$_SESSION[$valSiteManage . "core_session_languageT"] = "1";
	$_SESSION[$valSiteManage . "core_session_usrcar"] = 0;
?>
	<script language="JavaScript" type="text/javascript">
		document.location.href = "core/index.php";
	</script>
	<?
} else {
	$_SESSION[$valSiteManage . "core_session_logout"] = 1;
	$sql = "SELECT
 " . $core_tb_staff . "_id,
 " . $core_tb_staff . "_password,
 " . $core_tb_staff . "_fnamethai,
 " . $core_tb_staff . "_lnamethai,
 " . $core_tb_staff . "_groupid   ,
 " . $core_tb_staff . "_typeuser  ,
 " . $core_tb_staff . "_typeusermini ,
 " . $core_tb_staff . "_username,
 " . $core_tb_staff . "_typemini,
 " . $core_tb_staff . "_usertype as usertype
 FROM " . $core_tb_staff . " WHERE binary " . $core_tb_staff . "_username='" . $inputUser . "'  AND " . $core_tb_staff . "_status !='Disable' ";
	$Query = wewebQueryDB($coreLanguageSQL, $sql);
	$RecordCount = wewebNumRowsDB($coreLanguageSQL, $Query);

	if ($RecordCount >= 1) {
		$Row = wewebFetchArrayDB($coreLanguageSQL, $Query);
		$myPassword = decodeStr($Row[1]);
		$usertype = $Row['usertype'];

		if ($usertype == 1) {
			### Private User

			if ($myPassword == $inputPass) {

				$_SESSION[$valSiteManage . "core_session_id"]		= $Row[0];
				$_SESSION[$valSiteManage . "core_session_name"]		= rechangeQuot($Row[2]) . " " . rechangeQuot($Row[3]);
				$_SESSION[$valSiteManage . "core_session_groupid"]	= $Row[4];
				$_SESSION[$valSiteManage . "core_session_language"]  = getSystemLang();
				$_SESSION[$valSiteManage . "core_session_languageT"]	= getSystemLangType();
				$_SESSION[$valSiteManage . "core_session_typeproblem"]	= $Row[5];
				$_SESSION[$valSiteManage . "core_session_typeusermini"]	= $Row[6];
				if ($_SESSION[$valSiteManage . "core_session_typeusermini"] != 0) {
					$_SESSION[$valSiteManage . "core_session_password"] = $myPassword;
					$_SESSION[$valSiteManage . "core_session_username"] = $Row[7];
				}
				$_SESSION[$valSiteManage . "core_session_typemini"]	= $Row[8];
				$sql_lv = "SELECT " . $core_tb_group . "_lv FROM " . $core_tb_group . " WHERE " . $core_tb_group . "_id='" . $Row[4] . "'";
				$Query_lv = wewebQueryDB($coreLanguageSQL, $sql_lv);
				$Row_lv = wewebFetchArrayDB($coreLanguageSQL, $Query_lv);
				$_SESSION[$valSiteManage . "core_session_level"]		= $Row_lv[0];


				###################### Start insert logs ##################
				logs_access('1', 'Login');

				if ($coreLanguageSQL == "mssql") {
					$sqlLog = "DELETE FROM " . $core_tb_log . " WHERE " . $core_tb_log . "_time < DATEADD(mm, -3, GETDATE())";
				} else {
					$sqlLog = "DELETE FROM " . $core_tb_log . " WHERE " . $core_tb_log . "_time < DATE_SUB(" . wewebNow($coreLanguageSQL) . ", INTERVAL  3 MONTH)";
				}


				$queryLog = wewebQueryDB($coreLanguageSQL, $sqlLog);

				$days = 90;
				$valDel = 3600 * ($days * 24);
				$dir = "../../logs/login/";
				$nofiles = 0;

				if ($handle = @opendir($dir)) {
					while (false !== ($file = @readdir($handle))) {
						$valFileDel = $dir . $file;
						if (is_file($valFileDel)) {
							$filelastmodified = @filemtime($valFileDel);
							if ((time() - $filelastmodified) > $valDel) {
								unlink($valFileDel);
								$nofiles++;
							}
						}
					}
					closedir($handle);
				}

				$dir = "../../logs/access-user/";
				if ($handle = @opendir($dir)) {
					while (false !== ($file = @readdir($handle))) {
						$valFileDel = $dir . $file;
						if (is_file($valFileDel)) {
							$filelastmodified = @filemtime($valFileDel);
							if ((time() - $filelastmodified) > $valDel) {
								unlink($valFileDel);
								$nofiles++;
							}
						}
					}
					closedir($handle);
				}

				$dir = "../../logs/access-permission/";
				if ($handle = @opendir($dir)) {
					while (false !== ($file = @readdir($handle))) {
						$valFileDel = $dir . $file;
						if (is_file($valFileDel)) {
							$filelastmodified = @filemtime($valFileDel);
							if ((time() - $filelastmodified) > $valDel) {
								unlink($valFileDel);
								$nofiles++;
							}
						}
					}
					closedir($handle);
				}


				###################### End logs ##################

				$sql = "UPDATE " . $core_tb_staff . " SET " . $core_tb_staff . "_logdate=" . wewebNow($coreLanguageSQL) . " WHERE " . $core_tb_staff . "_id='" . $_SESSION[$valSiteManage . "core_session_id"] . "'";
				$Query = wewebQueryDB($coreLanguageSQL, $sql);



				if ($inputUrl != "") {
					$txtLinkUrlTo = "../" . $inputUrl;
				} else {
					$txtLinkUrlTo = "core/index.php";
				}
	?>
				<script language="JavaScript" type="text/javascript">
					document.location.href = "<?= $txtLinkUrlTo ?>";
				</script>
			<?

			} else {
			?>
				<script language="JavaScript" type="text/javascript">
					jQuery("#loadAlertLogin").show();
					jQuery("#loadAlertLoginOA").hide();
					document.myFormLogin.inputUser.value = '';
					document.myFormLogin.inputPass.value = '';
				</script>
		<?
			}
		} else {
			### Domain User
			// include("../lib/ActiveDirectory/login.php");
		}
	} else {
		?>
		<script language="JavaScript" type="text/javascript">
			jQuery("#loadAlertLogin").show();
			jQuery("#loadAlertLoginOA").hide();
			document.myFormLogin.inputUser.value = '';
			document.myFormLogin.inputPass.value = '';
		</script>
<?
	}
}

include("../lib/disconnect.php");
?>