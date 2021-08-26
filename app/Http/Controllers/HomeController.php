<?php

namespace App\Http\Controllers;


// Connect to DB with eloquent ORM Model
use App\User;

// Helper
use Illuminate\Http\Request;

// App handler
use Illuminate\Support\Facades\Auth;


// Controller Class Start
class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        /*
        / ------------------------------------------------------
        / App Handler to Protect from un-Authentication User
        / ------------------------------------------------------
        */

        // App Handler to Protect from un-Authentication User
        // "verified" Argument mean that you have to Verify your Email
        $this->middleware(['auth', 'verified']);

    }



    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(User $user)
    {

        // get the Data that Match with Auth Id (per-User)
        $user_id = Auth::id();
        $user = User::find($user_id);


        // If the Data match with User Id, Send it to the Given View Page
        // "$user->mains" Argument is the Joined Table One to Many (inverse)
        // That means, user table has Many to mains table
        return view('pages.profile', compact('user'))->with('storys', $user->mains);

    }



    /**
     * Update the user's profile.
     *
     * @param  Request  $request
     * @return Response
     */
    public function edit(User $user)
    {

        /*
        / ------------------------------------------------------
        / show this Edit page per-User page belongs it User Id
        / ------------------------------------------------------
        */

        // Check for correct user
        if ($user->id === Auth::id()) {
            return view('pages.editprofile', compact('user'));
        } else {
            return redirect('/')->with('error', 'whoops something wen\'t wrong');
        }

    }



    /**
     * Update the user's profile.
     *
     * @param  Request  $request
     * @return Response
     */
    public function update(Request $request, User $user)
    {

        // Form Validation Guards
        $request->validate([
            'username' => 'required',
            'profile' => 'image|nullable|max:1999',
        ]);


        // File Avatar Image Handler
        if ($request->hasFile('profile')) {

            // File Path
            $filePath = 'http://writeeers.com/storage/avatars/';

            // Get filename with the extension
            $filenameWithExt = $request->file('profile')->getClientOriginalName();

            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            // Get just extension
            $extension = $request->file('profile')->getClientOriginalExtension();

            // Filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;

            // Upload profile
            $path = $request->file('profile')->storeAs('public/avatars', $fileNameToStore);

        }


        $updateProfile = User::where('id', $user->id)->firstOrFail();
        $updateProfile->name = $request->username;
        $updateProfile->bio = $request->bio;
        if ($request->hasFile('profile')) {
            // Give filepath to filename for correct direction and readable file
            $updateProfile->avatar = $filePath.$fileNameToStore;
        }
        $updateProfile->save();


        // Redirect to the following given Direction After success updating User Profile
        return redirect('/me')->with('success', 'the data has been updated!');

    }

}
