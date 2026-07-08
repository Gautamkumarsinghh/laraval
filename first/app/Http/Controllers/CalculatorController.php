<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    public function index()
    {
        return view('calculator.index');
    }

    public function calculate(Request $request)
    {
        $validated = $request->validate([
            'num1' => 'required|numeric',
            'num2' => 'required|numeric',
            'operation' => 'required|in:+,-,*,/'
        ]);

        $num1 = $validated['num1'];
        $num2 = $validated['num2'];
        $operation = $validated['operation'];
        $result = null;
        $error = null;

        switch ($operation) {
            case '+':
                $result = $num1 + $num2;
                break;
            case '-':
                $result = $num1 - $num2;
                break;
            case '*':
                $result = $num1 * $num2;
                break;
            case '/':
                if ($num2 == 0) {
                    $error = 'Zero se divide nahi ho sakta!';
                } else {
                    $result = $num1 / $num2;
                }
                break;
        }

        return response()->json([
            'result' => $result,
            'error' => $error
        ]);
    }
}
