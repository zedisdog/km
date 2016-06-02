<?php
/**
 * Created by PhpStorm.
 * User: zed
 * Date: 16-5-22
 * Time: 上午10:55
 */

namespace app\Providers;

use App\Repositories\TopicRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton([ TopicRepository::class => 'TopicRepository'],TopicRepository::class);
    }
}