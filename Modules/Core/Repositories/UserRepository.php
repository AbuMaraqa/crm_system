<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 6/2/24, 9:34 AM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Repositories;

class UserRepository
{
    public function renderStatusAsHtml($user): string
    {
        $trashedHtml = '<div class="badge space-x-2.5 rounded-full bg-error/10 text-error dark:bg-error/15"><div class="size-2 rounded-full bg-current"></div>
                        <span>' . __("Deleted") . '</span>
                      </div>';

        $disabledHtml = '<div class="badge space-x-2.5 rounded-full bg-warning/10 text-warning dark:bg-warning/15"><div class="size-2 rounded-full bg-current"></div>
                        <span>' . __("Disabled") . '</span>
                        </div>';

        $activeHtml = '<div class="badge space-x-2.5 rounded-full bg-success/10 text-success dark:bg-success/15"><div class="size-2 rounded-full bg-current"></div>
                          <span>' . __("Active") . '</span>
                        </div>';

        return match ($user) {
            $user->trashed()  => $trashedHtml,
            $user->disabled() => $disabledHtml,
            default           => $activeHtml,
        };
    }
}
