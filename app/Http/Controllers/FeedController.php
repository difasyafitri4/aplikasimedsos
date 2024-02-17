<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feed;

class FeedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $feed = Feed::latest()->paginate(1);

        // return view('feed.index', compact('feed'));
        return view('feed.index', ['feeds' => $feed]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('feed.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'video'=> ['required', 'file', 'mimetypes:video/mp4,video/mpeg,video/quicktime', 'max:10240'],
            'caption'=> 'nullable|string|max:100'
        ]);

        $feed = new Feed();

        $feed->created_by = auth()->id(); // The currently logged-in user

        $feed->video = $request->file('video')->store('feedd'); // Store the video inside the 'videos' folder

        $feed->caption = $request->caption;

        $feed->save();



        return redirect()->route('feed.index')->with('success', 'Video uploaded successfully.');

    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feed $feed)
    {
        if ($feed->feed) {
            Storage::delete($feed->video);
        }
        if ($feed->delete()) {
            return redirect(route('feed.index'))->with('seccess','Deleted!');
        }

        return redirect(route('feed.index'))-with('error','sorry, unable to delete this!');
    }
}


