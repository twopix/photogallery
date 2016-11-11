<?
  //AddEventHandler("iblock", "OnBeforeIBlockElementAdd", Array("syncClass", "changeSync"));
  AddEventHandler("iblock", "OnBeforeIBlockElementUpdate", Array("syncClass", "changeSync"));
  
  class syncClass {
    
    function changeSync(&$arFields) {
      if (@$_REQUEST['mode'] == 'import') {    
      
        /* Не перезаписывать детальное описание элементов из 1С */ 
        $text = trim(strip_tags($arFields['DETAIL_TEXT'])); 
        //if($text == '') {
          $arFields['DETAIL_TEXT_TYPE'] = 'html';
          unset($arFields['DETAIL_TEXT']);
        //} 
        
        /* Убираем скобки в названиях характеристик из 1С */
        if($arFields['IBLOCK_ID'] == 14) {
          $name = trim(strip_tags($arFields['NAME'])); 
          $last = strlen($name) - 1;
          $pos_b = strpos($name, '(');
          $pos_f = strrpos($name, ')');
          $count = substr_count($name, '(');
          if($pos_b && $pos_f == $last && $count == 1) {
            $name = substr($name, $pos_b+1, $last - ($pos_b + 1)); 
            $arFields['NAME'] = $name;
          }          
        }
        
        /* Убираем картинки из выгрузки 1С для определенных разделов */
        $PROPERTY_ID = 55;
        $CATS = array();
        $CATS[] = 397; /* Аренда техники */
        $CATS[] = 389; /* Штукатурные станции */
        $CATS[] = 386; /* Окрасочные и шпаклевочные станции */
        $CATS[] = 403; /* Штукатурки */
        $CATS[] = 371; /* Шпаклевки */
        $CATS[] = 406; /* Стяжки */
        $CATS[] = 402; /* Грутнтовки */
        if(is_array($arFields["DETAIL_PICTURE"])) { //&& count(array_intersect($CATS, $arFields["IBLOCK_SECTION"])) > 0
          unset($arFields["DETAIL_PICTURE"]);
          unset($arFields["PREVIEW_PICTURE"]);
        }
        
        /* Убираем лишние пробелы в названиях из 1С */
        $arFields['NAME'] = trim($arFields['NAME']);


          $file = $_SERVER["DOCUMENT_ROOT"]."/log_file.txt";
          $current = file_get_contents($file);
          file_put_contents($file, $current . iconv("UTF-8", "WINDOWS-1251", var_export($arFields, true)));        

      }
    }
    
  }
  
  /* Редиректы со старого раздела комплектующих для СЕО */
  if(strpos($_SERVER['REQUEST_URI'],'/catalog/otdelochnaya_tekhnika/komplektuyushchie/') !== false) {
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . str_replace('/otdelochnaya_tekhnika','',$_SERVER['REQUEST_URI']));
    exit();
  }

?>