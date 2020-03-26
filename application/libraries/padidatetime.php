<?php
class Padidatetime{
    function getmonthsarray($regional="id"){
        return array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Nopember","Desember");
    }
    function getdaysarray($regional="id"){
        return array("Mon"=>"Senin","Tue"=>"Selasa","Wed"=>"Rabu","Thu"=>"Kamis","Fri"=>"Jumat","Sat"=>"Sabtu","Sun"=>"Minggu",);
    }
}