<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ViewErrorBag;

class InjectVariables
{
    /**
     * Injects global variables to JS App namespace
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $jsInjector = resolve('JavaScript');

        $variables = [
            'config' => $this->config(),
            'user' => $this->user($request),
            'routes' => $this->routes(),
            'texts' => $this->texts(),
            'errors' => $this->errors($request),
        ];

        $jsInjector->put($variables);

        return $next($request);
    }

    private function config(){
        return [
            'locale' => App::getLocale()
        ];
    }

    private function user($request)
    {
        $user = $request->user();

        if ($user) {
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
            if (!is_null($name)) {
                $paths[$name] = $route->uri();
            }
        }

        return $paths;
    }

    /**
     * Iterates over the translation texts and returns an array differentiated by lang and path.
     * @return array translations
     */
    private function texts()
    {
        $modules = ['common', 'pagination'];
        $langs = ['en'];
        $translations = [];

        foreach ($langs as $lang) {
            $texts = array_map(function ($module) use ($lang) {
                return trans($module, [], $lang);
            }, $modules);

            $translationTree = array_combine($modules, $texts);
            $translations[$lang] = $this->translationPath($translationTree);
        }
        return $translations;
    }

    /**
     * Recursively follows tree to flatten translations.
     *
     * @param $tree
     * @param string $path
     * @return array Ex:
     * [
     *  'common.othertexts.custom.helloworld' => 'Hola mundo!'
     * ]
     */
    private function translationPath($tree, $path = '')
    {
        if (is_array($tree)) {
            $separator = $path ? '.' : '';
            $translations = [];
            foreach ($tree as $node => $branch) {
                $branchTranslations = $this->translationPath($branch, $path . $separator . $node);
                $translations = array_merge($translations, $branchTranslations);
            }
            return $translations;
        } else {
            return [
                $path => $tree
            ];
        }
    }

    private function errors($request)
    {
        return $request->session()->get('errors') ?: [];
    }
}
