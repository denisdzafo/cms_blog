<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      if ( $request->user() ) {
          $user = $request->user();
          $userLevel = Auth::guard('admin')->check();
          if ( $userLevel ) {
              if ( $userLevel && $userLevel != "admin" ) {
                  $userHome = $this->getUserHome( $userLevel );
                  if ( $userHome ) {
                      return redirect()->route($userHome);
                  }
              }
          }
      }

      return $next($request);
    }

    private function getUserHome( string $userLevel )
    {
        if ( $userLevel ) {
            switch ($userLevel) {
                case "moderator": { return "moderator.dashboard"; break; }
                case "web": { return "user.dashboard"; break; }
                default: { return "admin.dashboard"; break; }
            }
        }
    }
}
