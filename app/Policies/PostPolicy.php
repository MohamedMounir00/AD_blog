<?php

namespace App\Policies;

use App\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the post.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function view(Admin $user)
    {
        //
    }

    /**
     * Determine whether the user can create posts.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(Admin $user)
    {
        //
      return $this->getPermission($user,'post-create');
    }

    /**
     * Determine whether the user can update the post.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function update(Admin $user)
    {
        return$this->getPermission($user,'post-upate');

    }

    /**
     * Determine whether the user can delete the post.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     **/
       public function delete(Admin $user)
    {
        //
      return $this->getPermission($user,'delete-post');
    }
       public function tag(Admin $user)
    {
        //
      return $this->getPermission($user,'controll-tag');
    }

   public function cat(Admin $user)
    {
        //
      return $this->getPermission($user,'all');
    }



    protected function getPermission($user,$p_n)
    {
        foreach ($user->role as $role) {
            foreach ($role->permissions as $permission) {
                if ($permission->name == $p_n) {
                    return true;
                }
            }
        }
        return false;
    }
}
