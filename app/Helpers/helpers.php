<?php


function make_slug($title)
{
    return preg_replace('/\s+/u', '-', trim($title));
}
