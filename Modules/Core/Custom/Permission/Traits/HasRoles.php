<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Custom\Permission\Traits;

use Spatie\Permission\Contracts\Permission;
use Spatie\Permission\Contracts\Role;
use Spatie\Permission\PermissionRegistrar;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles as SpatieHasRoles;

trait HasRoles
{
    use HasPermissions;
    use SpatieHasRoles;

    /**
     * Assign the given role to the model.
     *
     * @param  array|string|int|\Spatie\Permission\Contracts\Role|\Illuminate\Support\Collection  ...$roles
     * @return $this
     */
    public function assignRole(...$roles)
    {
        $roles = collect($roles)
            ->flatten()
            ->reduce(function ($array, $role) {
                if (empty($role)) {
                    return $array;
                }

                $role = $this->getStoredRole($role);
                if (! $role instanceof Role) {
                    return $array;
                }

                $this->ensureModelSharesGuard($role);

                $array[$role->getKey()] = PermissionRegistrar::$teams && ! is_a($this, Permission::class) ?
                    [PermissionRegistrar::$teamsKey => getPermissionsTeamId()] : [];

                return $array;
            }, []);

        $model = $this->getModel();

        if ($model->exists) {
            $this->logSync('roles', $roles, logColumns: ['name']);
            $model->load('roles');
        } else {
            $class = \get_class($model);

            $class::saved(
                function ($object) use ($roles, $model) {
                    if ($model->getKey() != $object->getKey()) {
                        return;
                    }

                    $this->logSync('roles', $roles, logColumns: ['name']);
                    $model->load('roles');
                }
            );
        }

        if (is_a($this, get_class($this->getPermissionClass()))) {
            $this->forgetCachedPermissions();
        }

        return $this;
    }

    /**
     * Remove all current roles and set the given ones.
     *
     * @param  array|\Spatie\Permission\Contracts\Role|\Illuminate\Support\Collection|string|int  ...$roles
     * @return $this
     */
    public function syncRoles(...$roles)
    {
        return $this->assignRole($roles);
    }
}
