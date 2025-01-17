<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    use HasFactory;
    protected $table = 'sgo_configs';
    protected $fillable = [
        'title',
        'logo',
        'favicon',
        'website',
        'script',
        'title_seo',
        'fanpage',
        'description_seo',
        'keywords_seo',
        'map',
        'about_us',
        'banner',
        'about_us_image',
        'about_us_content',
        'about_us_title',
        'commit_img',

        'working_hours',
        'booking_procedure',
        'advisory',
        'headquarters',

        'maintenance',
        'copyright',
        'marquee'

    ];
}
