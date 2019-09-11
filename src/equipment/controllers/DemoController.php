<?php

namespace app\controllers;

use batsg\helpers\HDateTime;
use batsg\helpers\HJapanese;
use DateTime;
use yii\web\Controller;

class DemoController extends Controller
{
    public function actionDatetime()
    {
        $now = HDateTime::now();
        echo "Now: $now<br />";
        $nextMonth = $now->nextNMonth(1);
        echo "Next month: $nextMonth<br />";
        $lastMonth = $now->nextNMonth(-1);
        echo "Last month: $lastMonth<br />";
        $nextDay = $now->nextNDay(1);
        echo "Tomorrow: $nextDay<br />";
        $lastDay = $now->nextNDay(-1);
        echo "Yesterday: $lastDay<br />";        
        HJapanese::getJapaneseYear($now, $era, $year);
        echo "Now : $era $year 年<br />";
    }
}