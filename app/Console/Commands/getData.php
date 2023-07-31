<?php

namespace App\Console\Commands;

use App\Models\Alias;
use App\Models\Attribute;
use App\Models\Person;
use App\Models\Statistic;
use App\Models\Thumbnail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class getData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'getData:API';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get data from API';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $items = [];

        $items = $this->getDataFromAPI();

        // delete all records from db
        if (Person::first()) {
            Person::query()->delete();
        }

        foreach($items as $item) {
            $personId = $this->storePerson($item);
            $this->storeAttributes($item->attributes, $personId);
            $this->storeStatistics($item->attributes->stats, $personId);
            $this->storeAliases($item->aliases, $personId);
            $this->storeThumbnails($item->thumbnails, $personId);
        }

    }

    private function getDataFromAPI()
    {
        $responseData = file_get_contents('https://www.pornhub.com/files/json_feed_pornstars.json');

        $responseData = json_decode($responseData);
        
        return $responseData->items;
    }

    private function storePerson($data): int
    {
        $person = new Person();
        $person->id = $data->id;
        $person->name = $data->name;
        $person->license = $data->license;
        $person->wl_status = (int)$data->wlStatus;
        $person->link = $data->link;
        $person->save();

        return $person->id;
    }

    private function storeAttributes($data, $personId): void
    {
        $attribute = new Attribute();
        $attribute->person_id = $personId;
        $attribute->hair_color = $data->hairColor ?? null;
        $attribute->ethnicity = $data->ethnicity ?? null;
        $attribute->tattoos = $data->tattoos ?? null;
        $attribute->piercings = $data->piercings ?? null;
        $attribute->breast_size = $data->breastSize ?? null;
        $attribute->breast_type = $data->breastType ?? null;
        $attribute->gender = $data->gender ?? null;
        $attribute->orientation = $data->orientation ?? null;
        $attribute->age = $data->age ?? null;
        $attribute->save();
    }

    private function storeStatistics($data, $personId): void
    {
        $statistic = new Statistic();
        $statistic->person_id = $personId;
        $statistic->subscriptions = $data->subscriptions;
        $statistic->monthly_searches = $data->monthlySearches;
        $statistic->views = $data->views;
        $statistic->videos_count = $data->videosCount;
        $statistic->premium_videos_count = $data->premiumVideosCount;
        $statistic->white_label_video_count = $data->whiteLabelVideoCount;
        $statistic->rank = $data->rank;
        $statistic->rank_premium = $data->rankPremium;
        $statistic->rank_wl = $data->rankWl;
        $statistic->save();
    }

    private function storeAliases($data, $personId): void
    {
        foreach($data as $alias) {
            $aliases = new Alias();
            $aliases->person_id = $personId;
            $aliases->name = $alias;
            $aliases->save();
        }
    }

    private function storeThumbnails($data, $personId): void
    {
        foreach($data as $thumbnail) {
            // $thumbnails = new Thumbnail();
            // $thumbnails->person_id = $personId;
            // $thumbnails->height = $thumbnail->height;
            // $thumbnails->width = $thumbnail->width;
            // $thumbnails->type = $thumbnail->type;
            // $thumbnails->image_url = $thumbnail->urls[0];
            // $thumbnails->save();

            Cache::put('image_' . $personId . '_' . $thumbnail->type, $thumbnail);
        }
    }


}
