<?php

namespace App\Services;

use Google\Cloud\BigQuery\BigQueryClient;

class BigQueryService
{
    protected $bigQuery;
    public
    function __construct()
    {
        $projectId = env('GOOGLE_CLOUD_PROJECT_ID');
        $keyFile = env('GOOGLE_CLOUD_KEY_FdILE');
        $this->bigQuery = new BigQueryClient([
                'projectId' => $projectId,
                'keyFilePath' => $keyFile,
            ]);
    }

    public function runQuery($query)
    {
        $queryJob = $this->bigQuery->query($query);
        $results = $this->bigQuery->runQuery($queryJob);

        return $results;
    }
}