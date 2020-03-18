
<?php
function page($page, $pagenum, $totalpages, $sel_val, $ajax_page){
	$start = (int)(($page-1)/$pagenum)*$pagenum+1;
	$end = $start + $pagenum -1;
	$next = $page+1;
	$pre = $page-1;
	$pg = '<nav><ul class="pagination">';
	if($page > 9) {//判斷目前的頁數是否是第一頁,大於第一頁就顯示第一頁和上一頁
	  $pg.= '<li><a href="javascript: void(0)" rel= "1"  onClick="'.$ajax_page.'('.$sel_val.',1);">第一頁</a></li>';}
	if($page > 1){  $pg.='<li><a href="javascript:void(0)" aria-label="Previous" rel='.$pre.'  onClick="'.$ajax_page.'('.$sel_val.','.$pre.');"><span aria-hidden="true">&laquo;</span></a></li>';
	}
	if($totalpages <= $pagenum){ ////判斷總頁數是否小於等於每頁要顯示的頁碼數,小於等於的話就只要顯示出第一頁到最後一頁的全部頁碼 輸出頁碼
		for($i=$start; $i<=$totalpages; $i++){ 
			if($i == $page){ $pg.='<li class="active"><span>' .$i. '</span></li>'; }//在目前頁數裡本身頁數的頁碼就不要連結，如果不是就加上連結
			else{ $pg.='<li><a href="javascript:void(0)" rel='.$i.' onClick="'.$ajax_page.'('.$sel_val.','.$i.');">' .$i. '</a></li>';}
		} 
	}else{  //如果總頁數大於每頁要顯示的頁碼數,如果目前的頁數大於5，預設定為第6頁開始，每頁的頁碼就往前移動1位 
	// ex 目前的頁數為第6頁，所以輸出 2 3 4 5 6 7 8 9 10 11，如果是第7頁就輸出 3 4 5 6 7 8 9 10 11 12，依此類推
		if($page>5){ 
			$end = $page+5;  //每頁結尾的頁碼就+5
			if ($end > $totalpages) {  $end = $totalpages;}//如果每頁結尾的頁碼大於總頁數//就將每頁結尾的頁碼改寫為最後一頁
			$start = $end-9;  //將每頁開頭的頁碼設為結尾的頁碼-9
			for($i=$start; $i<=$end; $i++){//開始輸出頁碼//在目前頁數裡本身頁數的頁碼就不要連結，如果不是就加上連結
				if($i == $page){$pg.='<li class="active"><span>' .$i. '</span></li>';}
				else{$pg.='<li><a href="javascript:void(0)" rel='.$i.'  onClick="'.$ajax_page.'('.$sel_val.','.$i.');">'.$i.'</a></li>';}
			}
	
		}else{  //如果目前的頁數小於5
			if ($end > $totalpages) { $end = $totalpages;  }//如果每頁結尾的頁碼大於總頁數	 //就將每頁結尾的頁碼改寫為最後一頁
	
	//開始輸出頁碼
			for($i=$start; $i<=$end; $i++){//在目前頁數裡本身頁數的頁碼就不要連結，如果不是就加上連結
				if($i == $page){$pg.='<li class="active"><span>' .$i. '</span></li>';}
				else{$pg.='<li><a href="javascript:void(0)" rel='.$i.' onClick="'.$ajax_page.'('.$sel_val.','.$i.');">'.$i.'</a></li>';}
			}
		}
	}//頁碼輸出結束
	//判斷目前的頁數是否是最末頁,小於最末頁就顯示下一頁和最末頁
	if($page < $totalpages) { 
		$pg.='<li><a href="javascript:void(0)" rel ='.$next.' aria-label="Next" onClick="'.$ajax_page.'('.$sel_val.','.$next.');"><span aria-hidden="true">&raquo;</span></a></li>';
		$pg.='<li><a href="javascript:void(0)" rel ='.$totalpages.' onClick="'.$ajax_page.'('.$sel_val.','.$totalpages.');">最末頁</a></li>';
	}
	
	$pg.='</ul></nav>';//分頁導覽列輸出結束
	echo $pg;
}

?>