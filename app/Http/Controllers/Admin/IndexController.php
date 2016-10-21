<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Log;
use Maknz\Slack\Facades\Slack;
use Maknz\Slack\Client;
class IndexController extends Controller
{
    //
    public function index(){
        Log::warning('warning');
        return view('admin.index.index');

    }
}
