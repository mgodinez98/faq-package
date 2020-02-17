<?php

function storage_url($resource)
{
    return \Illuminate\Support\Facades\Storage::url($resource);
}

function user()
{
    return Auth::user();
}