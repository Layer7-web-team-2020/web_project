<?php
// 쿠키 동작 문제 해결.
header('P3P: CP="ALL CURa ADMa DEVa TAIa OUR BUS IND PHY ONL UNI PUR FIN COM NAV INT DEM CNT STA POL HEA PRE LOC OTC"');
// 세션 파일을 저장할 경로 설정. 설정하지 않으면 php.ini에 기본 경로에 저장.
ini_set('session.save_path',$_SERVER['DOCUMENT_ROOT']."/session");
// 서버에 저장된 세션 ID 활성화 시간. (분단위)
ini_set('session.cache_expire', 180);
// 세션 시작
session_start();
?>