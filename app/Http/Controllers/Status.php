<?php

namespace App\Http\Controllers;

use App\Models\Baterai;
use Google\Cloud\BigQuery\BigQueryClient;
use Illuminate\Http\Request;

class Status extends Controller
{
    public function index() {
        $status = Baterai::all();
        return view('status.page', ['status' => $status]);
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