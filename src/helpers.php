<?php

function faq_storage_url($resource)
{
    return \Illuminate\Support\Facades\Storage::url($resource);
}

function faq_user()
{
    return Auth::user();
}