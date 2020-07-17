<?php 

namespace App\Helpers;

use App\Models\User;
use App\Models\Role;
use Config;

class RoleHelper
{
    /**
     * Get the current user role configured in profile
     * 
     * @return Illuminate\Database\Eloquent\Model object or false
     */
    public static function current()
    {
        $config_role_id = null;
        
        $user = auth()->user();

        return $user->roles[0];
    }

    /**
     * Sets the active role base on role_id
     */
    public static function setActive($id)
    {
        if(self::hasValidRoleId($id)) {
            $profile = auth()->user()->profile;
            $profile->config_role_id = $id;
            $profile->save();
        }
    }

    /**
     * Get the user roles available
     * 
     * @return Array of Illuminate\Database\Eloquent\Model of type RoleTranslation
     */
    public static function available($user_id = false)
    {
        $roles = [];
        
        if($user_id){
            $user = User::find($user_id);
        }else{
            $user = auth()->user();
        }

        foreach ($user->roles as $role) {
            $roles[] = $role;
        }

        return $roles;
    }

    public static function is($roleSlug) {
        $compareRoleId = config('constants.roles.' . $roleSlug);

        $current = self::current();
        
        return $current->id === $compareRoleId;
    }

    public static function hasValidRoleId($id) 
    {
        $allowed_roles = self::available();
        
        if (count($allowed_roles)) {
            foreach ($allowed_roles as $role) {
                if($role->role_id == $id) {
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * Checks if role is allowed for a speficic section, subsection and section listing
     * 
     * @return bool
     */
    public static function isAllowed($role_id, $section, $sub, $sections) 
    {
        if ( isset($sections[$section]) && isset($sections[$section][$sub])) {
            
            if ( in_array($role_id, $sections[$section][$sub])) {
                return true;
            }

        }

        return false;
    }
    
    /**
     * @return Array List of url sections with their subsections 
     *               and their allowed roles ids per section
     */
    public static function getAllowedSections() 
    {
        $sections = [
            'settings' => [
                '*' => self::transformSluggedRolesToIds([
                    'super',
                    'admin'
                ]),
                'heading-menu' => self::transformSluggedRolesToIds([
                    'super',
                    'admin'
                ]),
                'users' => self::transformSluggedRolesToIds([
                    'super',
                    'admin'
                ]),
                'roles' => self::transformSluggedRolesToIds([
                    'super',
                    'admin'
                ]),
            ],
            'products' => [
                '*' => self::transformSluggedRolesToIds([
                    'super',
                    'admin'
                ]),
                'heading-menu' => self::transformSluggedRolesToIds([
                    'super',
                    'admin'
                ]),
                'index' => self::transformSluggedRolesToIds([
                    'super',
                    'admin'
                ]),
                'categories' => self::transformSluggedRolesToIds([
                    'super',
                    'admin'
                ]),
            ],
            'my-lists' => [
                '*' => self::transformSluggedRolesToIds([
                    'super',
                    'admin'
                ]),
                'heading-menu' => self::transformSluggedRolesToIds([
                    'super',
                    'admin'
                ]),
                'index' => self::transformSluggedRolesToIds([
                    'super',
                    'admin'
                ])
            ]
        ];

        return $sections;
    }

    /**
     * $roles_slug_list Array of role slugs 
     * 
     * @return Array List of roles ids
     */
    public static function transformSluggedRolesToIds($roles_slug_list) 
    {

        $base_roles = [
            'super' => 1,
            'admin' => 2,
            'distributor' => 3,
            'regular' => 4,
        ];

        $roles_ids = [];

        if (is_array($roles_slug_list) && count($roles_slug_list)) {
            foreach ($roles_slug_list as $role_slug) {

                if (isset($base_roles[$role_slug])) {
                    $roles_ids[] = $base_roles[$role_slug];
                }

            }
        }

        return $roles_ids;
    }
}
