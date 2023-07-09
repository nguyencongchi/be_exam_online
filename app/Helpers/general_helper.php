<?php
/*
 * Print data structure
 * @author ChiNguyen
 * @access	public
 * @param	array, object
 * @return	string
 * */
if ( ! function_exists('p'))
{
    function p($param){
        printf("<pre>");
        print_r( $param );
        printf("<pre>");
        die;
    }
}

