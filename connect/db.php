<?
Error_Reporting(E_ALL & ~E_NOTICE);
//скрипт советую не исправлять, либо за работу всей системы не отвечаю.
include_once ('php_self.php');
include_once ('db_config.php');

$db =& new db();

class db {

var $db_config;
var $cons;
var $dbId;
var $lastDbId;
var $res;
var $debug = true;
var $debugPool = array();

function db(){ if(defined(base64_decode('U0NSSVBURUQgQlkgcyEu'))){ $this->db_config = &$GLOBALS['db_config']; $this->connect( ); $this->setDbId( ); } }


function error($string = '', $file = '', $line = '', $function = ''){

if ($this->debug) {
echo '
<hr>
Problem : '.$string.'<br>
File : '.$file.'<br>
Line : '.$line.'<br>
Function : '.__CLASS__.'::'.$function.'<br>
DB_id: '.$this->dbId.'<br>
db_host: '.$this->db_config['db_hostname'].'<br>
<hr>
';

}

}


function connect(){
if(defined(base64_decode('U0NSSVBURUQgQlkgcyEu'))){
$this->cons = mysql_pconnect($this->db_config['db_hostname'], $this->db_config['db_username'], $this->db_config['db_password'], false); mysql_query('SET NAMES cp1251'); }
}


function setDbId(){
if(empty($this->cons) || !isset($this->cons)){ $this->connect(); }
mysql_select_db( $this->db_config['db_name'], $this->cons );
}



function query($query = '', $keyword = ''){

if($query == ''){
$message  = 'Empty Query : '.$keyword;
$this->error( $message, __FILE__, __LINE__, __FUNCTION__ );
return false;
}

$this->debugPool[] = array('DB_id' => $this->dbId, 'KeyWord'	=> $keyword, 'Query'		=> $query);
$this->res = mysql_query( $query, $this->cons );

if(!$this->res){
$message  = 'Invalid query : '.$keyword.' :: '.mysql_error().'<br /> Whole query : '. $query;
$this->error( $message, __FILE__, __LINE__, __FUNCTION__ );
return false;
}

return $this->res;
}


function execQuery($query = '', $keyword = ''){

if($query == ''){
$message  = 'Empty Query : '.$keyword;
$this->error( $message, __FILE__, __LINE__, __FUNCTION__ );
return false;
}

$this->debugPool[] = array('DB_id' => $this->dbId, 'KeyWord'	=> $keyword, 'Query'		=> $query);
$this->res = mysql_unbuffered_query( $query, $this->cons );
//$this->res = mysql_query('SET NAMES cp1251');

if(!$this->res){
$message  = 'Invalid query : '.$keyword.' :: '.mysql_error().'<br /> Whole query : '. $query;
$this->error( $message, __FILE__, __LINE__, __FUNCTION__ );
return false;
}

return $this->res;
}




function insert( $table, $values ){

if( empty($table) || empty($values) ){ $message  = 'Empty Arguments'; $this->error( $message, __FILE__, __LINE__, __FUNCTION__ ); return false; }

foreach ($values as $key => $value) {
$cols[] = sprintf("`%s`", mysql_escape_string( $key ));
$vals[] = sprintf("'%s'", mysql_escape_string( $value ));
}

$cols = implode(' , ', $cols);
$vals = implode(' , ', $vals);

$sql = sprintf("INSERT INTO `%s` (%s) VALUES (%s)", $table, $cols, $vals);

return $this->execQuery($sql);
}


function update($table = '', $set = '', $where = '', $from = 'Unknow'){

if( empty($table) || empty($set) || empty($where) ){
$message  = 'Empty Arguments. Query: '.$from;
$this->error( $message, __FILE__, __LINE__, __FUNCTION__ );
return false;
}


foreach ( $set as $key => $value ){

if( is_array($value) && count($value) < 2 ){
$value = !empty($value) ? array_pop($value) : '';
}

if( is_array($value) ){ $sets[] = sprintf( "`%s`=('%s')", mysql_escape_string( $key ), implode( "','", $value ));

}elseif($value == 'NULL'){
$sets[] = sprintf("`%s`=%s", mysql_escape_string( $key ), $value);
}else{
$sets[] = sprintf("`%s`='%s'", mysql_escape_string( $key ), mysql_escape_string( $value));
}

}

$sets = implode(' , ', $sets);

foreach ( $where as $key => $value ){
$wheres[] = sprintf("`%s`='%s'", mysql_escape_string( $key ), mysql_escape_string( $value));

}
$wheres = implode(' AND ', $wheres);

$sql = sprintf("UPDATE `%s` SET %s WHERE %s", $table, $sets, $wheres);
return $this->execQuery($sql, 'db_AutoUpdate__'.$from );
}


function numrows($sql, $keyword = ''){
return ( mysql_num_rows($this->query($sql, $keyword)) );
}


function SQL_result($sql, $index){
return ( mysql_result($sql, $index) );
}


function queryCheck($sql, $keyword = ''){

$out = array();

$res = $this->query($sql, $keyword);

if( $res != false ){

$out = mysql_fetch_row($res);

return !empty( $out ) ? $out : '';

}else{ return false; }

}



function queryRow($sql, $keyword = ''){

$out = array();

$res = $this->query($sql, $keyword);

if( $res != false ){

$out = mysql_fetch_assoc($res);
return !empty( $out ) ? $out : '';

}else{

return '';
}
}


function queryArray($sql, $keyword = ''){

$out = array();

$res = $this->query( $sql, $keyword );

while( ($tmp = mysql_fetch_assoc( $res )) ){
$out[] = $tmp;
}

return !empty( $out ) ? $out : false;
}

function queryArrayRow($sql, $keyword = ''){

$out = array();

$res = $this->query( $sql, $keyword );

while( ($tmp = mysql_fetch_row( $res )) ){
$out[] = $tmp;
}

return !empty( $out ) ? $out : false;
}

}
?>