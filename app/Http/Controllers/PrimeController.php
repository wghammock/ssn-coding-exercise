<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;


class PrimeController extends Controller
{
    // Put in place holders for request, in case we want to
    // do phone numbers, zip code, etc in the future

    public function request(Request $request)
    {
        // return Input::get('sample_url_example');

        $levelOne = range(0, 999);
        $levelTwo = range(0, 99);
        $levelThree = range(0, 9999);
        // print_r ($numbers);
        // echo "<br><br>";

        // foreach ($numbers as $num) {
        //     if($this->primeCheck($num)) echo $num . "<br>";
        // }

        $levelOneArray = [];
        for ($num = 0; $num <= 999; $num++) {
            if ($this->primeCheck($num)) $levelOneArray[] = $num;
        }

        $levelTwoArray = [];
        for ($num2 = 0; $num2 <= 99; $num2++) {
            if ($this->primeCheck($num2)) $levelTwoArray[] = $num2;
        }

        $levelThreeArray = [];
        for ($num3 = 0; $num3 <= 9999; $num3++) {
            if ($this->primeCheck($num3)) $levelThreeArray[] = $num3;
        }

        $finalArray = [];
        foreach ($levelThreeArray as $lvlThreeNum) {
            $lvlThreeNumFormatted = sprintf('%04d', $lvlThreeNum);

            // echo $lvlThreeNumFormatted;
            // echo "<br><br>";

            foreach ($levelTwoArray as $lvlTwoNum) {
                $lvlTwoNumFormatted = sprintf('%02d', $lvlTwoNum);

                // echo $lvlTwoNumFormatted;
                // echo "<br><br>";

                foreach ($levelOneArray as $lvlOneNum) {
                    $lvlOneFormatted = sprintf('%03d', $lvlOneNum);
                    $ssnFormatted = $lvlOneFormatted . $lvlTwoNumFormatted . $lvlThreeNumFormatted;
                    $ssnIntVal = intval($ssnFormatted);

                    //  echo $ssnFormatted;
                    //  echo "-";
                    //  echo $ssnIntVal;
                    //  echo "<br><br>";

                    if($this->primeCheck($ssnIntVal)) $finalArray[] = $ssnFormatted;
                }

            }
        }

        var_dump($finalArray);

        // echo "<br><br>";
        // echo "<br><br>";
        // var_dump($levelTwoArry);
        // echo "<br><br>";
        // echo "<br><br>";
        // var_dump($levelThreeArry);
        // return "<br> Complete!";





        //Log::debug('Logging Event, redirct back to home.');


        // Session::flash('message', 'Hold on tight. Your file is being processed');
        // // return Redirect::to(route('home'));
        // return to_route('home');

    }


    /**
     * Check if a number is a prime number or not, 
     * ensure param is a param
     *
     * @param int $num
     */
    public function primeCheck($num)
    {
        /* Must be a positive Interger greater than 1, ie also gets rid of negative numbers*/
        if ($num < 2) {
            return false;
        }

        /*
        *
        * Cannot be divisable by a postive interger factor greater than one or itself
        * note you need only check up to half the value of the current number ie 100 wont be divisable by 51
        *
        */
        for ($factor = 2; $factor <= ($num / 2); $factor++) {
            // echo $factor;
            if ($num % $factor === 0) {
                return false;
            }
        }

        return true;
    }
}
