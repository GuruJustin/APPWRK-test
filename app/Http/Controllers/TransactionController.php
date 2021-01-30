<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;


// controller of the transaction data
class TransactionController extends Controller
{
    // Direct welcome page
    public function index() {
        $trans = Transaction::all();
        return view('welcome', [
            'trans' => $trans
        ]);
    }
    
    // Save the new transaction data
    public function save(Request $request) {
        $newTrans = new Transaction;
        if ($request->type == 'credit')
            $newTrans->credit = $request->balance;
        else 
            $newTrans->debit = $request->balance;
        $newTrans->balance += $request->balance;
        $newTrans->description = $request->description;
        $newTrans->save();
        return back();
    }
}
