<?php

namespace App\Helpers;

class Helper
{
    public static function percentStart($countStart, $sumStart) {

        return number_format(($countStart / $sumStart) * config('lesson.one_hundreds'), 1);
    }

    public static function formatDate($date) {

        return date_format($date,"M d, Y ") . 'at' . date_format($date, " h:i a")   ;
    }

    public static function avgStar($sumStart, $sumReview) {

        return round(array_sum($sumStart) / $sumReview);
    }
}


