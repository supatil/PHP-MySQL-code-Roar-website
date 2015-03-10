<?php
//$ins should be of the form array((t1_name, t1col1, t1val1, t1col2, t1val2...,t1coln,t1valn),
//                                  (t2_name, t2col1, t2val1, t2col2, t2val2,...,t2colk,t2valk)
//where $array can have any number of arrays of any normal order
//SQL quotes will be added to values by default, string elements should not contain special formatting
function ParseInsert($ins){
	$sqls = array();
	for($i=0; $i<count($ins); $i++)
	{
		$tbl = 'INSERT INTO ' . $ins[$i][0] . ' ';
		$col = '(';
		$val = '(';
		$v = (count($ins[$i]) - 1 )/ 2 - 1;
		for($n = 0; $n < (count($ins[$i]) - 1) / 2; $n++)
		{
			
			if($n < $v ){
				$col = $col . $ins[$i][(2 * $n)+1] . ', ';
				$val = $val .' \'' .$ins[$i][(2 * $n)+2]. '\', ';
			}
			else {
				$col = $col .$ins[$i][(2 *$n)+1]. ')' . ' VALUES ';
				$val = $val .'\'' .$ins[$i][(2 *$n)+2]. '\')';
			}
		}
		$sql = $tbl . $col . $val;

		array_push($sqls, $sql);
	}
	return $sqls;
}
?>

