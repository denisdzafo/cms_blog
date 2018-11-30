<?php

namespace App\Http\Middleware;

use Closure;

class ModeratorMiddleware
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
          $userLevel = Auth::guard('moderator')->check();
          if ( $userLevel ) {
              if ( $userLevel && $userLevel != "moderator" ) {
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
                case "admin": { return "admin.dashboard"; break; }
                case "web": { return "user.dashboard"; break; }
                default: { return "moderator.dashboard"; break; }
            }
        }
    }
}
