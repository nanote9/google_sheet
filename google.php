<?php
// 設定用定数
define("SHEET_ID",        "11BCnspCt2Mut3nhc4WMY6CYTd0zF9C3eCzsk1AEpKLM");
define("SHEET_FIRST",     "A1");
define("SHEET_LAST",      "E6");
define("TOKEN",      "");

// MAIN処理
$url = 'https://sheets.googleapis.com/v4/spreadsheets/' . SHEET_ID . '/values/sales!' . SHEET_FIRST . ':' . SHEET_LAST . '?key=' . TOKEN;
$json = file_get_contents($url);
$json_decode = json_decode($json);
    switch (json_last_error()) {
        case JSON_ERROR_NONE:
            // デコード成功
        	break;
        case JSON_ERROR_DEPTH:
        case JSON_ERROR_STATE_MISMATCH:
        case JSON_ERROR_CTRL_CHAR:
        case JSON_ERROR_SYNTAX:
        case JSON_ERROR_UTF8:
        default:
            echo 'JSONエラー';
        	exit;
    }
if (!empty($json_decode) && is_array($json_decode->values)) {
	foreach ($json_decode->values as $key => $value ) {
		echo "'", implode("','", $value) , "'," . "\n";
	}
} else {
	echo 'データの取得に失敗';
	exit;
}

