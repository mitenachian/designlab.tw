<?php
include("include/db.php");
include('include/pages.php');
if(isset($_REQUEST['page'])==true){ //頁數資料
    $page = $_REQUEST['page'];
}else{
    $page = 1;
}
if(isset($_REQUEST['sel'])){ //抓取傳值的陣列資料
    $sel = $_REQUEST['sel'];    
    $title = $sel[0];  //搜尋值
}else{
    $title='';
    }
if($title !=""){
    
    $where = "WHERE p_name like '%".$title."%' or p_class like '%".$title."%'";
    }
else{
    $where = ''; //沒search
    $sel='';
    }

productslist($page, $where, $sel); //傳頁 sql where條件 所需用到的數值(陣列) 

function productslist($page, $where, $sel){
    global $conDB;
    
    if($sel != ''){
        $sel = join("','",$sel);
        $sel_val ="['".$sel."']";
    }else {
        $sel_val = "['']"; //傳幾個值 陣列就要增加!!! 目前使用一個(搜尋txt)
    }  
    $ajax_page = 'list';  ///填入aj function
    
    $sql = "select * from projects ".$where; 
    
    $result = $conDB->query($sql); //or exit(mysqli_error()); 
    $numrows = mysqli_num_rows($result); 
    $rowsperpage = 10 ; //每列顯示幾筆
    $pagenum = 10;///一次顯示的頁碼數 EX: 上一頁 12345 下一頁
    
    $totalpages = ceil($numrows / $rowsperpage); // 計算總共需要多少頁
    if (is_numeric($page)) {  $currentpage = (int) $page;} //判斷變數是否存在and判斷變數是否為數字或數字的字串// 把變量的類型轉換成 int
    else {$currentpage = 1;}     // 預設的頁數
    if ($currentpage > $totalpages) {   $currentpage = $totalpages;} //若過當前的頁數大於總頁數...// 把當前頁數設定為最後一頁
    if ($currentpage < 1) { $currentpage = 1; } // 若果當前的頁數小於 1... 把當前頁數設定為 1    
    $offset = ($currentpage - 1) * $rowsperpage; // 根據當前頁數計算名單的起始位置
    $sear = $sql." LIMIT $offset, $rowsperpage ";   
    $res = $conDB->query($sear) or exit(mysqli_error());
    
    if($numrows == 0){
        $list= '<div class="alert-danger" role="alert"><span class="sr-only">Error:</span>查無資料，請重新輸入搜尋資料</div>';
    }else{
        
    $list='<table class="table">';
	$list.='<thead>
                        <tr>
                            <th>專案名稱</th>
                            <th>類別</th>
                            <th>日期</th>
                            <th>客戶</th>
                            <th>地點</th>
                            <th>修改</th>
                            <th>刪除</th>
                        </tr>
                    </thead>'; 

        while($row = mysqli_fetch_array($res)) {
            
            $list.= '<tr><td>'. $row["p_name"].'</td>';
            $list.= '<td>'. $row["p_class"].'</td>';
            $list.= '<td>'. $row["p_date"].'</td>';
            $list.= '<td>'. $row["p_client"].'</td>';
            $list.= '<td>'. $row["p_place"].'</td>';
            $list.= '<td>'.'<a class="btn btn-xs btn-success" href="#">開發中</a>';
            $list.= '</td>'; 
            $list.= '<td>'.'<a onclick="checkDel('.$row["p_id"].');" class="btn btn-xs btn-danger">刪除<a>';
            $list.= '</td>'; 
            $list.= '</tr>';
			
         }            
        $list.= '';
    }
	$list.='</table>';
    echo $list; 
	      
    echo page($page,$pagenum,$totalpages,$sel_val,$ajax_page);
    
}