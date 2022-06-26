<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class CekLevel
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
        if (!auth()->check()|| auth()->user()->level === 'admin') {
            // return redirect('/login');
            abort(403);
        }
        elseif(!auth()->check()|| auth()->user()->level === 'head'){
            // return redirect('/head');
            abort(403);
        }
        elseif(!auth()->check()|| auth()->user()->level === 'visitor'){
            // return redirect('/visitor');
            abort(403);
        }
        return $next($request);
    }
}
    //    return redirect('/');
    //  }
    // }
//     {
//         $user = User::where('email', $request->email)->first();
//         if ($user->level == 'admin') {
//             return redirect('/admin');
//         } elseif ($user->level == 'head') {
//             return redirect('/head');
//         }elseif ($user->level == 'visitor') {
//             return redirect('/visitor');
//         }
        
//         return $next($request);
//     }
// }
        // return $next($request);
    // }
// }
