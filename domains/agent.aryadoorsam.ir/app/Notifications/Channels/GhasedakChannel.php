<?php

namespace App\Notifications\Channels;

use Ghasedak\Exceptions\ApiException;
use Ghasedak\Exceptions\HttpException;
use Ghasedak\GhasedakApi;
use Illuminate\Notifications\Notification;

class GhasedakChannel
{

    public function send($notifiable,Notification $notification)
    {
        if(! method_exists($notification,'toGhasedakSMS')){
            throw new \Exception('to Ghasedak SMS not found');
        }
        $message=$notification->toGhasedakSMS($notifiable)['text'];
        try {
            $lineNumber='50001212125056';
            $receptor=$notifiable->phone;
            $api=new GhasedakApi(env('GHASEDAK_API_KEY'));
            $api->SendSimple( $receptor, $message , $lineNumber);

        }catch (ApiException $exception){
            throw $exception;
        }
        catch(HttpException $exception){
            throw $exception;
        }

    }

}
