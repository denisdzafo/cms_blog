<?php

namespace App\Http\Middleware;

use Closure;

class UserMiddleware
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
          $userLevel = Auth::guard('web')->check();
          if ( $userLevel ) {
              if ( $userLevel && $userLevel != "web" ) {
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
                case "admin": { return "admin.dashboard"; break; }
                default: { return "user.dashboard"; break; }
            }
        }
    }
}
