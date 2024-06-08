<?php

namespace App\Http\Controllers;

use App\Models\Baterai;
use Google\Cloud\BigQuery\BigQueryClient;
use Illuminate\Http\Request;
use Kreait\Firebase\Factory;

class Status extends Controller
{
    public function index() {
        $status = Baterai::all();

        $fileName = 'data/photo.jpg';

        $serviceAccountPath = base_path('/wmreader-8eff4-firebase-adminsdk-m20nm-a9ec95e4ca.json'); // Pastikan path ini benar

        // Inisialisasi Firebase
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccountPath)
            ->withDefaultStorageBucket('wmreader-8eff4.appspot.com');

        // Inisialisasi Storage Client
        $storage = $firebase->createStorage();

        // Nama bucket storage Firebase
        $bucket = $storage->getBucket();
        $object = $bucket->object($fileName);


        // Mendapatkan URL publik file
        $url = $object->signedUrl(new \DateTime('1 hour'));
        return view('status.page', ['status' => $status, 'fireimage' => $url]);

    }

    // public function index()
    // {
    //     // Create a BigQuery client
    //     $bigQuery = new BigQueryClient([
    //         'projectId' => 'black-velocity-414808',
    //     ]);

    //     // Define the query
    //     $query = 'SELECT * FROM `black-velocity-414808.wmreader.baterai`';

    //     // Run the query
    //     $queryJob = $bigQuery->query($query);
    //     $result = $bigQuery->runQuery($queryJob);

    //     // Fetch the results into an array
    //     $status = [];
    //     foreach ($result as $row) {
    //         $status[] = $row;
    //     }

    //     return view('status.page', ['status' => $status]);
    // }
}