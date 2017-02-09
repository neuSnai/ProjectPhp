<?php
/*
 * 数据库操作统一接口
 */
interface DbInterface{
    function select($select='*');
    function from($from);
    function where($key,$value);
    function join($table,$on,$type);
    function orderBy($orderBy,$direction);
    function limit($start,$offset);
    function get();
    //原生查询
    function query($queryString);
    //返回数据库连接资源
    function getConn();
    function getQueryStr();
    function insert($table,array $item);
    function update($table,array $item,$where);
    function delete($table,$where);
}
?>
