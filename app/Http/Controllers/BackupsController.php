<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class BackupsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $backups = \App\Backup::orderBy('moved', 'desc');
        if ($request->input('search') != '') {
            $backups = $backups->where('src_filename', 'like', '%'.$request->input('search').'%');
        }
        
        $backups = $backups->paginate(20);
        
        if ($backups->count() > 0) {
            $lastBackup = $backups[0]->moved;
        } else {
            $lastBackup = '0';
        }
        
        return view('backups.list', [
            'backups' => $backups, 
            'checktimeout' => 10000, 
            'lastBackup' => $lastBackup,
            'page' => $request->input('page')
        ]);
    }
}
