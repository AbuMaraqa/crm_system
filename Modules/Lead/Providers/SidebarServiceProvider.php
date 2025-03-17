<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/2/24, 9:34 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Lead\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Services\Sidebar\Sidebar;
use Modules\Core\Services\Sidebar\SidebarGroup;
use Modules\Core\Services\Sidebar\SidebarItem;

class SidebarServiceProvider extends ServiceProvider
{
    public function register()
    {

    }

    public function boot(Sidebar $sidebar)
    {
        $leadTag = new SidebarGroup(2, ['dashboard.lead.tags'], 'Lead Tags', 'iconsax-bul-copyright');
        $leadTag->addItem(new SidebarItem(1, ['dashboard.lead.tags'], 'List Lead Tags', 'dashboard.lead.tags', 'iconsax-bul-copyright'));

        $leadDepartment = new SidebarGroup(2, ['dashboard.lead.departments'], 'Lead Departments', 'iconsax-bul-copyright');
        $leadDepartment->addItem(new SidebarItem(1, ['dashboard.lead.departments'], 'List Lead Departments', 'dashboard.lead.departments', 'iconsax-bul-copyright'));

        $leadStatus = new SidebarGroup(2, ['dashboard.lead.statuses'], 'Lead Statuses', 'iconsax-bul-copyright');
        $leadStatus->addItem(new SidebarItem(1, ['dashboard.lead.statuses'], 'List Lead Statuses', 'dashboard.lead.statuses', 'iconsax-bul-copyright'));

        $leadSources = new SidebarGroup(2, ['dashboard.lead.sources'], 'Lead Sources', 'iconsax-bul-copyright');
        $leadSources->addItem(new SidebarItem(1, ['dashboard.lead.sources'], 'List Lead Sources', 'dashboard.lead.sources', 'iconsax-bul-copyright'));

        $sidebar->addItem($leadTag);
        $sidebar->addItem($leadDepartment);
        $sidebar->addItem($leadStatus);
        $sidebar->addItem($leadSources);

    }
}
