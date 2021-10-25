<?php

use App\Models\SiteSetting;

function websiteName()
{
    return SiteSetting::first()->website_name;
}
function websiteLog()
{
    return SiteSetting::first()->website_logo;
}
function websiteFavicon()
{
    return SiteSetting::first()->website_favicon;
}
function random_code()
{
    return rand(1111, 9999);
}

function allUpper($str)
{
    return strtoupper($str);
}
