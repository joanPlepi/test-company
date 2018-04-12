<?php

namespace App;

use App\Role;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //It is supposed to be used by the avatar in the chat system. 
    public function getImage()
    {
        return $this->path;
    }

     public function getImagePath()
    {
        $path = $this->path;
        $arr = explode('/', $path);
        return $arr[3];
    }

    public static function generateImgName($ext)
    {
        $uniqueId = uniqid('img_' . rand(10000,99999), true);
        $name = $uniqueId . '.' . $ext;

        return $name;
    }

    public function updateFilePath($request)
    {         
        $name = $this->getImagePath(); //here is the old name of image path. 

        Storage::delete('public/images/' . $name);
        
        $newName = User::generateImgName($request->extension());

         $request->storeAs('public/images' , $newName );

         $path = '/storage/images/' . $newName;
         $this->update([
                'path' => $path
            ]);
    }

    public function role()
    {
        return $this->belongsTo(Role::class , 'role_id' , 'id');
    }

   

}
