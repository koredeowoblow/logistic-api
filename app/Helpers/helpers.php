<?php

/**
 * Number of page records returned in pagination
 * @var request()->per_page in the request as default
 * @return int
 * */
if(!function_exists("pageCount")){
    function pageCount(){
        return request()->get("per_page", config('services.utils.paginate_per_page'));
    }
}
//to get the current authenticated user
function currentAuthUser()
{
    return auth('admin')->user() ?? auth()->user();
}
