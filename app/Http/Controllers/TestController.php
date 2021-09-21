<?php

namespace App\Http\Controllers;

use App\Traits\RestEconomic;
use Illuminate\Http\Request;

class TestController extends Controller
{
    use RestEconomic;

    public function testGet(){
        $url='customers';
        $method='GET';

        $this->call($url, $method);
    }

    public function testPost(){
        $url='invoices/booked';
        $method='POST';

        //pass data array according to api format
        $data=[
            "draftInvoice"=> [
                "draftInvoiceNumber"=> 1
            ]
        ];

        $this->call($url, $method, $data);
    }
}
