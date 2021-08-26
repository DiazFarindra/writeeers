<?php

namespace App\Http\Controllers;


// Connect to DB with eloquent ORM Model
use App\Main;
use App\User;

// Translate PHP Variable to JS Variable (Use Library)
use JavaScript;

// Helper
use Illuminate\Support\Str;
use Illuminate\Http\Request;

// App Handler
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;



// Controller Class Start
class MainController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        // App Handler to Protect from un-Authentication User
        $this->middleware(['auth', 'verified'])->except(['index']);

    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Main $main)
    {

        // get All data from Database
        $storys = Main::all();


        // Convert data to Javascript Variable
        $datas = [
            $storys
        ];

        foreach ($datas as $data) {
            JavaScript::put([
                'content' => $data
            ]);
        }


        // get shuffled data from Database
        $storysShuffle = collect($storys);
        $shuffled = $storysShuffle->shuffle();
        $shuffledStorys = $shuffled->all();


        // get random data from Database
        if (count($storys) !== 5 ) {
            $randomStorys = collect($storys)->shuffle();
        } else {
            $randomStorys = $storys->random(5);
        }


        // Check Auth User to Correct Views
        if (Auth::guest()) {
            // if user don't have Auth show landing page
            return  view('pages.landing');
        } else {
            // if user have Auth show Home page
            return view('pages.content', compact(['shuffledStorys', 'randomStorys']));
        }

    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        /*
        / ------------------------------------------------------
        / show this Create page, to create Article per-User
        / ------------------------------------------------------
        */

        // Show this Create Article page
        return view('pages.create');

    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Form Validation Guards
        $request->validate([
            'image' => 'image|required|max:1999',
            'title' => 'required',
            'article' => 'required',
        ]);


        // File Images Upload Handler
        if ($request->hasFile('image')) {

            // Get filename with the extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();

            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            // Get just extension
            $extension = $request->file('image')->getClientOriginalExtension();

            // Filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;

            // Upload the File Image
            $path = $request->file('image')->storeAs('public/images', $fileNameToStore);

        }


        // Store data
        $main = new Main;
        $main->image = $fileNameToStore;
        $main->title = Str::slug($request->title, '-');
        $main->article = $request->article;
        $main->user_id = Auth::id();
        $main->save();


        // Redirect User
        return redirect('/me')->with('success', 'story Created!');

    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Main  $main
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, Main $main)
    {

        /*
        / ------------------------------------------------------
        / show this Show per-Article page belongs it data Id
        / ------------------------------------------------------
        */

        // Get all data and randomize the data request, limit = 3 Request
        $randomStory = Main::all()->random(3);


        // "main" argument is Sending the data belongs it data Id
        return view('pages.show', compact(['main', 'randomStory']));

    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Main  $main
     * @return \Illuminate\Http\Response
     */
    public function edit(Main $main)
    {

        /*
        / ------------------------------------------------------
        / show this Edit page per-Article page belongs it data Id
        / ------------------------------------------------------
        */

        // Check for correct user to improve Security
        if (Auth::id() !== $main->user_id) {

            // if Auth user edit to false article, redirect to home page with error
            return redirect('/')->with('error', 'whoops something wen\'t wrong, try again');

        } else {

            // if Auth user edit to correct article, show Update Page
            return view('pages.update', compact('main'));

        }

    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Main  $main
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Main $main)
    {

        // Form Validation Guards
        $request->validate([
            'image' => 'image|nullable|max:1999',
            'title' => 'required',
            'article' => 'required',
        ]);


        // File Images Upload Handler
        if ($request->hasFile('image')) {

            // Get filename with the extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();

            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            // Get just extension
            $extension = $request->file('image')->getClientOriginalExtension();

            // Filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;

            // Upload Image
            $path = $request->file('image')->storeAs('public/images', $fileNameToStore);

        }


        // Update Data per-User
        $updateStory = Main::where('id', $main->id)->firstOrFail();
        if ($request->hasFile('image')) {
            $updateStory->image = $fileNameToStore;
        }
        $updateStory->title = Str::slug($request->title, '-');
        $updateStory->article = $request->article;
        $updateStory->save();


        // Redirect User if data has been success updated
        return redirect('/me')->with('success', 'the data has been updated!');

    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Main  $main
     * @return \Illuminate\Http\Response
     */
    public function destroy(Main $main)
    {

        /*
        / ------------------------------------------------------
        / Automaticly Match the data with Data Id, and delete Data
        / ------------------------------------------------------
        */

        //Match the Data with Data id and delete it
        Main::destroy($main->id);
        Storage::delete(['public/images/' . $main->image]);


        // Redirect User to following Given direction with Notification
        return redirect('/me')->with('error', 'your story has been deleted!');

    }

}
