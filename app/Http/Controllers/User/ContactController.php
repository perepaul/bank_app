<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contacts;
use Illuminate\Validation\Validator;
use Illuminate\Routing\UrlGenerator;

class ContactController extends Controller
{
    //
    protected $contacts;
    protected $base_url;
    protected $default_avatar;

    public function __contruct(UrlGenerator $urlGenerator)
    {
        $this->middleware('auth:users');
        $this->contacts = new Contacts();
        $this->default_avatar = 'default_avatar.png';
        $this->base_url = $urlGenerator->to('/');

    }

    /**
     * Creates contacts
     */

    public function addContacts(Request $request)
    {
        $validator = $request->validate([
            'token'=>'required',
            'firstname'=>'required',
            'phonenumber'=>'required|string'
        ]);

        if($validator->fails()){
            return response()->json([
                'success'=>false,
                'message'=>$validator->messages()->toArray()
            ],400);
        }

        $profile_picture = $request->profile_image;
        $image_data = [
            'file_name'=>$this->default_avatar,
            'base_64'=>''
        ];

        if($request->hasFile('profile_image'))
        {
            $default_avatar = $this->processImage($request->profile_image);
            file_put_contents('/profile_images/'.$default_avatar['file_name'],$default_avatar['base64']);

        }

        // Get user from the auth token
        $user = auth('users')->authenticate($request->token);
        $data = [
            'firstname'=>$request->firstname,
            'lastname'=>$request->lastname??null,
            'email'=>$request->email??null,
            'phonenumber'=>$request->phonenumber,
            'image_file'=>$image_data['file_name']
        ];

        $dummy = $user->contacts()->save(new Contacts($data));

        return response()->json([
            'success'=>true,
            'message'=>'contact saved successfully'
        ],200);



    }

    /**
     * Get paginated contacts
     */

     public function getPaginatedContacts($pagination=null,$token)
     {

         $user = auth('users')->authenticate($token);

         if(is_null($pagination) or empty($pagination))
         {
             $contacts = $user->contacts->orderBy('id','DESC')->get()->toArray();
         }

         $contacts = $user->contacts->orderBy('id','DESC')->paginate($pagination);

        return response()->json([
            'success'=>true,
            'data'=>$contacts,
            'file_directory'=>$this->base_url.'/profile_images'
        ],200);


     }


     /**
      * Updates Contact
      */

      public function editContact(Request $request,$id)
      {
        $validator = $request->validate([
            'firstname'=>'required|string',
            'phonenumber'=>'required|string'
        ]);

        if($validator->fails()){
            return response()->json([
                'success'=>false,
                'message'=>$validator->messages()->toArray()
            ],400);
        }

        $contact = $this->contacts::find($id);
        if(!$contact)
        {
            return response()->json([
                'success'=>false,
                'message'=>'Contact not found'
            ],404);
        }

        if($request->hasFile('profile_image'))
        {
            $default_avatar = $this->processImage($request->profile_image);
            file_put_contents('/profile_images/'.$default_avatar['file_name'],$default_avatar['base64']);
            unlink($this->base_url.'/profile_images/'.$contact->)

        }



      }





    private function processImage($image)
    {
        $fileBin = file_get_contents($image);
        $mime_type = mime_content_type($fileBin);
        $unique_name = uniqid().'_'.time().'_'.date('Ymd');

        if('image/png' == $mime_type)
        {
            $unique_name.='.png';
        }
        else if('image/jpeg' == $mime_type)
        {
            $unique_name.='.jpeg';
        }
        else if('image/jpg' == $mime_type)
        {
            $unique_name.='.jpg';
        }
        else{
            return response()->json([
                'success'=>false,
                'message'=>'only png, jpg and jpeg files are accepted for contact images'
            ]);
        }

        return [
            'file_name'=>$unique_name,
            'base64'=>$fileBin
        ];
    }
}
