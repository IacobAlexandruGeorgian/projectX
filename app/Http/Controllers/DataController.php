<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Jenssegers\Agent\Agent;

class DataController extends Controller
{
    public function index()
    {
        $type = $this->getPlatformType();

        $people = Person::paginate(12);

        $people->each(function ($person) use ($type) {
            $person->setThumbnailInfo($type);
        });

        return view('pages.home', compact('people', 'type'));
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $type = $request->type;

        $people = Person::where('name', 'LIKE', '%' . $search . '%')
                        ->orWhereHas('aliases', function ($query) use ($search) {
                            $query->where('name', 'LIKE', '%' . $search . '%');
                        })->paginate(12)->setpath('');

        $people->appends([
            'search' => $search,
            'type' => $type
        ]);

        $people->each(function ($person) use ($type) {
            $person->setThumbnailInfo($type);
        });

        return view('pages.home', compact('people', 'search', 'type'));
    }

    public function view($type, $id)
    {
        $thumbnail = Cache::get('image_' . $id . '_' . $type);

        $person = Person::where('id', $id)->with('aliases', 'attribute', 'statistic')->first();
        $person->setThumbnailInfo($type);

        return view('pages.view', compact('person', 'type'));
    }

    private function getPlatformType()
    {
        $agent = new Agent();

        switch (true) {
            case ($agent->isMobile()):
                $type = 'mobile';
                return $type;
            case ($agent->isTablet()):
                $type = 'tablet';
                return $type;
            default:
                $type = 'pc';
                return $type;
        }
    }
}
