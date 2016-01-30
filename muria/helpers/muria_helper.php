<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('rp')){
    function rp($data){
        return(number_format($data,2,',','.'));
    }
}  
if ( ! function_exists('uang')){
    function uang($data){
        return(number_format($data,2));
    }
}        
if (!function_exists('codegen_nama')){
    function codegen_nama($string){
        // $string=$this->input->post('string');
        $vokal=array('a','e','i','o','u','A','E','I','O','U','y','Y',' ');
        $jmlkata=str_word_count($string);
        if($jmlkata==1){
        
            if((preg_match_all('/[aeiouy]/i',substr($string,0,1),$matches))==1){
                $vo=strtoupper($matches[0][0]);
                $kon=substr(strtoupper(str_replace($vokal,"",$string)),0,2);
                $v=$vo.$kon;
            }else{
                $v=substr(strtoupper(str_replace($vokal,"",$string)),0,3);
            }
            
        }elseif($jmlkata==2){
            $words = preg_split("/[\s,_-]+/", $string);
            $kedua=substr((str_replace($vokal,"",$words[1])),0,2);
            if(preg_match_all('/\b(\w)/',strtoupper($string),$m)) {
                $satu=($m[0][0]);
            }
            $v=strtoupper($satu.$kedua);
        }elseif($jmlkata>=3){
        //dapatkan singkatan/inisial nama
            if(preg_match_all('/\b(\w)/',strtoupper($string),$m)) {
                // print_r($m);
                $v = implode('',$m[1]); // $v is now SOQTU
            }
        }
        return $v;
    }
}
    
if ( ! function_exists('thedate'))
{
    function thedate($data){
        return date("d/m/Y", strtotime($data));
    }
}
if ( ! function_exists('genfaktur_stok'))
{
    function genfaktur_stok($last){
        // $last=$this->stokdb->get_last();
            // print_r($last);
            if(!empty($last)):
                $first=substr($last['faktur'],0,2);
                if($first=='KS'||$first==null){
                    $first='KS';
                }
                $left=substr($last['faktur'],2,4);
                $right=substr($last['faktur'],-5);
                $nopt=number_format($right); 

                $newpo=strval($nopt+1);
                $newpo2=substr(strval("00000$newpo"),-5);

                $tahun=substr($left,0,2);
                $bulan=substr($left,2,4);
            
                if($tahun<>date('y')):
                    $tahun=date('y');
                    if($bulan==date('m')):
                        $gen=strval($first.$tahun.$bulan."00001");
                    elseif($bulan<>date('m')):
                        $bulan=date('m');
                        $gen=strval($first.$tahun.$bulan."00001");
                    endif;
                elseif($tahun==date('y')):
                    if(intval($bulan)<>date('m')):
                        $bulan=date('m');
                        $gen=strval($first.$tahun.$bulan."00001"); 
                    elseif($bulan==date('m')):
                        $gen=strval($first.$tahun.$bulan.$newpo2);
                    endif;
                endif;
            else:
                // $gen="PT151100001";
                $gen="KS".date('ym')."00001";
            endif;
            
            return $gen;
        
    }
}
if ( ! function_exists('generate_code'))
{
    function generate_code($data){
        $first=substr($data['Faktur'],0,2);
        $left=substr($data['Faktur'],2,4);
        $right=substr($data['Faktur'],-5);
        $number=number_format($right); 
        
        
        $new=strval($number+1);
        $new2=substr(strval("00000$new"),-5);
        
        $tahun=substr($left,0,2);
        $bulan=substr($left,2,4);
 
        if($tahun<>date('y')):
            $tahun=date('y');
            if($bulan==date('m')):
                $new_gen=strval($first.$tahun.$bulan."00001");
            elseif($bulan<>date('m')):
                $bulan=date('m');
                $new_gen=strval($first.$tahun.$bulan."00001");
            endif;
        elseif($tahun==date('y')):
            if(intval($bulan)<>date('m')):
                $bulan=date('m');
                $new_gen=strval($first.$tahun.$bulan."00001"); 
            elseif($bulan==date('m')):
                $new_gen=strval($first.$tahun.$bulan.$new2);
            endif;
        endif;
        return $new_gen;
    }
}