<?php

namespace App\Http\Controllers;

use App\Main;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        // App Handler to Protect from un-Authentication User
        $this->middleware(['auth', 'verified']);

    }



    /**
     * Query the Data from Database and get specify data with given data Request.
     *
     * Algolia Search Handler and View page
     *
     * @return void
     */
    public function search(Request $request, Main $main)
    {

        // For Testing Feature
        // $query = 'korea'; // <-- Change the query for testing.


        // Get the data from Requested Data into Query(q) Object
        $q = $request->q;


        // Send Query to the view Belongs to it Id and Given Requested Query
        $story = Main::search($q)->get();


        // Return to View if Requested Data match to Data in the Database
        // and send the data to page View on the following direction
        return view('pages.search', compact('story'));

    }

}
