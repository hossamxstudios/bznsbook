<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schedule;
use App\Models\Daily;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;


// Artisan::command('inspire', function () {
//     $this->comment(Inspiring::quote());
// })->purpose('Display an inspiring quote')->hourly();


// Schedule::call(function () {
//     $shops = Shop::all();
//     foreach ($shops as $shop) {
//         $last_day = Daily::where('shop_id',$shop->id)->orderBy('created_at', 'desc')->first();
//         $daily              = new Daily();
//         $daily->shop_id     = $shop->id;
//         $daily->name        = "Day " . (Daily::count() + 1);
//         $daily->day         = date('Y-m-d');
//         if($last_day){
//             if ($last_day->money_end != null && $last_day->box_end != null  ) {
//                 $daily->money_start = $last_day->money_end;
//                 $daily->box_start   = $last_day->box_end;
//             }
//         }
//         $daily->save();
//     }
// })->everyDay();
