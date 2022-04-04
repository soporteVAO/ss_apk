<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Field;
use Illuminate\Support\Facades\Auth;

class FieldsTableExists
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // dd(Field::exists());
        // dd(Auth::user()->empresa->fields->count());
        if (Auth::user()->empresa->fields->count()>0){
            return $next($request);
        }else{
            return redirect()->route('guion.error');
        }
    }
}
