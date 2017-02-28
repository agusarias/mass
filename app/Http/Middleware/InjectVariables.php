<?php

namespace App\Http\Middleware;

use Closure;

class InjectVariables
{
    /**
     * Injects global variables to JS App namespace
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $jsInjector = resolve('JavaScript');

        $variables = [
            'user' => $this->user($request),
            'routes' => $this->routes()
        ];

        $jsInjector->put($variables);

        return $next($request);
    }

    private function user($request)
    {
        $user = $request->user();

        if($user){
            // Eager load user data.
            $user->load('posts.comments', 'posts.comments');
        }

        return $user;
    }

    private function routes()
    {
        $paths = [];
        $routeCollection = resolve('routes')->getRoutes();

        foreach ($routeCollection as $route) {
            $name = $route->getName();
            if(!is_null($name)){
                $paths[$name] = $route->uri();
            }
        }

        return $paths;
    }
}
