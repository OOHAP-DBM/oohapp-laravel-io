<?php
namespace Modules\Announcement;
use Modules\Core\Helpers\SitemapHelper;
use Modules\ModuleServiceProvider;
use Modules\User\Helpers\PermissionHelper;

class ModuleProvider extends ModuleServiceProvider
{

    public function boot(SitemapHelper $sitemapHelper){

        $this->loadMigrationsFrom(__DIR__ . '/Migrations');


        PermissionHelper::add([
            //Announcement
            'announcement_view',
            'announcement_create',
            'announcement_update',
            'announcement_delete',
        ]);

    }
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouterServiceProvider::class);
    }

    public static function getAdminMenu()
    {
        return [
            'announcement'=>[
                "position"=>51,
                'url'        => route('announcement.admin.index'),
                'title'      => __('Announcements'),
                'icon'       => 'fa fa-bullhorn',
                'permission' => 'announcement_view',
            ],
        ];
    }
}
