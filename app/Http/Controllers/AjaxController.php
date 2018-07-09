<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function newBackups(Request $request) {
        $lastBackup = $request->input('lastBackup');
        $backups = \App\Backup::where('moved', '>', $lastBackup)->orderBy('moved', 'desc')->get();
        
        if ($backups->count() > 0) {
            $lastBackup = $backups[0]->moved;
        }
        
        return response()
                ->json([
                    'count' => $backups->count(),
                    'data' => view('ajax.newbackups', ['backups' => $backups])->render(),
                    'lastBackup' => $lastBackup    
                ]);
        return view('ajax.newbackups', ['backups' => $backups]);
    }
    
}
